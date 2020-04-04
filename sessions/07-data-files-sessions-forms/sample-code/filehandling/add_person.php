<?php
/**
 * Form for adding more people to the csv file
 * first,last,website,twitter,img
 */
$title = 'Add Person';
require 'inc/header.php';
?>
<form method="post" action="inc/write_csv.php">
    <div class="form-group input-group-lg">
        <label class="control-label" for="first">First Name</label>
        <input class="form-control" type="text" name="first" id="first" />
    </div>

    <div class="form-group input-group-lg">
        <label for="last">Last Name</label>
        <input class="form-control" type="text" name="last" id="last" />
    </div>

    <div class="form-group input-group-lg">
        <label for="website">Website</label>
        <div class="input-group input-group-lg">
            <span class="input-group-addon" id="website-addon">http://</span>
            <input class="form-control" aria-describedby="website-addon" type="text" name="website" id="website" />
        </div>
    </div>

    <div class="form-group input-group-lg">
        <label for="twitter">Twitter</label>
    <div class="input-group input-group-lg">
        <span class="input-group-addon" id="twitter-addon">@</span>
        <input class="form-control" aria-describedby="twitter-addon" type="text" name="twitter" id="twitter" />
    </div>
    </div>

    <div class="form-group input-group-lg">
        <label for="img">Image</label>
        <input class="form-control" type="text" name="img" id="img" placeholder="http://" />
    </div>

    <button class="btn-lg btn-default" type="submit"><?php echo $title; ?></button>
</form>
<?php
require 'inc/footer.php';