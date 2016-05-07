#!/usr/bin/env bash

sudo service php5-fpm restart
cd /vagrant
composer install
