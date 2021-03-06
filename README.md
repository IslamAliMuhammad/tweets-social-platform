# Tweets Social Platform

Tweets social platform is a full-stack web app that allows users to tweet their ideas and interact with each other through many features e.g. following each other, like and dislike tweets, and bookmaker tweets.

## Built With
* [PHP](https://www.php.net/) & [Laravel](https://laravel.com/)
* [MySQL](https://www.mysql.com/)
* [Livewire](https://laravel-livewire.com/) 
* [Bootstrap](https://getbootstrap.com/)

## App Screenshots

![Home](/app-screenshots/1.PNG)
![Profile](/app-screenshots/2.PNG)
![Explore](/app-screenshots/3.PNG)
![Bookmarks](/app-screenshots/4.PNG)
![Tweet Input](/app-screenshots/5.PNG)
![Edit Profile](/app-screenshots/6.PNG)

## Getting Started 

### Prerequisites 
* XAMPP development environment [download](https://www.apachefriends.org/index.html) (*Optional*)
* Composer Dependency Manager [download](https://getcomposer.org/download/)

### Installation 
1. Clone the repo 
   ```sh
   git clone https://github.com/IslamAliMuhammad/tweets-social-platform.git
   ```
2. Install the dependencies
   ```sh
   composer install
   ```
3. Create database in your localhost.
4. Create .env file on root folder then Copy KEY=VALUE pairs from .env.example to .env. 
5. Set the application key
   ```sh
   php artisan key:generate
   ```
6. Create virtual host then enter `http://{virtual-host-name}` into your browser.
7. Create symbolic link
   ```sh
   php artisan storage:link
   ```
   
## License
[MIT](https://choosealicense.com/licenses/mit/)
