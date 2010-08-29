<?php

/*
	Plugin Name: MusicItemSearch
	Plugin URI: http://oggy.no-ip.info/blog/
	Description: AmarokNowPlaying -> artist -> ItemSearch
	Version: 1.0
	Author: oggy
	Author URI: http://oggy.no-ip.info/blog/
 */

require_once('/usr/lib/php/modules/cloudfusion/cloudfusion.class.php');

$pas = new AmazonPAS();
$pas->set_locale(PAS_LOCALE_JAPAN);
$opt['ResponseGroup'] = 'Images,ItemAttributes';
$opt['Sort'] = '-releasedate';
$opt['SearchIndex'] = 'Music';
$opt['Artist']='福原美穂';
$res = $pas->item_search('福原美穂', $opt, PAS_LOCALE_JAPAN);


$getItems =& $res->body->Items->Item;
$getItemCnt = count($getItems);

debugCon($getItemCnt);

if (5 >= $getItemCnt)
{
	$lmax = $getItemCnt;
} else {
	$lmax = 5;
}

for ($cnt = 1; $cnt <= $lmax; $cnt++)
{
	$MISresult = '<p><a href="' . $getItems[$cnt]->DetailPageURL . '" target="_blank">';
	$MISresult .= '<img src="' . $getItems[$cnt]->SmallImage->URL . '" class="aligncenter" alt="" title="" /><br />';
	$MISresult .= $getItems[$cnt]->ItemAttributes->Title . '</a></p>\n';

	print $MISresult;
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
