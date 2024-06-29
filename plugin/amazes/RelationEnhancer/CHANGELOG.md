
## v1.0.0
- 此版本为稳定版
- 修改了模型中的 hasManyBySet 引入方法,从原本的自动加载修改为手动引入
- 增强了hasManyBySet,新增参数$foreignKeyHandler,允许使用者提供$foreignKey的处理函数

## v0.2.4
- 修复了 hasManyBySet 的 relatedKey 的默认值获取逻辑 
- 新增readme文件,添加使用说明

## v0.2.3
- 将 **hasManyInArr** 方案升级为 **hasManyBySet** 方案。
- 优化了代码注释，完善了功能。
- 修复了部分 bug。