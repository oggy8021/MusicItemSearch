﻿<?php
// require_once('/usr/lib/php/modules/cloudfusion/cloudfusion.class.php');
require_once('/usr/lib/php/modules/cloudfusion/cloudfusion.class.php');


$pas = new AmazonPAS();
$pas->set_locale(PAS_LOCALE_JAPAN);
$res = $pas->item_lookup('B003G2KLXA');

print "<pre>";
var_dump($res);
print "</pre>";


?>
