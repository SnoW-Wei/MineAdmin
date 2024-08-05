
<<<<<<< HEAD
##### 本地和测试环境
```
php watch -c
```

##### 正式环境
```
php bin/hyperf.php start
```

##### 目录结构
```
├── api                                 // 应用程序对外接口目录
│   ├── InterfaceApi                    // 接口程序目录
│   │   └──v1                           // v1接口版本
│   ├── Listener                        // 接口监听事件目录
│   ├── Middleware                      // 接口中间件处理目录
│   ├── ApiController.php               // 接口处理控制器
│   └── ApiDocController.php            // 接口文档控制器
├── app                                 // 应用程序目录
│   ├── System                          // 系统模块目录
│   │   ├── Controller                   // 控制器目录
│   │   ├── Databases                    // 数据库迁移
│   │   ├── Mapper                       // 数据库映射访问层目录
│   │   ├── Model                        // 模型目录
│   │   ├── Request                      // 请求验证目录
│   │   ├── Service                      // 业务逻辑层目录
│   │   └── ...                          // 其他目录
│   ├── Setting                         // 设置模块目录
│   └── ...                             // 以后增加的其他模块目录
├── bin                                 
│   └── hyperf.php                      // 启动项目的文件
├── config                              // 配置文件目录
├── common/common.php                   // 业务级公共函数库
├── mine                                // MineAdmin 核心目录
│   ├── Abstracts                        // 存放抽象类目录
│   ├── Amqp                             // 系统队列及延迟队列类库
│   ├── Annotation                       // 存放自定义注解目录
│   ├── Aspect                           // 存放自定义切面目录
│   ├── Command                          // 存放自定义命令目录
│   ├── Crontab                          // 存放定时任务核心目录
│   ├── Event                            // 存放事件目录
│   ├── Exception                        // 存放异常接管处理目录
│   ├── Generator                        // 存放代码生成处理目录
│   ├── Helper                           // 助手类目录
│   ├── Interfaces                       // 系统接口目录
│   ├── Redis                            // Redis封装类库目录
│   ├── Listener                         // 存放事件监听目录
│   ├── Traits                           // 存放复用类目录
│   ├── Mine.php                         // MineAdmin 基础功能类
│   ├── MineCollection.php               // 模型数据处理类
│   ├── MineCommand.php                  // 命令基础类
│   ├── MineController.php               // 控制器基础类
│   ├── MineModel.php                    // 模型基础类
│   ├── MineModelVisitor.php             // 模型字段类型映射
│   ├── MineRequest.php                  // 请求基础类
│   ├── MineResponse.php                 // 响应基础类
│   ├── MineServer.php                   // Mine服务类
│   ├── MineStart.php                    // 启动类
│   └── MineUpload.php                   // 上传处理类
├── web                                  // 前端目录
├── public                              // MineAdmin外部访问目录
├── runtime                             // 临时文件目录
├── storage                             // 多语言目录  
├── vendor

```
##### git 合并
```
如果想与主repo同步，先获取源码更新：
git fetch upstream

后台 合并（大佬的开源代码更新）与（本地）
git merge upstream/master

账号密码：
superAdmin
admin123


前端 合并（大佬的开源代码更新）与（本地）
git merge upstream/main
```
##### 代码生成器
```
使用后端代码
打开压缩包的 php 目录，复制里面的所有目录和文件
打开后端根目录，粘贴进去（如之前生成过，请不要直接粘贴，以免造成之前的文件被覆盖）
执行 composer dump-autoload -o 命令，清除框架的代理缓存类
结束框架进程，重新启动框架

使用前端代码
打开压缩包的 vue 目录，复制里面的所有目录和文件
打开前端根目录，粘贴进去（如之前生成过，请不要直接粘贴，以免造成之前的文件被覆盖）
鼠标移动到后台右上角的头像，点击 清除缓存 更新用户的菜单数据，刷新浏览器，看是否显示新增的菜单
点击新增的菜单，看页面是否显示，如果不显示，请重启前端
```
