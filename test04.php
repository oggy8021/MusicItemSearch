<?php
require_once('/usr/lib/php/modules/cloudfusion/cloudfusion.class.php');
include_once("dBug.php");

$pas = new AmazonPAS();
$pas->set_locale(PAS_LOCALE_JAPAN);
$opt['ResponseGroup'] = 'Images,ItemAttributes';
$res = $pas->item_search('JiLL-Decoy association', $opt, PAS_LOCALE_JAPAN);

debugCon((String) $res->body->Items->Request->ItemSearchRequest->Keywords);

foreach ($res->body->Items->Item as $value)
{
	debugCon((String) $value->ASIN);
}

new dBug($res);

sleep(2);

function debugHtml ($val)
{
	print "<BR><FONT COLOR=\"red\">[debug] :</FONT><strong>$val</strong><BR>\n";
}

function debugCon ($val)
{
	print "[debug] :$val.\n";
}

?>
