<?php
// require_once('/usr/lib/php/modules/cloudfusion/cloudfusion.class.php');
require_once('/usr/lib/php/modules/cloudfusion/cloudfusion.class.php');
header('Content-type: text/html; charset=utf-8');


$pas = new AmazonPAS();
$pas->set_locale(PAS_LOCALE_JAPAN);
//$res = $pas->item_search('•ŸŒ´”ü•ä',array('Title' => 'Music is My Life'), PAS_LOCALE_JAPAN);
$res = $pas->item_search('•ŸŒ´”ü•ä', null, PAS_LOCALE_JAPAN);
//$res = $pas->item_search('Music is My Life', null, PAS_LOCALE_JAPAN);

print "<pre>";
var_dump($res);
print "</pre>";


?>
