<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
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
        <div class="container">
            <nav class="navbar navbar-light bg-faded">
                <a class="navbar-brand" href="<?php echo base_url(); ?>Home"><?php echo $this->config->item('name', 'site'); ?></a>
                <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2" aria-controls="exCollapsingNavbar2" aria-expanded="false" aria-label="Toggle navigation">
                    &#9776;
                </button>
                <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
                    <ul class="nav navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url(); ?>Home">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>Home/Contact">Contact</a>
                        </li>
                    </ul>
                    <div class="pull-xs-right lang_select">
                        <img data-lang="fr" src="<?php echo base_url(); ?>assets/images/lang/fr.png" />
                        <img data-lang="en" src="<?php echo base_url(); ?>assets/images/lang/en.png" />
                    </div>
                </div>
            </nav>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="left_menu">
                    <div id="BoxPrimary">
                        <div class="header">Menu</div>
                        <div class="contentain">
                            <div id="menu">
                                <div class="menu" data-menu="sousmenu1">
                                    <a href="#">Menu 1</a>
                                </div>
                                <div id="sousmenu1" class="sousmenugeneral">
                                    <div class="sousmenu">
                                        <a href="#">Sous-Menu 1.1</a>
                                    </div>
                                    <div class="sousmenu">
                                        <a href="#">Sous-Menu 1.2</a>
                                    </div>
                                    <div class="sousmenu">
                                        <a href="#">Sous-Menu 1.3</a>
                                    </div>
                                    <div class="sousmenu">
                                        <a href="#">Sous-Menu 1.4</a>
                                    </div>
                                </div>
                                <div class="menu" data-menu="sousmenu2">
                                    <a href="#">Menu 1</a>
                                </div>
                                <div id="sousmenu2" class="sousmenugeneral active">
                                    <div class="sousmenu">
                                        <a href="#">Sous-Menu 1.1</a>
                                    </div>
                                    <div class="sousmenu">
                                        <a href="#">Sous-Menu 1.2</a>
                                    </div>
                                    <div class="sousmenu">
                                        <a href="#">Sous-Menu 1.3</a>
                                    </div>
                                    <div class="sousmenu">
                                        <a href="#">Sous-Menu 1.4</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="BoxPrimary">
                        <div class="header">Liens utiles</div>
                        <div class="contentain">bla-bla</div>
                    </div>
                </div>
                <div class="center_content">
                    <div class="flash_notif"></div>
                    <div id="Chatbox">
                        <div class="header">Chatbox</div>
                        <div class="content">
                            <div class="message">
                                <ul>
                                    <li class="ShoutboxLI" id="loading" data-chatboxid="0">Loading...</li>
                                </ul>
                            </div>
                            <?php if ($this->session->userdata('logged_in') == TRUE) { ?>
                            <form id="FormChatbox" class="form-inline">
                                <input class="form-control Chatbox_Message" placeholder="Message" type="text" />
                                <button type="submit" class="btn btn-primary Chatbox_Input">Envoyez</button>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                    <ol class="breadcrumb">
                        <?php echo $breadcrumbs; ?>
                    </ol>
                    <div class="row">
                        <?php echo $content_for_layout; ?>
                    </div>
                </div>
                <div class="right_menu">
                    <div id="BoxPrimary">
                        <div class="header">Mon compte</div>
                        <div class="contentain">
                        <?php if ($this->session->userdata('logged_in') == TRUE) { ?>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-info"><a href="#">Mon compte</a></li>
                                <li class="list-group-item list-group-item-warning"><a href="#">Ma messagerie</a></li>
                                <li class="list-group-item list-group-item-error"><span class="pointerLogout">Deconnexion</span></li>
                            </ul>
                        <?php } else { ?>
                            <form id="LoginRight">
                                <div class="form-group">
                                    <label for="InputUsernameOrMail">Pseudo ou Email</label> 
                                    <input class="form-control" id="InputUsernameOrMail" placeholder="Email" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="InputPassword">Mot de passe</label> 
                                    <input class="form-control" id="InputPassword" placeholder="Password" type="password">
                                </div>
                                <div class="checkbox">
                                    <label> 
                                        <input id="SaveMeLogin" type="checkbox"> Se souvenir de moi
                                        <button type="submit" class="btn btn-secondary">Connexion</button>
                                    </label>
                                </div>
                            </form>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-warning"><a href="<?php echo base_url(); ?>Auth/ResetPassword">Mot de passe oublié ?</a></li>
                                <li class="list-group-item list-group-item-info"><a href="<?php echo base_url(); ?>Auth/Register">Inscription !</a></li>
                            </ul>
                        <?php } ?>
                        </div>
                    </div>
                    <div id="BoxPrimary">
                        <div class="header">Membres en ligne</div>
                        <div class="contentain" id="MembersOnline">
                            <div id="MembersOnlineLoading">Loading...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-fixed-bottom navbar-light bg-faded footer">
            <a class="navbar-brand" href="https://deathart.fr/" target="_blank">© Deathart.fr - <?php echo date('Y'); ?></a>
            <div class="pull-right">
                Page rendered in <strong>{elapsed_time}</strong> seconds - <?php echo $this->config->item('version', 'site') ?>
            </div>
        </nav>
        <a href="#" id="back-to-top" title="Back to top">&uarr;</a>
        <?php
        if (isset ( $includes_for_layout ['js'] ) and count ( $includes_for_layout ['js'] ) > 0) {
            foreach ( $includes_for_layout ['js'] as $js ) {
                echo ('<script type="text/javascript" src="' . $js ['file'] . '"></script>' . "\r\n");
            }
        }
        ?>
        <div class="Token"  style="display: none;"><?php echo $this->security->get_csrf_hash(); ?></div>
    </body>
</html>