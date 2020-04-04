## File Handling Cheat Sheet
### Accessing Directory
#### Read Directory Files into Array
```php
$dir = 'example';
$files = scandir($dir, 'w') or die('Cannot read directory: '.$dir);
//implicitly creates file
foreach ($files as $file) {
//do something with $file
}
```
#### Open and Close Directory
```php
$dir = 'example';
$dh = opendir($dir) or die('Cannot open file: '.$file);
//access directory
closedir($dh);
```
#### Read Directory
```php
$dir = 'example';
if ($dh = opendir($dir)) {
  while (($file = readdir($dh)) !== false) {
    if (substr($file, 0, 1) !== '.') {
      //do something with $file
    }
  }
  closedir($dh);
}
```
### Accessing Files
#### Create a File
```php
$file = 'file.txt';
$fh = fopen($file, 'w') or die('Cannot open file: '.$file);
//implicitly creates file
fclose($fh);
```
#### Open and Close a File
```php
$file = 'file.txt';
$fh = fopen($file, 'w') or die('Cannot open file: '.$file);
//open file ('w','r','a')... see mode below
fclose($fh);
```
#### Read a File
```php
$file = 'file.txt';
$fh = fopen($file, 'r');
$data = fread($fh,filesize($file));
fclose($fh);
```

#### Write to a File
```php
$file = 'file.txt';
$fh = fopen($file, 'w') or die('Cannot open file: '.$file);
$data = 'This is the data';
fwrite($fh, $data);
fclose($fh);
```
#### Append to a File
```php
$file = 'file.txt';
$fh = fopen($file, 'a') or die('Cannot open file: '.$file);
$data = 'New data line 1';
fwrite($fh, $data);
$new_data = "\n".'New data line 2';
fwrite($fh, $new_data);
fclose($fh);
```
#### Delete a File
```php
$file = 'file.txt';
unlink($file);
```
## Directory Functions
Here is a list of directory functions supported in PHP:

 - [chdir](http://php.net/manual/en/function.chdir.php)  — Change directory
 - [chroot](http://php.net/manual/en/function.chroot.php) — Change the root directory
 - [closedir](http://php.net/manual/en/function.closedir.php) — Close directory handle
 - [dir](http://php.net/manual/en/function.dir.php) — Return an instance of the Directory class
 - [getcwd](http://php.net/manual/en/function.getcwd.php) — Gets the current working directory
 - [opendir](http://php.net/manual/en/function.opendir.php) — Open directory handle
 - [readdir](http://php.net/manual/en/function.readdir.php) — Read entry from directory handle
 - [rewinddir](http://php.net/manual/en/function.rewinddir.php) — Rewind directory handle
 - [scandir](http://php.net/manual/en/function.scandir.php) — List files and directories inside the specified path

For other related functions such as [dirname()](http://php.net/manual/en/function.dirname.php), [is_dir()](http://php.net/manual/en/function.is-dir.php), [mkdir()](http://php.net/manual/en/function.mkdir.php), and [rmdir()](http://php.net/manual/en/function.rmdir.php), see the [File System Functions](http://php.net/manual/en/ref.filesystem.php).

## File Modes
| Modes | Description                                                                                                                                                      |
|-------|------------------------------------------------------------------------------------------------------------------------------------------------------------------|
|   r   | **Open a file for read only.** File pointer starts at the beginning of the file                                                                                  |
|   w   | **Open a file for write only.** Erases the contents of the file or creates a new file if it doesn't exist. File pointer starts at the beginning of the file      |
|   a   | **Open a file for write only.** The existing data in file is preserved. File pointer starts at the end of the file. Creates a new file if the file doesn't exist |
|   x   | **Creates a new file for write only.** Returns FALSE and an error if file already exists                                                                         |
|   r+  | **Open a file for read/write.** File pointer starts at the beginning of the file                                                                                 |
|   w+  | **Open a file for read/write.** Erases the contents of the file or creates a new file if it doesn't exist. File pointer starts at the beginning of the file      |
|   a+  | **Open a file for read/write.** The existing data in file is preserved. File pointer starts at the end of the file. Creates a new file if the file doesn't exist |
|   x+  | **Creates a new file for read/write.** Returns FALSE and an error if file already exists                                                                         |