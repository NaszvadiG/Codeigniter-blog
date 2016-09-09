<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <title><?php echo $title; ?></title>
        <?php
        if (isset ( $includes_for_layout ['css'] ) and count ( $includes_for_layout ['css'] ) > 0) {
            foreach ( $includes_for_layout ['css'] as $css ) {
                echo ('<link rel="stylesheet" type="text/css" href="' . $css ['file'] . '"' . ($css ['options'] === NULL ? '' : ' media="' . $css ['options'] . '"') . '>' . "\r\n");
            }
        }
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-8 offset-xs-2">
                    <nav class="navbar navbar-light bg-faded" style="background-color: #556A7F;">
                        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
                            &AElig;&#9776;
                        </button>
                        <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
                            <a class="navbar-brand" href="#">Navbar</a>
                            <ul class="nav navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                </li>
                            </ul>
                            <form class="form-inline pull-xs-right">
                                <input class="form-control" type="text" placeholder="Recherche">
                                <button class="btn" type="submit">Recherche</button>
                            </form>
                            <div class="pull-xs-right lang_select">
                                    <img data-lang="fr" src="<?php echo base_url(); ?>assets/images/lang/fr.png" />
                                    <img data-lang="en" src="<?php echo base_url(); ?>assets/images/lang/en.png" />
                                
                            </div>
                        </div>      
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 offset-xs-3">
                    <div class="flash_notif"></div>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="ContentJs">
            <div class="row">
                <div class="col-xs-2 offset-xs-1">
                    <div id="BoxPrimary"> <!-- For menu ? : https://github.com/onokumus/metisMenu ??? -->
                        <div class="title">Menu</div>
                        <div class="content">
                            <ul id="menu">
                                <li class="active"><a href="#">Menu 0 <span class="fa arrow"></span></a>
                                <ul>
                                    <li><a href="#">item 0.1</a></li>
                                    <li><a href="#">item 0.2</a></li>
                                    <li><a href="http://onokumus.com">onokumus</a></li>
                                    <li><a href="#">item 0.4</a></li>
                                </ul>
                                </li>
                                <li>
                                    <a href="#">Menu 1 <span class="glyphicon arrow"></span></a>
                                    <ul>
                                        <li><a href="#">item 1.1</a></li>
                                        <li><a href="#">item 1.2</a></li>
                                        <li>
                                            <a href="#">Menu 1.3 <span class="fa plus-times"></span></a>
                                            <ul>
                                                <li><a href="#">item 1.1</a></li>
                                                <li><a href="#">item 1.2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">item 1.4</a></li>
                                        <li>
                                            <a href="#">Menu 1.5 <span class="fa plus-minus"></span></a>
                                            <ul>
                                                <li><a href="#">item 1.1</a></li>
                                                <li><a href="#">item 1.2</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Menu 2 <span class="glyphicon arrow"></span></a>
                                    <ul>
                                        <li><a href="#">item 2.1</a></li>
                                        <li><a href="#">item 2.2</a></li>
                                        <li><a href="#">item 2.3</a></li>
                                        <li><a href="#">item 2.4</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="BoxPrimary">
                    <div class="title">Lien utiles</div>
                    <div class="content"></div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <?php echo $breadcrumbs; ?>
                    </ol>
                    <?php echo $content_for_layout; ?>
                </div>
                <div class="col-xs-2">
                    <div id="BoxPrimary">
                        <div class="title">Compte</div>
                        <div class="content">
                            <?php if ($this->session->userdata('logged_in') == TRUE) { ?>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info"><a href="#">Information du compte</a></li>
                                <li class="list-group-item list-group-item-error"><span class="pointerLogout">Logout</span></li>
                            </ul>
                            <?php } else { ?>
                            <form id="LoginRight">
                                <div class="form-group">
                                    <label for="InputUsernameOrMail">Pseudo uu Email</label> 
                                    <input type="text" class="form-control" id="InputUsernameOrMail" placeholder="Email" />
                                </div>
                                <div class="form-group">
                                    <label for="InputPassword">Mot de passe</label> 
                                    <input type="password" class="form-control" id="InputPassword"  placeholder="Password" />
                                </div>
                                <div class="checkbox">
                                    <label> 
                                        <input type="checkbox" id="SaveMeLogin"> Se souvenir de moi
                                        <button type="submit" class="btn btn-default">Connexion</button>
                                    </label>
                                </div>
                            </form>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-warning"><a href="#">Mot de passe oublié ?</a></li>
                                <li class="list-group-item list-group-item-info"><a href="#">Inscription !</a></li>
                            </ul>
                            
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-xs-8 offset-xs-2">
                        <div class="footerContent">
                            <div class="pull-left">
                                &copy Deathart.fr - <?php echo date('Y'); ?>
                            </div>
                            <div class="pull-right">
                                Page rendered in <strong>{elapsed_time}</strong> seconds - <?php echo $version?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
        <?php
        if (isset ( $includes_for_layout ['js'] ) and count ( $includes_for_layout ['js'] ) > 0) {
            foreach ( $includes_for_layout ['js'] as $js ) {
                echo ('<script type="text/javascript" src="' . $js ['file'] . '"></script>' . "\r\n");
            }
        }
        ?>
    </body>
</html>