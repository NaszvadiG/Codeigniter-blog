<?php

defined('BASEPATH') OR exit('No direct script access allowed'); 

/**
 * 
 * @param string $line
 * @param int $id
 * @return string
 */
function lang($line, $id = '') {
    
    $CI = & get_instance();
    $line = $CI->lang->line($line);

    $args = func_get_args();

    if(is_array($args)) {
        array_shift($args);
    }
    
    if (is_array($args) && count($args)) {
        foreach($args as $arg) {
            $line = str_replace_first('%s', $arg, $line);
        }
    }

    if ($id != '') {
        $line = '<label for="' . $id . '">' . $line . "</label>";
    }

    return $line;
    
}

/**
 * 
 * @param string $search_for
 * @param string $replace_with
 * @param string $in
 * @return string
 */
function str_replace_first($search_for, $replace_with, $in) {
    
    $pos = strpos($in, $search_for);

    if ($pos === false) {
        return $in;
    } else {
        return substr($in, 0, $pos) . $replace_with . substr($in, $pos + strlen($search_for), strlen($in));
    }
    
}