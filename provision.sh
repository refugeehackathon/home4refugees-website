#!/usr/bin/env bash

sudo apt-get update
sudo apt-get install -y git curl php5-cli php5-curl php5-mcrypt php5-gd php5-fpm php5-xdebug

### From Installing MySQL

sudo debconf-set-selections <<< 'mysql-server \
 mysql-server/root_password password root'
sudo debconf-set-selections <<< 'mysql-server \
 mysql-server/root_password_again password root'
sudo apt-get install -y php5-mysql mysql-server

sudo service mysql restart

mysql -uroot -proot -e "CREATE DATABASE IF NOT EXISTS home4refugees CHARACTER SET utf8 COLLATE utf8_general_ci;"

### From Installing nginx

sudo apt-get install -y nginx

/bin/cat <<EOM > /etc/nginx/sites-available/default
server {
  listen 80;
  server_name vagrant;
  root /var/www/public;
  index index.php;
  location / {
    try_files \$uri \$uri/ /index.php;
  }
  # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
  location ~ \.php$ {
    fastcgi_pass unix:/var/run/php5-fpm.sock;
    fastcgi_index index.php;
    fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
    include fastcgi_params;
  }
}
EOM
sudo service nginx restart

sudo /bin/cat <<EOM >> /etc/php5/mods-available/xdebug.ini
xdebug.remote_enable=1
xdebug.remote_connect_back=1
xdebug.remote_port=9000

EOM
sudo service php5-fpm restart

# composer
cd /var/www
curl -sS 'https://getcomposer.org/installer' | php
php composer.phar install

# init laravel
cp .env.example .env
php artisan key:generate
php artisan migrate:refresh --seed

echo "You've been provisioned"