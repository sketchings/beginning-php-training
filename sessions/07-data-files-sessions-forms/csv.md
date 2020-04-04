## Working with CSV Files

It is not required that CSV files have a header line, although they SHOULD. The examples in this repo are for comma (,) separated columns, however, any character can be used as a delimiter to separate columns. Other common delimiters include pipe (|) and tab (\t). If your CSV file uses a different delimiter, make sure you specify the delimiter in the options of fgetcsv.

A **properly** formatted CSV file will end with an empty line, but you shouldn't count on that.

### CSV Functions
[fgetcsv](https://www.php.net/manual/en/function.fgetcsv.php) — Gets line from file pointer and parse for CSV fields.

> Besides passing the file handler, you can also specify
> 
> **length** Must be greater than the longest line (in characters) to be found in the CSV file (allowing for trailing line-end characters). Otherwise the line is split in chunks of length characters, unless the split would occur inside an enclosure.
> 
> Omitting this parameter (or setting it to 0 in PHP 5.1.0 and later) the maximum line length is not limited, which is slightly slower.
> 
> **delimiter** The optional delimiter parameter sets the field delimiter (one character only).
> 
> **enclosure** The optional enclosure parameter sets the field enclosure character (one character only, like a single or double quote).
> 
> **escape** The optional escape parameter sets the escape character (one character only).

[fputcsv](http://php.net/manual/en/function.fputcsv.php) — formats a line (passed as a fields array) as CSV and write it (terminated by a newline) to the specified file handle. Only the first two parameters are required.

> **handle**
The file pointer must be valid, and must point to a file successfully opened by fopen() or fsockopen() (and not yet closed by fclose()).
> 
> **fields**
An array of values.
> 
> **delimiter**
The optional delimiter parameter sets the field delimiter (one character only). DEFAULT is comma. If you wish to save as tab delimited, you would use
> 
> **enclosure**
The optional enclosure parameter sets the field enclosure (one character only). Treats the characters within the enclosed characters as a single item string. DEFAULT double quote. To use a single quote
> 
> **escape_char**
The optional escape_char parameter sets the escape character (one character only). 

### Example:
```php
$array = [
    'one 1',
    'two [2]',
    'three, "3"'
];
$fh = fopen('test.txt', 'w');
fputcsv($fh, $array);
fputcsv($fh, $array, "\t", "'", "\\");
fclose($fh);
```
#### Results
```
Line 1: "one 1","two's [2]","three, ""3"""
Line 2: 'one 1'   'two''s [2]'    'three, "3"'
```

### Other Documentation

[fseek](http://php.net/manual/en/function.fseek.php) – Sets the file position indicator for the file referenced by handle. The new position, measured in bytes from the beginning of the file, is obtained by adding offset to the position specified by whence.

[fopen](http://php.net/manual/en/function.fopen.php) – binds a named resource, specified by filename, to a stream.

[fgets](http://php.net/manual/en/function.fgets.php) – Gets a line from file pointer.

[fputs](http://php.net/manual/en/function.fputs.php) – Alias of fwrite(), which writes the contents of string to the file stream pointed to by handle.

[fclose](http://php.net/manual/en/function.fclose.php) – closes the file pointed to by handle.