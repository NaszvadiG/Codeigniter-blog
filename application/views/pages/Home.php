<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
if ($GetListeNews != null) {
    foreach ($GetListeNews as $value) { 
    ?>
<div class="news_home">
    <div class="news_home_header"><?php echo $value['titre']; ?></div>
    <div class="news_home_content">
        <div class="info">
            Par <span data-user="<?php echo $value['author']; ?>">%s</span> / <?php echo $value['date_created']; ?>
        </div>
        <div class="contentainer">
            <div class="screen">
                <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNTRiZjRmNzVlOSB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1NGJmNGY3NWU5Ij48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQzLjUiIHk9Ijc0LjgiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" class="img-fluid" alt="Responsive image">
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
                    <a href="#">
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