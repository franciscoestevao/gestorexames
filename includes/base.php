<?php

set_include_path("../lib");

require_once('smarty.php');
require_once('session.php');
require_once('database.php');


/**
 *
 * Smarty plugin "br2nl"
 * -------------------------------------------------------------
 * File:    modifier.br2nl.php
 * Type:    modifier
 * Name:    br2nl
 * Version: 1.0
 * Author:  Simon Tuck <stu@rtpartner.ch>, Rueegg Tuck Partner GmbH
 * Purpose: Replaces html br tags in a string with newlines
 * Example: {$someVar|br2nl}
 * -------------------------------------------------------------
 *
 **/


	function br2nl($str) {
        return preg_replace('/<br[^>]*>/i', "", $str);
	}
?>
