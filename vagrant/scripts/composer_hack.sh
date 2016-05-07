#!/usr/bin/env bash

echo "Disabling CLI xdebug for composer speedup"
sudo rm /etc/php5/cli/conf.d && cp -r /etc/php5/conf.d /etc/php5/cli
sudo cp /vagrant/vagrant/etc/.bash_aliases /root/.bash_aliases
sudo cp /vagrant/vagrant/etc/.bash_aliases /home/vagrant/.bash_aliases
sudo chown vagrant:vagrant /home/vagrant/.bash_aliases
sudo echo ";"`cat /etc/php5/conf.d/xdebug.ini` > /etc/php5/cli/conf.d/xdebug.ini
