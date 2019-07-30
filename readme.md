HOTFIX
1.  Download necessary files
composer install/update

2.  create configuration file
copy .env_example to .env and edit it

3.  Generate Key
./artisan key:generate

4.  set writable to storage and bootstrap

5.  npm install

6.  Building Database
./artisan migrate

7.  Publish LaravelTheme
./artisan vendor:publish --provider="Igaster\LaravelTheme\themeServiceProvider"

8. Import countries.sql to db