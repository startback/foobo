## api文档


* 1、 [爬虫数据采集填充--直播](#1)
* 2、 [爬虫数据采集填充--集锦](#2)


<span id="1"/>
### 1, 爬虫数据采集填充--直播

```post index.php?m=api&c=index&a=action_bug```

| 参数名 | 类型 | 是否必须 | 说明 |
|-------|------|---------|-------|
| do_id | int | yes | 0写入 1更新 |
| act_id | str | yes | 赛事ID(最多15位) |
| act_name | str | yes | 赛事名（如西超） |
| type_id | int | yes | 类型ID（不确定先填0） |
| act_time | str | yes | 赛事时间 |
| is_good | int | yes | 精华 0否1是 |
| is_hot | int | yes | 热门 0否1是 |
| is_show | int | yes | 展示 0否1是 |
| is_over | int | yes | 结束 0否1是 |
| left_num | int | yes | 左队得分 |
| right_num | int | yes | 右队得分 |
| left_p_id | str | yes | 左队 |
| right_p_id | str | yes | 右队 |
| status_desc | str | no | 赛事进展状况 |
| act_platform | str | yes | 平台及播放地址 格式: [{"name":"QQ","url":"111111"},{"name":"TT","url":"55555"}] |


返回：

```
{
  "code": 0,
  "mgs":"成功",
  "data": {}
}

```



<span id="2"/>
### 2, 爬虫数据采集填充--集锦

```post index.php?m=api&c=index&a=action_over_bug```

| 参数名 | 类型 | 是否必须 | 说明 |
|-------|------|---------|-------|
| title | str | yes | 标题 |
| desc | str | no | 简介 |
| play_url | str | yes | 播放地址 |
| is_good | int | yes | 精华 0否1是 |
| is_hot | int | yes | 热门 0否1是 |
| is_show | int | yes | 展示 0否1是 |


图片传输 http协议 参数:images[0]

返回：

```
{
  "code": 0,
  "mgs":"成功",
  "data": {}
}

```