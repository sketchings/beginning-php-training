###Installing Composer https://getcomposer.org/doc/00-intro.md

1. Follow the instruction on the composer download page https://getcomposer.org/download/
```php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"```
2. If you want to install composer globally you can move composer.phar to a directory that is in your path: 
`mv composer.phar /usr/local/bin/composer
3. Change directory in your terminal to be in the project root
`cd ~/Sites/beginning-php-training/sessions/05-composer/sample-code`