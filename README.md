# PhotoBook

Photo book project (Symfony + ReactPHP)

**In Development!**



**How to run project:**

1. Clone project:
  ```
  git clone https://github.com/tim96/PhotoBook.git PhotoBook
  ```

2. Change directory:
  ```
  cd Photobook
  ```

3. Run composer to download all packages for project:
  ```php
  composer update
  ```
    
  Or if you don't have composer:
  ```php
  php composer.phar self-update
  php composer.phar update
  ```
   
4. Create database:
  ```php
  php app/console doctrine:database:create
  ```

5. Prepare tables:
  ```php
  php app/console doctrine:schema:update --dump-sql
  ```

6. Clear cache:
  ```php
  php app/console cache:clear
  php app/console cache:clear --env=prod --no-debug
  ```

7. Install web resources:
  ```php
  php app/console assets:install web --symlink
  ```

8. Load fixtures data:
  ```php
  php app/console doctrine:fixtures:load
  ```
  or (Without purge data)
  ```php
  php app/console doctrine:fixtures:load --append
  ```

9. Run project (Using php web server):
  ```php
  php app/console server:run localhost:9090
  ```
  
10. Run project (Using ReactPHP web server). Default port - 9090:
  ```php
  php react/app.php
  ```
