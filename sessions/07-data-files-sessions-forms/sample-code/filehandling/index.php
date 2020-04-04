<?php
$title = 'Welcome';
require 'inc/header.php';
?>

<p>This site is used to explore the file handling features of PHP: reading, writing and parsing.</p>
<ul>
    <li><a href="people.php">People</a> are read from a CSV file and the <a href="add_person.php">Add People</a> form appends a CSV formated line to the end of a file.</li>
    <li><a href="books.php">Books</a> are read from a JSON file and the <a href="add_book.php">Add Book</a> form adds another book to the JSON book collection then rewrites the file.</li>
    <li><a href="podcasts">Podcasts</a> are read from an XML file and the <a href="add_episode.php">Add Episode</a> form adds another episode to the podcast selected. This Episode is added to XML collection of episode items, then rewrites the file.</li>
</ul>

<p>You will also find some personal recommendations of Alena Holligan</p>

<?php
require 'inc/footer.php';