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
        <?php if ($Commentaire_all != NULL) { foreach($Commentaire_all as $comm) { ?>
        <div class="media text">
            <div class="media-left">
                <a href="<?php echo base_url(); ?>Users/View/<?php echo $comm['author']; ?>">
                    <img class="media-object" src="<?php echo $comm['avatar']; ?>" alt="Generic placeholder image">
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading"><?php echo $comm['username']; ?> (<?php echo $comm['date_com']; ?>)</h4>
                <?php echo $comm['text']; ?>
            </div>
        </div>
        <?php } } else { echo ('<div class="text">Aucun commentaire</div>'); } ?>
    </div>
</div>
<div id="news">
    <div class="news_header">Ajouter un commentaire</div>
    <div class="news_content">
        <form class="text" id="ADDCOMMENT" data-newsid="<?php echo $News_id; ?>">
            <textarea class="form-control textarea-addcomment"></textarea>
            <button type="submit" class="btn btn-primary btn-addcomment">Primary</button>
        </form>
    </div>
</div>