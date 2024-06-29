<!--
 - MineAdmin is committed to providing solutions for quickly building web applications
 - Please view the LICENSE file that was distributed with this source code,
 - For the full copyright and license information.
 - Thank you very much for using MineAdmin.
 -
 - @Author X.Mo<root@imoi.cn>
 - @Link   https://gitee.com/xmo/mineadmin-vue
-->
<template>
  <div class="w-full">
    <a-input-group class="w-full">
      <a-input placeholder="请点击右侧按钮选择图标" v-if="props.preview" allow-clear v-model="currentIcon"/>
      <div class="icon-container" v-if="props.preview">
        <component :is="currentIcon" v-if="currentIcon"/>
      </div>
      <a-button type="primary" @click="() => visible = true">选择图标</a-button>
    </a-input-group>

    <a-modal v-model:visible="visible" width="800px" draggable :footer="false">
      <template #title>选择图标</template>
      <div class="flex justify-between">
        <a-radio-group type="button" v-model="currentTab">
          <a-radio value="arco">ArcoDesign</a-radio>
          <a-radio value="mine">MineAdmin</a-radio>
          <a-radio value="pico">IconPark</a-radio>
        </a-radio-group>
        <span style="width: 240px">
        <a-input placeholder="搜索图标"
                 allow-clear
                 v-model="showIcons.searchKey"
                 @input="debounceQueryIcon"
                 @clear="queryIcon"
                 @press-enter="queryIcon" />
        </span>
      </div>

      <div>
        <a-scrollbar ref="iconsContainerRef" style="height: 410px" class="overflow-auto" outer-class="icons-container" >
          <ul v-if="showIcons.list.length > 0">
            <li
                v-for="icon in showIcons.list"
                :key="icon"
                @click="selectIcon(icon)"
            >
              <component :is="icon"/>
            </li>
          </ul>
          <a-empty v-else class="flex flex-col justify-center" style="height: 410px"/>
        </a-scrollbar>
      </div>
      <div class="w-full flex justify-end">
        <a-pagination
            :total="showIcons.total"
            v-model:current="showIcons.page"
            v-model:page-size="showIcons.pageSize"
            :page-size-options="showIcons.pageSizeOptions"
            show-total show-jumper show-page-size/>
      </div>

    </a-modal>
  </div>
</template>

<script setup>
import {reactive, ref, onMounted, watch} from 'vue'
import * as arcoIcons from '@arco-design/web-vue/es/icon'
import * as iconParks from '@icon-park/vue-next/es/index'
import {debounce} from "lodash";

const visible = ref(false)
const currentIcon = ref()
const props = defineProps({
  modelValue: {type: String},
  preview: {type: Boolean, default: true},
})
const emit = defineEmits(['update:modelValue'])
onMounted(() => currentIcon.value = props.modelValue)
const iconsContainerRef = ref(null)

const currentTab = ref('pico'); // arco mine pico
// 所有图标列表
const icons = reactive({
  mine: [],
  arco: [],
  pico: [],
});
// 展示的图标列表
const showIcons = reactive({
  list:[],
  total:0,
  page:1,
  pageSize:98,
  pageSizeOptions:[98, 196, 294, 392],
  searchKey:''
});

// 加载所有 arco 图标
for (let icon in arcoIcons) {
  icons.arco.push(icon)
}
icons.arco.pop()

// 加载所有 mine 图标
for (const path in import.meta.glob('../../assets/ma-icons/*.vue')) {
  const name = path.match(/([A-Za-z0-9_-]+)/g)[2]
  icons.mine.push(`MaIcon${name}`)
}

// 加载所有pico图标
for (let icon in iconParks) {
  // 如果是全部大写,则排除
  if (icon === icon.toUpperCase()) continue
  icon = icon.replace(/([A-Z])/g, '-$1').toLowerCase()
  icons.pico.push(`i${icon}`)
}

const selectIcon = (icon) => {
  currentIcon.value = icon
  emit('update:modelValue', currentIcon.value)
  visible.value = false
}

const handlerChange = (value) => {
  selectIcon(value)
}

const queryIcon = () => {
  console.log(1)
  let _icons = icons[currentTab.value] ?? []
  // 取page,pageSize
  if (showIcons.searchKey.trim()) {
    // 使用过滤函数来筛选包含搜索关键字的图标
    _icons = _icons.filter(icon => {
      return icon.toLowerCase().includes(showIcons.searchKey.trim().toLowerCase());
    });
  }
  showIcons.total = _icons.length
  _icons = _icons.slice((showIcons.page - 1) * showIcons.pageSize, showIcons.pageSize * showIcons.page)
  showIcons.list = _icons
  // 自动滚动到最顶上
  iconsContainerRef.value?.scrollTop(0)
}
const debounceQueryIcon = debounce(queryIcon, 300)
watch([
  ()=>currentTab.value,
  ()=>showIcons.page,
  ()=>showIcons.pageSize
], ()=>{
  queryIcon()
}, {immediate: true})

</script>

<style scoped lang="less">
.icon-container {
  width: 50px;
  height: 32px;
  background-color: var(--color-fill-1);
  display: flex;
  justify-content: center;
  align-items: center;
}

.icon {
  width: 1em;
  fill: var(--color-text-1);
}

.icons-container {
  // 设置边框

  margin: 6px 0;
  ul {
    display: flex;
    flex-wrap: wrap;
    padding-left: 7px;
    padding-top: 7px;
  }

  li {
    border: 2px solid var(--color-fill-4);
    margin-bottom: 10px;
    margin-right: 6px;
    padding: 5px;
    cursor: pointer;
  }

  li:hover, li.active {
    border: 2px solid rgb(var(--primary-6));
  }

  & li svg,& .i-icon {
    width: 2.4em;
    height: 2.4em;
  }
  & .i-icon{
    vertical-align: -.5em;
  }
  & .arco-icon{
    vertical-align: middle;
  }
  :deep(& .i-icon >svg){
    width: 2.4em;
    height: 2.4em;
  }

}

:deep(.arco-select-option-content) {
  width: 100%;
}
</style>