#!/usr/bin/env bash

echo "Installing PHP..."

sudo apt-get -y install php5 php5-cli php5-dev php5-fpm php5-curl php5-mcrypt php5-memcache php5-memcached php5-xsl php5-tidy php5-xdebug php5-mysqlnd  php5-cli php5-mysqlnd php5-curl php5-gd php5-memcached php5-memcache php5-fpm php5-tidy php5-xdebug php5-dev php-apc libpcre3-dev php5-xmlrpc php5-odbc

sudo curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

sudo cp /vagrant/vagrant/etc/php5/fpm/pool.d/www.conf /etc/php5/fpm/pool.d/www.conf

sudo /etc/init.d/php5-fpm restart
