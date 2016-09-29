<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="news">
    <div class="news_header"><?php echo $News_title; ?></div>
    <div class="news_content">
        <div class="info">
            Par <span data-user="<?php echo $News_author; ?>">%s</span> / <?php echo $News_time; ?>
        </div>
        <div class="text">
            <?php echo $News_content; ?>
        </div>
    </div>
</div>
<div id="news">
    <div class="news_header">Commentaire(s)</div>
    <div class="news_content">
        <div class="media text">
            <div class="media-left">
                <a href="#">
                    <img class="media-object" src="https://dummyimage.com/64x64/000/fff" alt="Generic placeholder image">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">Media heading</h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
    </div>
</div>