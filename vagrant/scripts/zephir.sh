#!/usr/bin/env bash

echo "Installing Zephir..."

sudo apt-get install -y git gcc make re2c php5-dev libpcre3-dev

mkdir -p ~/build
cd ~/build

git clone https://github.com/phalcon/zephir
cd zephir
./install-json
./install -c
