<?php
/**
 * Form for adding more books to the json file
 * title, link, book_image_url, book_description, num_pages,
 * author_name, isbn, average_rating, book_published
 */
$title = 'Add Book';
require 'inc/header.php';
?>
<form method="post" action="inc/write_json.php">
    <div class="form-group input-group-lg">
        <label class="control-label" for="title">Title</label>
        <input class="form-control" type="text" name="title" id="title" required />
    </div>

    <div class="form-group input-group-lg">
        <label for="link">Link</label>
        <input class="form-control" type="url" name="link" id="link" placeholder="http://" required />
    </div>

    <div class="form-group input-group-lg">
        <label for="book_image_url">Image</label>
        <input class="form-control" type="url" name="book_image_url" id="book_image_url" placeholder="http://" />
    </div>

    <div class="form-group">
        <label for="book_description">Description</label>
        <textarea class="form-control" rows="3" name="book_description" id="book_description"></textarea>
    </div>

    <div class="form-group input-group-lg">
        <label for="num_pages">Pages</label>
        <input class="form-control" type="number" name="num_pages" id="num_pages" />
    </div>

    <div class="form-group input-group-lg">
        <label for="author_name">Author</label>
        <input class="form-control" type="text" name="author_name" id="author_name" required />
    </div>

    <div class="form-group input-group-lg">
        <label for="isbn">ISBN</label>
        <input class="form-control" type="number" name="isbn" id="isbn" />
    </div>

    <div class="form-group input-group-lg">
        <label for="average_rating">Rating</label>
        <input class="form-control" type="text" name="average_rating" id="average_rating" />
    </div>

    <div class="form-group input-group-lg">
        <label for="book_published">Published</label>
        <input class="form-control" type="number" name="book_published" id="book_published" />
    </div>

    <button class="btn-lg btn-default" type="submit"><?php echo $title; ?></button>
</form>
<?php
require 'inc/footer.php';