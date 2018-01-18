## sql文档


* 1、 [foo_action(直播表)](#1)
* 2、 [foo_action_type(直播分类)](#2)
* 3、 [foo_admin(管理员)](#3)
* 4、 [foo_admin_log(管理员日志)](#4)
* 5、 [foo_role(管理员角色)](#5)
* 6、 [foo_statistics(统计)](#6)
* 7、 [foo_web_config(页面配置)](#7)
* 8、 [foo_action_over(集锦)](#8)
* 9、 [foo_players(球队)](#9)

-----------------
<span id="1"/>
##### 1、 foo_action(直播表)

| 字段名 | 类型 | 默认 | 主键 | 备注 |
|-------|------|------|-----|------|
| act_id | varchar | 15 | key | ID |
| act_name | varchar(32) | - | - | 直播赛事名 (如西甲等) |
| act_time | datetime | - | - | 直播时间 |
| act_platform | text | - | - | 平台及地址 {1:{'name':'','url':'http://ddd'},...} |
| left_num | smallint | 0 | - | 左队得分 |
| right_num | smallint | 0 | - | 右队得分 |
| left_p_id | int | - | - | 左队ID |
| right_p_id | int | - | - | 右队ID |
| left_name | varchar(32) | - | - | 左队 |
| right_name | varchar(32) | - | - | 右队 |
| add_time | datetime | - | - | 添加时间 |
| admin_id | int | - | - | 管理员ID |
| type_id | smallint | - | - | 类型ID |
| status | tinyint | - | - | 0:未开始 1:进行中 2:已结束 |
| status_desc | varchar(20) | - | - | 赛事状态描述 |
| is_show | tinyint | 1 | - | 是否展示 0:否 1:是 |
| is_hot | tinyint | 0 | - | 是否热门 0:否 1:是 |
| is_good | tinyint | 0 | - | 是否精华 0:否 1:是 |
| is_del | tinyint | 0 | - | 是否删除 0:否 1:是 |


<span id="2"/>
##### 2、 foo_action_type(直播分类)

| 字段名 | 类型 | 默认 | 主键 | 备注 |
|-------|------|------|-----|------|
| type_id | smallint | - | key auto | ID |
| type_name | varchar(32) | - | - | 类名 |
| type_desc | varchar(64) | - | - | 简介 |
| is_show | tinyint | - | - | 是否展示 0:否 1:是 |


<span id="3"/>
##### 3、 foo_admin(管理员)

| 字段名 | 类型 | 默认 | 主键 | 备注 |
|-------|------|------|-----|------|
| admin_id | int | - | key auto | ID |
| admin_account | varchar(32) | - | - | 帐号 |
| admin_pass | binary | - | - | 密码 |
| admin_role_id | smallint | - | - | 角色ID |
| admin_name | varchar(32) | - | - | 名称 |
| admin_phone | char(11) | - | - | 手机 |
| admin_email | varchar(64) | - | - | 邮箱 |
| admin_sex | tinyint | - | - | 0:未知 1:男 2:女 |
| admin_birthday | date | - | - | 生日 |
| admin_register_time | datetime | - | - | 注册时间 |
| admin_login_time | datetime | - | - | 登录时间 |
| admin_tag | varchar(64) | - | - | 标签 |
| ip_address | varchar(15) | - | - | IP地址 |


<span id="4"/>
##### 4、 foo_admin_log(管理员日志)

| 字段名 | 类型 | 默认 | 主键 | 备注 |
|-------|------|------|-----|------|
| log_id | int | - | key auto | ID |
| log_time | datetime | - | - | 时间 |
| log_info | varchar(255) | - | - | 操作记录 |
| admin_id | smallint | - | - | 操作人 |
| ip_address | varchar(15) | - | - | IP地址 |


<span id="5"/>
##### 5、 foo_role(管理员角色)

| 字段名 | 类型 | 默认 | 主键 | 备注 |
|-------|------|------|-----|------|
| role_id | smallint | - | key auto | ID |
| role_name | varchar(32) | - | - | 角色名 |
| role_desc | varchar(255) | - | - | 简介 |
| role_power | text | - | - | 权限分配 |


<span id="6"/>
##### 6、 foo_statistics(统计)

| 字段名 | 类型 | 默认 | 主键 | 备注 |
|-------|------|------|-----|------|
| id | int | 0 | key auto | ID |
| ip_address | varchar(15) | - | - | IP地址 |
| add_time | datetime | - | - | 时间 |
| type | tinyint | - | - | 类型 待定 |
| link_from | varchar(15) | - | - | 来源 |


<span id="7"/>
##### 7、 foo_web_config(页面配置)

| 字段名 | 类型 | 默认 | 主键 | 备注 |
|-------|------|------|-----|------|
| id | int | 0 | key auto | ID |
| key_name | varchar(20) | 0 | - | 字段 |
| key_value | varchar(255) | - | - | 内容 |


<span id="8"/>
##### 8、 foo_action_over(集锦)

| 字段名 | 类型 | 默认 | 主键 | 备注 |
|-------|------|------|-----|------|
| id | int | - | key auto | ID |
| title | varchar(64) | - | - | 标题 |
| pic_url | varchar(255) | - | - | 图片地址 |
| desc | varchar(255) | - | - | 简介 |
| play_url | varchar(255) | - | - | 播放地址 |
| add_time | datetime | - | - | 添加时间 |
| admin_id | int | - | - | 管理员ID |
| is_show | tinyint | - | - | 是否展示 0:否 1:是 |
| is_hot | tinyint | - | - | 是否热门 0:否 1:是 |
| is_good | tinyint | - | - | 是否精华 0:否 1:是 |
| is_del | tinyint | - | - | 是否删除 0:否 1:是 |


<span id="9"/>
##### 9、 foo_players(球队)

| 字段名 | 类型 | 默认 | 主键 | 备注 |
|-------|------|------|-----|------|
| p_id | int | - | key | 队ID |
| p_name | varchar | 32 | - | 队名 |
| p_desc | text | - | - | 队介绍 |
| p_logo | varchar | 255 | - | 队LOGO |
| add_time | datetime | - | - | 添加时间 |
| admin_id | int | - | - | 管理员ID |