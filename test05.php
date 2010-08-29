<?php
require_once('/usr/lib/php/modules/cloudfusion/cloudfusion.class.php');
include_once("dBug.php");

$pas = new AmazonPAS();
$pas->set_locale(PAS_LOCALE_JAPAN);
$opt['SearchIndex'] = 'Music';
$opt['Keywords'] = '福原美穂';
$opt['ResponseGroup'] = 'Images,ItemAttributes';
$opt['Sort'] = '-releasedate';
$res = $pas->item_search('Music', $opt, PAS_LOCALE_JAPAN);

//debugCon((String) $res->body->Items->Request->ItemSearchRequest->Keywords);

foreach ($res->body->Items->Item as $value)
{
	debugCon($value->ASIN . '-' . $value->ItemAttributes->ReleaseDate);
}

//new dBug($res);

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
