DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
tests                    contains various tests for the advanced application
    codeception/         contains tests developed with Codeception PHP Testing Framework

```
Cau hinh project de chay
------------------------
```
1. Cai composer
2. Composer install ( Buoc nay neu loi phai cai them bower, npm)
3. Import eccube3_db.sql ( db de doc )
4.Cau hinh db :
common/config
( luu y db la mac dinh cho phep ghi db2 la database de doc ) 
4. Chay migarte
 ```
 Cau hinh modules
 ----------------------
 ```
 http://www.yiiframework.com/doc-2.0/guide-structure-modules.html#
 
 Vi du san trong frontend/modules/order
 
config modules trong config/main.php
router : /index.php?r=order/site/index
```
