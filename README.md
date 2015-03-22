MongoDB动态表单生成工具
========================

[ 简介 ]

    这是一个基于CodeIgniter框架，使用MongoDB存储的动态表单生成工具。
    前台界面采用了Bootstrap前端框架，并提供可拖拽表单域元素来构成不同的表单。

[ 使用方法 ]

    1. 安装配置好MongoDB（不懂的百度一下）
    2. 根据你的数据库，配置protected\config\cimongo.php 连接信息
    3. 操作使用：将首页左侧Drag & Drop components里的表单域拖放到右侧Design Your Form表框内，
    同时,可修改表单元素、属性、值等，Save保存；输入Author作者Save Form即可生成对应的表单。
    查看生成的表单：http://127.0.0.1/FormsMW//forms/home/my_form?form_id=你的表单ID
    查看对应表单提交的数据：http://127.0.0.1/FormsMW//forms/home/my_item?item_id=xxxxxxxxx

[ 目录结构 ]

├─protected
│  ├─config
│  ├─controllers
│  ├─core
│  │  └─CodeIgniter_2.1.4
│  │      ├─core
│  │      ├─database
│  │      │  └─drivers
│  │      │      ├─cubrid
│  │      │      ├─mssql
│  │      │      ├─mysql
│  │      │      ├─mysqli
│  │      │      ├─oci8
│  │      │      ├─odbc
│  │      │      ├─pdo
│  │      │      ├─postgre
│  │      │      ├─sqlite
│  │      │      └─sqlsrv
│  │      ├─fonts
│  │      ├─helpers
│  │      ├─libraries
│  │      │  ├─Cache
│  │      │  │  └─drivers
│  │      │  ├─cimongo
│  │      │  └─javascript
│  │      └─locales
│  │          ├─en_US
│  │          └─zh_CN
│  ├─locales
│  │  ├─en_US
│  │  └─zh_CN
│  ├─modules
│  │  ├─demo
│  │  │  ├─controllers
│  │  │  ├─locales
│  │  │  │  ├─en_US
│  │  │  │  └─zh_CN
│  │  │  ├─models
│  │  │  └─views
│  │  └─forms
│  │      ├─controllers
│  │      ├─locales
│  │      │  ├─en_US
│  │      │  └─zh_CN
│  │      ├─models
│  │      └─views
│  └─views
│      └─errors
└─public
    ├─bootstrap
    │  └─3.1.1
    │      ├─css
    │      ├─fonts
    │      └─js
    ├─font-awesome
    │  └─4.2.0
    │      ├─css
    │      └─fonts
    ├─form
    │  ├─css
    │  └─js
    ├─html5shiv
    │  └─3.7.0
    ├─jquery
    │  └─1.11.0
    └─respond
        └─1.4.2

[ 协议 ]

    本系统除CodeIgniter框架外，遵循Apache Licence2.0开源许可协议发布
    具体参考LICENSE.txt内容
