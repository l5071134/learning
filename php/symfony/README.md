#通过数据库反向生成entity

##生所所有表数据
php bin/console  doctrine:mapping:import --force AppBundle php
php bin/console doctrine:mapping:convert annotation ./src
php bin/console doctrine:generate:entities

##生所部分表数据
php bin/console doctrine:mapping:import AppBundle yml --filter=Users 
php bin/console doctrine:mapping:convert annotation ./src --filter=Users
php bin/console doctrine:generate:entities AppBundle:Users