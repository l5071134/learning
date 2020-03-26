# cat 相关api接口

## 查看集群状态
    
    curl -XGET "127.0.0.1:19200/_cat/health?pretty&v" -H 'Content-Type: application/json'
    
    epoch      timestamp cluster       status node.total node.data shards pri relo init unassign pending_tasks max_task_wait_time active_shards_percent
    1584030785 16:33:05  elasticsearch yellow          1         1     15  15    0    0       15             0                  -                 50.0%
    
  如何快速了解集群的健康状况？green、yellow、red？
  
  green：每个索引的primary shard和replica shard都是active状态的  
  yellow：每个索引的primary shard都是active状态的，但是部分replica shard不是active状态，处于不可用的状态  
  red：不是所有索引的primary shard都是active状态的，部分索引有数据丢失了
  
## 查看集群中有哪些索引

    curl -XGET "127.0.0.1:19200/_cat/indices?pretty&v" -H 'Content-Type: application/json'
    
    health status index            uuid                   pri rep docs.count docs.deleted store.size pri.store.size
    yellow open   partners_v1      uwIV5FCETCuoB79a9jrxvA   5   1          0            0      1.2kb          1.2kb
    yellow open   minip_log_test   K9O6eaP1RUyH6ApS_vM0zA   5   1        491            0        2mb            2mb
    yellow open   test_partners_v1 boPcjm4zSpK0RXf1kYfWVg   5   1        203            0    481.9kb        481.9kb
## 简单的索引操作

  创建索引：curl -XPUT "127.0.0.1:19200/test_index?pretty" 
  
      {
        "acknowledged" : true,
        "shards_acknowledged" : true,
        "index" : "test_index"
      }
  
  删除索引：curl -XDELETE "127.0.0.1:19200/test_index?pretty"  
  
      {
        "acknowledged" : true
      }