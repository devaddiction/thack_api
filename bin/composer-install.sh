#!/bin/bash

DIR=$( cd "$( dirname "$0" )" && cd .. && pwd )

cd $DIR

$DIR/bin/composer.phar global require hirak/prestissimo $@

$DIR/bin/composer.phar install $@

# once more because phpdoc is "challenged"
$DIR/bin/composer.phar install --optimize-autoloader $@
