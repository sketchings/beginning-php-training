<?php
/*
 * read json data for book recommendations
 */
$title = 'Book Recomendations';
require 'inc/header.php';

/*echo '<pre>';
include 'data/json/top_programming_books.json';
echo '</pre>';*/

$books = json_decode(file_get_contents('data/json/top_programming_books.json'));
if (is_object($books->collection->books[0])) {
    foreach ($books->collection->books as $book) {
        echo '<div class="panel panel-default">';
    
        echo '<div class="panel-heading">';
        echo '<h3 class="panel-title">' . $book->title . '</h3>';
        echo 'by ' . $book->author_name;
        echo '</div>';
        
        echo '<div class="panel-body media">';
    
        echo '<div class="media-left media-top">';
        echo '<img class="media-object" src="' . $book->book_image_url . '" />';
        echo '</div>';
        
        echo '<div class="media-body">';
        if (strlen($book->book_description) < 500) {
            echo $book->book_description;
        } else {
            echo substr($book->book_description, 0, strpos(
                $book->book_description, ' ', 500
            )) . '...';
        }
        echo '<br />';
        echo '<a href="' . $book->link . '" target="_blank">Learn more...</a>';
        echo '</div>';
    
        echo '</div>';
    
        echo '</div>';
    }
}

require 'inc/footer.php';