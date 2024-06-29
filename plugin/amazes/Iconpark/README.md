# iconpark


## 简介
**iconpark** 为minadmin添加iconpark图标,方便开发者使用,可用于菜单等任意位置

## 使用方法
安装插件后,请在 `src/main.js` 中做如下配置
```javascript
// 省略其他代码...
// 引入 iconPark 图标
import '@icon-park/vue-next/styles/index.css'; // 新加的行
import {install} from '@icon-park/vue-next/es/all' // 新加的行
const app = createApp(App) // 本行原本就有
install(app, 'i') // 新加的行

// 省略其他代码...
```

>如果您有想法,建议或反馈,可以在mineadmin官方交流群反馈
>也可以联系微信：`AMAZES_CC`
