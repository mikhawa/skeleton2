# skeleton2
## Symfony 4 Project
### step 1 : install
    composer create-project symfony/website-skeleton skeleton2
### step 2 : security checker
    composer require sensiolabs/security-checker --dev
- verify good version in vendor
### step 3 : create datas
create a mysql database with Workbench
- skeleton2.mwb
- skeleton2-structure.png
- first-export.sql
### step 4 : change .env
with the real DATABASE_URL
### step 5 : create mapping
    php bin/console doctrine:mapping:import App\\Entity annotation --path=src/Entity
### step 6 : generate getters and setters
    php bin/console make:entity App\Entity --regenerate
