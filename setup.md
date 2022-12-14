Follwing are steps to deploy/run  the application

1. Install composer or if you have already install update the compser by using following command
composer install
composer update

2. Create database set its credtials in .env file

3. Once database get created run migration by using follwing command.
php artisan migrate

4. Now you can run system
php artisan serve

5. You can check swagger on following route
  <base_url>/api/documentation

6.I have attached video of demo too (screen-capture)