# Beginner Track Setup

We recommend taking the easiest route available for getting a usable development environment
prior to the start of Midwest PHP's beginner track.

## Install MAMP

Your work environment, probably either a Windows or MacBook laptop, requires:

 - PHP (version 7.2 or newer)
 - Web server
 - Database
 - Code editor (IDE) such as Visual Studio or PhpStorm

The simplest route is to install MAMP (it's free) on your macOS or Windows computer. Links:

 - [MAMP for Mac](https://www.mamp.info/en/mamp/mac/)
 - [MAMP for Windows](https://www.mamp.info/en/windows/)

Click here for the [installation instructions](https://documentation.mamp.info/) and tutorials.
(Choose the windows or mac version of the documentation as appropriate.)
Note that you'll be downloading MAMP PRO even though you're only using the free version
(MAMP rather than MAMP PRO). You'll be installing both but only using the non-PRO version.

## Install Editor

[Visual Studio](https://visualstudio.microsoft.com/) is free and available for both Windows and
Mac. Follow the link for download and installation instructions.

I personally use [PhpStorm](https://www.jetbrains.com/phpstorm/). It has a 30-day free trial after
which you'll need to purchase a license to continue use.

## Hello World

Launch MAMP. The following screen shots are from my MacBook installation. Figure 1 shows the
splash screen (with my editing this document in PhpStorm in the background).

![Figure 1. MAMP splash page](figures/Screenshot%202020-04-01%2013.21.53.png)

Click "Start Servers". After a few moments, a webpage should appear in your default browser.
In my case the url is <http://localhost:8888/MAMP/?language=English> (Figure 2).

![Figure 2. Localhost home page](figures/Screenshot%202020-04-01%2013.27.49.png)

At this point you have your local website up and running! Go back to the [documentation for
either Mac or Windows](https://documentation.mamp.info/) and click either
[Mac](https://documentation.mamp.info/en/MAMP-Mac/) or
[Windows](https://documentation.mamp.info/en/MAMP-Windows/). You were probably already there
for the "Installation" and "First Steps" instructions. From the left-hand navigation column
click on **Preferences > Web Server**.

Note the document root. That's where you'll be putting your PHP files. For example, on my
mac in a command-line shell, I navigated to the document root and created a file
"hello.txt":

~~~shell script
cd /Applications/MAMP/htdocs
echo Hello World > hello.txt
~~~

Now, on your local website (Figure 2), click on MY WEBSITE at the top. You'll see an empty
directory listing or, in my case, hello.txt.

![Figure 3. My website](figures/Screenshot%202020-04-01%2013.44.55.png)

If I click on "hello.txt" the page will in fact display the plain-text content of that file.


