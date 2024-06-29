<template>
  <div class="w-full">
    <MdEditor
      ref="editorRef"
      v-model="content"
      :toolbars="props.toolbars"
      @onUploadImg="onUploadImg"
      :preview="props.options.preview ?? true"
      :scrollAuto="props.options.scrollAuto ?? true"
      :disabled="props.options.disabled ?? false"
      :readOnly="props.options.readyonly ?? false"
      :autoFocus="props.options.autoFocus ?? false"
      :pageFullscreen="props.options.pageFullscreen ?? false"
      :tabWidth="props.options.tabWidth"
      :placeholder="props.options.placeholder"
      :maxLength="props.options.maxLength"
      :showToolbarName="props.options.showToolbarName"
      :inputBoxWitdh="props.options.inputBoxWitdh"
    >
      <template #defToolbars>
        <EmojiToolBar :onInsert="insert" />
      </template>
    </MdEditor>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { MdEditor } from 'md-editor-v3'
import defaultToolBars from './js/toolbars'
import { useAppStore } from '@/store'
import EmojiToolBar from './components/emoji/index.vue'
import uploadConfig from '@/config/upload'
import tool from '@/utils/tool'
import commonApi from '@/api/common'
import file2md5 from 'file2md5'
import 'md-editor-v3/lib/style.css'
import { Message } from '@arco-design/web-vue'

const appStore = useAppStore()
const editorRef = ref(null)

const props = defineProps({
  modelValue: { type: String },
  id: { type: String, default: () => 'md-editor' + new Date().getTime().toString() },

  toolbars: {
    type: Array,
    default: defaultToolBars
  },
  options: {
    type: Object,
    default: {}
  }
})

const emit = defineEmits(['update:modelValue', 'change'])

const onUploadImg = async (files, callback) => {
  const chunkSize = 1024 * 1024
  const res = await Promise.all(
    files.map((file) => {
      return new Promise( async (rev, rej) => {
        const hash = await file2md5(file)
        if (! file.type) {
          rej('获取文件类型失败，无法上传')
          Message.error('获取文件类型失败，无法上传')
          return
        }
        const chunks = Math.ceil(file.size / chunkSize)
        
        for (let currentChunk = 0; currentChunk < chunks; currentChunk++) {
          const start = currentChunk * chunkSize
          const end = (start + chunkSize >= file.size)
                      ? file.size
                      : start + chunkSize
          const dataForm = new FormData()
          dataForm.append('package', file.slice(start, end))
          dataForm.append('hash', hash)
          dataForm.append('total', chunks)
          dataForm.append('name', file.name)
          dataForm.append('type', file.type)
          dataForm.append('size', file.size)
          dataForm.append('index', currentChunk + 1)
          dataForm.append('ext', /[^.]+$/g.exec(file.name)[0])

          const res = await commonApi.chunkUpload(dataForm)

          if (res.data && res.data.hash) {
            rev(tool.showFile( res.data.hash, uploadConfig.storageMode[res.data.storage_mode] ))
            return
          }
        }
      });
    })
  );
  callback(res.map((item) => item))
};

let content = computed({
  get() {
    return props.modelValue
  },
  set(value) {
    emit('update:modelValue', value)
  },
})

const insert = (generator) => {
  editorRef.value?.insert(generator);
};
</script>