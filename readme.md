# challenge_dailyTag
後端菜鳥挑戰賽

## Getting Started
### Reconstruction challenge_dailyTag project
#### step 1 - Clone project

`git clone https://github.com/LinHuanJhih0913/challenge_dailyTag.git`

#### step 2 - Change directory to challenge_dailyTag

`cd challenge_dailyTag`

#### step 3 - Create vendor directory

`composer install`

#### step 4 - Create .env file

`cp .env.example .env`

#### step 5 - Setting .env file

Such as database related parameters DB_DATABASE, DB_USERNAME and DB_PASSWORD

#### step 6 - Generate a new APP_KEY

`php artisan key:generate`

#### step 7 - Create a database

#### step 8 - Migrate database migration

`php artisan migrate`
 