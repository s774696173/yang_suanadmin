### 简介

YiiBoot简单便捷高效安全，非常适合二次开发的通用管理后台。基于Yii2 + AdminLTE + mysql开发，提供易用安全的用户菜单权限管理，操作日志记录，定制了基于AdminLTE的gii代码model和curl模板，易于用户在此基础上快速开发自己的管理后台。
![输入图片说明](http://git.oschina.net/uploads/images/2016/0816/131856_3b94983a_2349.png "在这里输入图片标题")
 **基本的功能：** 
菜单管理：系统自动识别可用路由，用户只需选择添加到对应菜单中
角色管理：树形结构的权限分配，易于分配
用户管理：
日志记录：记录所有用户操作记录，让所有后台操作有数据可查。
代码生成：这是让YiiBoot实现高效快捷开发的基础，基于gii基础，定制了一套生成模板，
Model Generator：同时生成model类和service类，所有数据库操作业务写在service类上，model类直接生成，不添加任何业务代码。
CRUD Generator：基于AdminLTE的web模板，生成对model的crud操作，同时可以通过model的TableColumnInfo信息配置字段是否可以显示在列表，是否可以编辑，是否可以查询等。

### 下载安装

1. 运行环境 php5.5+
2. 下载代码
git clone https://git.oschina.net/penngo/chadmin.git
下载http://git.oschina.net/penngo/chadmin/attach_files附件，或下载master zip最新代码。
3. 新建数据库yiiboot, 修改数据库配置common\config\main.php
4. 导入data/db.sql。
5. 浏览器访问yiiboot/backend/web/index.php ,如果配置了域名xx.com请指向路径yiiboot/backend/web，访问 xx.com/index，默认帐号密码admin 123456

使用教程：https://git.oschina.net/penngo/chadmin/wikis/tutorial
我在这坐等各位BUG反馈：http://git.oschina.net/penngo/chadmin/issues
### 如果觉得本项目对你有用，点击顶部右上边[捐赠](#git-project-title)按钮或扫描下边二维码，打赏支持一下作者。
![输入图片说明](http://git.oschina.net/uploads/images/2016/0816/211705_29b17595_2349.png "在这里输入图片标题")


系统截图

![输入图片说明](http://git.oschina.net/uploads/images/2016/0816/125143_82438fd0_2349.png "在这里输入图片标题")
![输入图片说明](http://git.oschina.net/uploads/images/2016/0816/130345_610f38f2_2349.png "在这里输入图片标题")
![输入图片说明](http://git.oschina.net/uploads/images/2016/0816/130551_d7f7b3ab_2349.png "在这里输入图片标题")
![输入图片说明](http://git.oschina.net/uploads/images/2016/0816/131001_8ce731b1_2349.png "在这里输入图片标题")
![输入图片说明](http://git.oschina.net/uploads/images/2016/0816/131219_46baf279_2349.png "在这里输入图片标题")

参考资料
Yii官网http://www.yiiframework.com/
AdminLTE官网https://github.com/almasaeed2010/AdminLTE