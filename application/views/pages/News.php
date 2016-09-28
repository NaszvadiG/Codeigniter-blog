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