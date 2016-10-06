<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
if ($GetListeNews != null) {
    foreach ($GetListeNews as $value) { 
    ?>
<div class="news_home">
    <div class="news_home_header"><?php echo $value['titre']; ?> <small>(<?php echo $value['name']; ?>)</small></div>
    <div class="news_home_content">
        <div class="info">
            Par <span data-user="<?php echo $value['author']; ?>"><?php echo $value['username']; ?></span> / <?php echo $value['date_created']; ?>
        </div>
        <div class="contentainer">
            <div class="screen">
                <img src="<?php echo $value['img_home']; ?>" class="img-fluid" alt="Responsive image">
            </div>
            <div class="message">
                <?php
                if(strlen($value['news'])<=170){
                    echo $value['news'];
                }else{
                   echo substr($value['news'],0,170) . '...';
                }
                ?>
                <div class="show_more">
                    <a href="<?php base_url(); ?>Home/News/<?php echo $value['id']; ?>">
                        Lire la suite
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<div class="row">
    <div class="col-xs-12 text-center">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
<?php } ?>