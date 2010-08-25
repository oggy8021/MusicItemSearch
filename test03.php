<?php
require_once('/usr/lib/php/modules/cloudfusion/cloudfusion.class.php');

$pas = new AmazonPAS();
$pas->set_locale(PAS_LOCALE_JAPAN);
//$res = $pas->item_search('福原美穂',array('Title' => 'Music is My Life'), PAS_LOCALE_JAPAN);
$res = $pas->item_search('福原美穂', null, PAS_LOCALE_JAPAN);
//$res = $pas->item_search('Music is My Life', null, PAS_LOCALE_JAPAN);


//var_dump($res);

debugCon($res->header["date"]);

//配列の何番目にkeywordsが来るかは不定
debugCon($res->body->OperationRequest->Arguments->Argument[5]->attributes()->Name);

debugCon((String) $res->body->Items->Request->ItemSearchRequest->Keywords);

foreach ($res->body->Items->Item as $value)
{
	debugCon((String) $value->ASIN);
}

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
