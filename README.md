# Web page monitor

This is a test project assigned by IteriaSoft to Alexander Babayev with a purpose to test his abilities if he is able to produce desirable IT solutions as a PHP (Laravel) Software Developer.


## Requirements

- PHP 7.4+
- Laravel 8.0+
- MySQL 5.0+
- composer 2.0.8+


## Installation (for developers)

To deploy the service on you local machine use your command line tool (cmd, bash, terminal, iTerm, etc.), cd into your web root directory and execute next set of commands:


### Get the source code and create your feature branch

```bash
git clone https://github.com/aleksanderbabayev/web-page-monitor.git web-page-monitor
cd web-page-monitor
git checkout -b mybranch main
composer require jfcherng/php-diff
```


### Create and configure the '.env' file

Copy '.env.example' to '.env' file.
```bash
cp .env.example .env
```

Open the '.evn' file in your text editor and replace next parameters values with yours:

```text
APP_NAME=Web_Page_Monitor
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wpmonitor
DB_USERNAME=root
DB_PASSWORD=
```

### Create a database

Connect to you MySQL server with your favorite command line tool and create a new database:

```bash
create database wpmonitor;
```

Get back to you OS command line tool into the project's directory and execute:

```bash
php artisan migrate
```

Generate application key:

```bash
php artisan key:generate
```


## Usage

### Run the service

```bash
php artisan serve --port 8000
```

### Run the sheduler

```bash
php artisan schedule:work
```