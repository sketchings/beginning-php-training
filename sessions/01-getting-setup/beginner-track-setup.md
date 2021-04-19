# Beginner Track Setup

We recommend taking the easiest route available for getting a usable development environment prior to the start of Midwest PHP's beginner track. This tutorial walks you through installing a text editor and operating environment (PHP, Apache webserver, MySQL database server).

**If you already have a working PHP environment, great!** No need to follow this tutorial, use whatever is most comfortable for you.
If you DO NOT have a working PHP environment, we recommend the steps in this tutorial as a simple setup. Alternatively you can also checkout [How To Install PHP 7.4 and Set Up a Local Development Environment on Ubuntu 20.04](https://www.digitalocean.com/community/tutorials/how-to-install-php-7-4-and-set-up-a-local-development-environment-on-ubuntu-20-04)

## Install Editor

PHP files are plain text. Therefore you can write PHP software with a plain-text editor such as notepad for Windows or vim for Mac/Linux. But you'll be far more productive with an Integrated Development Environment (IDE) such as Visual Studio or PhpStorm.

**WARNING** - Do not use a "rich text" editor such as Microsoft Word or TextEdit. You need plain ASCII text (.txt) editing, not rich text (.rtf) editing. Rich-text PHP won't go well.

[Visual Studio](https://visualstudio.microsoft.com/) is free and available for both Windows and Mac. Follow the link for download and installation instructions. Jeffrey Way has an excellent video tutorial series [Visual Studio Code for PHP Developers](https://laracasts.com/series/visual-studio-code-for-php-developers). It's also free.

I personally use [PhpStorm](https://www.jetbrains.com/phpstorm/). It has a 30-day free trial, after which you'll need to purchase a license to continue use. Jeffrey Way has another excellent Laracasts series [Be Awesome in PHPStorm](https://laracasts.com/series/how-to-be-awesome-in-phpstorm).

## Create a Project

Create a new PHP project with your editor. Create the file `hello-world.php` with the following content:

~~~php
<?php
declare(strict_types=1);

echo '<p>Hello World!</p>' . PHP_EOL;
~~~

That file doesn't do anything yet, but you'll be using this file after the next step (installing MAMP). My PhpStorm installation looks like the following screen shot.

![Hello World](figures/Screenshot%202020-04-01%2015.51.50.png)
**Hello World**

## Install MAMP

Your work environment, probably either a Windows or MacBook laptop, requires:

- PHP (version 7.2 or newer)
- Web server
- Database
- Code editor (IDE) such as Visual Studio or PhpStorm

The simplest route is to install MAMP (it's free) on your macOS or Windows computer. Links:

- [MAMP for Mac](https://www.mamp.info/en/mamp/mac/)
- [MAMP for Windows](https://www.mamp.info/en/windows/)

Click here for the [installation instructions](https://documentation.mamp.info/) and tutorials. (Choose the windows or mac version of the documentation as appropriate.) Note that you'll be downloading MAMP PRO even though you're only using the free version (MAMP rather than MAMP PRO). You'll be installing both but only using the non-PRO version.

## Document Root

Launch MAMP. The following screen shots are from my MacBook installation. The next screen shot shows the splash screen.

![MAMP splash page](figures/Screenshot%202020-04-01%2013.21.53.png)
**MAMP splash page**

Click "Start Servers". After a few moments, a webpage should appear in your default browser. In my case the url is <http://localhost:8888/MAMP/?language=English> (next screen shot).

![Localhost home page](figures/Screenshot%202020-04-01%2013.27.49.png)
**Localhost home page**

At this point you have your local website up and running! The next step is to tell the webserver where to find your project with your `hello-world.php`.

Open the MAMP preferences. Choose the "Web Server" tab as shown in the next screen shot.

![Web server preferences](figures/Screenshot%202020-04-01%2016.14.52.png)
**Web server preferences**

Click select and choose the folder (directory) containing your PHP project. It should contain your new `hello-world.php` file. Click ok. MAMP should automatically stop andrestart the webserver.

Reload your localhost home page. You should now see the directory listing including `hello-world.php` as shown in the next screen shot. The `.idea` folder is part of my PhpStorm project installation.

![Refreshed localhost home page](figures/Screenshot%202020-04-01%2016.22.05.png)
**Refreshed localhost home page**

## Hello World

Click on hello-world.php. Success! Your page should look like the next screen shot.

![Hello World](figures/Screenshot%202020-04-01%2016.47.29.png)
**Hello world**

## Database

"Hello World" is all you need for now. However, if you'd like to try connecting to your database, look in the center column of the MAMP splash page for the "MySQL" section. Explore the administration tool phpMyAdmin. Create a new empty database named `inventory`. You should then be able to connect to it using the PHP sample code in that section. We'll use database connections in session 7, Database Basics, on Saturday.
