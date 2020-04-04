<?php

$new_book = [
    'title' => filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING),
    'link' => filter_input(INPUT_POST, 'link', FILTER_SANITIZE_URL),
    'book_image_url' => filter_input(INPUT_POST, 'book_image_url', FILTER_SANITIZE_URL),
    'book_description' => filter_input(INPUT_POST, 'book_description', FILTER_SANITIZE_STRING),
    'num_pages' => filter_input(INPUT_POST, 'num_pages', FILTER_SANITIZE_NUMBER_INT),
    'author_name' => filter_input(INPUT_POST, 'author_name', FILTER_SANITIZE_STRING),
    'isbn' => filter_input(INPUT_POST, 'isbn', FILTER_SANITIZE_NUMBER_INT),
    'average_rating' => filter_input(INPUT_POST, 'average_rating', FILTER_SANITIZE_NUMBER_FLOAT),
    'book_published' => filter_input(INPUT_POST, 'book_published', FILTER_SANITIZE_NUMBER_INT),
];

$file = '../data/json/top_programming_books.json';
$books = json_decode(file_get_contents($file));

if (is_object($books->collection->books[0])) {
    $books->collection->books[] = $new_book;
}

$json = json_encode($books, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
//echo '<pre>' . $json . '</pre>';
file_put_contents($file, $json);
header('location: /books.php');