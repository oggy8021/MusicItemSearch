﻿<?php
// require_once('/usr/lib/php/modules/cloudfusion/cloudfusion.class.php');
require_once('/usr/lib/php/modules/cloudfusion/cloudfusion.class.php');
include_once("dBug.php");

$pas = new AmazonPAS();
$pas->set_locale(PAS_LOCALE_JAPAN);
//$res = $pas->item_search('福原美穂',array('Title' => 'Music is My Life'), PAS_LOCALE_JAPAN);
$res = $pas->item_search('福原美穂', null, PAS_LOCALE_JAPAN);
//$res = $pas->item_search('Music is My Life', null, PAS_LOCALE_JAPAN);

new dBug($res);

?>