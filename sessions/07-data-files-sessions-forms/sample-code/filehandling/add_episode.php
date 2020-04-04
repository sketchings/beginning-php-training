<?php
/**
 * Form for adding more people to the csv file
 * title, link, pubDate, description
 * itunes namespaced:
 * subtitle (description), summary (description), explicit, duration
 */
$title = 'Add Episode';
require 'inc/header.php';
?>
<form method="post" action="inc/write_xml.php">

    <div class="form-group input-group-lg">
        <label class="control-label" for="file">Podcast</label>
        <select class="form-control" name="file" id="file" required>
            <?php
            if ($handle = opendir('data/xml')) {
                while (false !== ($entry = readdir($handle))){
                    if (substr($entry,0,1) != '.') {
                        echo '<option value="' . $entry . '">';
                        echo ucwords(str_replace(['_','.xml'], [' ',''], $entry));
                        echo '</option>';
                    }
                }
                closedir($handle);
            }
            ?>
        </select>
    </div>
    <div class="form-group input-group-lg">
        <label class="control-label" for="title">Tite</label>
        <input class="form-control" type="text" name="title" id="title" required />
    </div>

    <div class="form-group input-group-lg">
        <label class="control-label" for="link">Link</label>
        <input class="form-control" type="url" name="link" id="link" placeholder="http://" required />
    </div>

    <div class="form-group input-group-lg">
        <label class="control-label" for="pubDate">Date</label>
        <input class="form-control" type="date" name="pubDate" id="pubDate" required />
    </div>

    <div class="form-group">
        <label class="control-label" for="description">Description</label>
        <textarea class="form-control" rows="3" name="description" id="description"></textarea>
    </div>

    <div class="form-group input-group-lg">
        <label class="control-label" for="explicit">Expicit</label>
        <select class="form-control" name="explicit" id="explicit">
            <option>clean</option>
            <option>no</option>
            <option>yes</option>
        </select>
    </div>

    <div class="form-group input-group-lg">
        <label class="control-label" for="duration">Duration</label>
        <input class="form-control" type="text" name="duration" id="duration" placeholder="00:00"/>
    </div>

    <button class="btn-lg btn-default" type="submit"><?php echo $title; ?></button>
</form>
<?php
require 'inc/footer.php';