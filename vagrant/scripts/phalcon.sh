#!/usr/bin/env bash

echo "Installing Phalcon 2..."

sudo apt-add-repository ppa:phalcon/stable
sudo apt-get update
sudo apt-get install php5-phalcon

sudo -s
echo "extension=phalcon.so">/etc/php5/conf.d/phalcon.ini
exit
