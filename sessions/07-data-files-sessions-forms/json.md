## Working with JSON Files

It is not required that CSV files have a header line, although they SHOULD. The examples in this repo are for comma (,) separated columns, however, any character can be used as a delimiter to separate columns. Other common delimiters include pipe (|) and tab (\t). If your CSV file uses a different delimiter, make sure you specify the delimiter in the options of fgetcsv.

### JSON Functions
[json_decode](https://www.php.net/manual/en/function.json-decode.php) – Decodes a JSON string

> **assoc** – When TRUE, returned objects will be converted into associative arrays.
> 
> **depth** – User specified recursion depth.
> 
> **options** – Bitmask of JSON decode options. Currently there are two supported options. The first is JSON_BIGINT_AS_STRING that allows casting big integers to string instead of floats which is the default. The second option is JSON_OBJECT_AS_ARRAY that has the same effect as setting assoc to TRUE.
> 
> ***NOTE ON RETURN VALUES:** Returns the value as the appropriate PHP type (object or array). Values true, false and null are returned as TRUE, FALSE and NULL respectively. NULL is returned if the json cannot be decoded or if the encoded data is deeper than the recursion limit.*

[json_encode](https://www.php.net/manual/en/function.json-encode.php) – Returns the JSON representation of a value

> The [options]() are bitmasks consisting of JSON_PRETTY_PRINT and JSON_UNESCAPED_SLASHES. Other options that are available include: JSON_HEX_QUOT, JSON_HEX_TAG, JSON_HEX_AMP, JSON_HEX_APOS, JSON_NUMERIC_CHECK, JSON_FORCE_OBJECT, JSON_PRESERVE_ZERO_FRACTION, JSON_UNESCAPED_UNICODE, JSON_PARTIAL_OUTPUT_ON_ERROR. The behaviour of these constants is described on the [JSON constants](https://www.php.net/manual/en/json.constants.php) page.

### Validating & Formatting JSON
The [JSON Formatter](https://jsonformatter.curiousconcept.com/) was created to help with debugging JSON. As JSON data is often output without line breaks to save space, it is extremely difficult to actually read and make sense of it. This little tool attemps to solve the problem by formatting the JSON data so that it is easy to read and debug by human beings.
