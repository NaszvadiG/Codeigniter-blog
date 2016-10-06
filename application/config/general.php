<?php
defined('BASEPATH') or exit('No direct script access allowed');

// GENERAL
$config['site']['name'] = "Blog";
$config['site']['description'] = "";

//DATABASE
$config['database']['news'] = "news";
$config['database']['categorie'] = "categorie";
$config['database']['comments'] = "comments";
$config['database']['chatbox'] = "chatbox";
$config['database']['banned_ip'] = "banned_ip";
$config['database']['users'] = "users";

// DO NOT TOUCH
$config['site']['version'] = "<a href=\"http://" . $_SERVER['HTTP_HOST'] . "/Home/Changelog\"><strong class=\"version_ajax\">Loading</strong></a> (CodeIgniter : <strong>" . CI_VERSION . "</strong>)";