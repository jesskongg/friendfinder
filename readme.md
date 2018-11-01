# Friend Finder

## Installation

1. Install XAMPP (produciton is on Ubuntu)
    1. For Linux, [follow this guide](https://linoxide.com/ubuntu-how-to/install-xampp-stack-ubuntu-16-04-terminal/)
2. Clone this repo into the `/opt/lampp/htdocs/` folder
3. [Link PHP with this guide](https://www.quora.com/Do-I-need-to-install-PHP-after-installing-Xampp)
4. `chmod -R 777 /opt/lampp/`
5. Install Composer: `wget <latest version>`, then `php ~/Downloads/composer.phar --version`, then `cp ~/Downloads/composer.phar /usr/local/bin/composer`, and finally `sudo chmod +x /usr/local/bin/composer`
6. `composer install` inside of the repo (htdocs/friendfinder)
7. `cp .env.example .env`, and change the following .env things to 
    `DB_DATABASE=homestead
    DB_USERNAME=root
    DB_PASSWORD=''`
8. `mysql -u root` and `CREATE DATABASE homestead;`
9. `composer dump-autoload`
10. `php artisan migrate:fresh --seed `
11. `php artisan key:generate`
12. Now visit `localhost/friendfinder/public` or whatever IP you're at!