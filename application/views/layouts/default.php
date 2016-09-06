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
                echo ('<link rel="stylesheet" type="text/css" href="' . $css ['file'] . '"' . ($css ['options'] === NULL ? '' : ' media="' . $css ['options'] . '"') . '>');
            }
        }
        ?>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-offset-3 col-xs-6">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#">Deathart.fr</a>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="#">Accueil <span class="sr-only">(current)</span></a></li>
                                    <li><a href="#">C.V</a></li>
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Article <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#">One more separated link</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="nav navbar-nav navbar-right">
                                    <form class="navbar-form navbar-left" role="search">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Recherche">
                                        </div>
                                        <button type="submit" class="btn btn-default">Rechercher</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-fluid" id="ContentJs">
            <div class="row">
                <div class="col-xs-offset-1 col-xs-2">
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
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label> 
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label> 
                                    <input type="password" class="form-control" id="exampleInputPassword1"  placeholder="Password" />
                                </div>
                                <div class="checkbox">
                                    <label> 
                                        <input type="checkbox"> Se souvenir de moi
                                        <button type="submit" class="btn btn-default">Connexion</button>
                                    </label>
                                </div>
                            </form>
                            <ul class="list-group">
                                <li class="list-group-item list-group-item-warning"><a href="#">Mot de passe oublié ?</a></li>
                                <li class="list-group-item list-group-item-info"><a href="#">Inscription !</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-offset-2 col-xs-8">
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
                echo ('<script type="text/javascript" src="' . $js ['file'] . '"></script>');
            }
        }
        ?>
    </body>
</html>