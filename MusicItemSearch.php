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

function MusicItemSearch($artist)
{
	$noimgUrl = "http://g-ec2.images-amazon.com/images/G/09/nav2/dp/no-image-no-ciu._V192259616_AA300_.gif";

//	$MISresult = "[$artist]=>";
//	$ERRresult = "[$artist]=>";

	$pas = new AmazonPAS();
	$pas->set_locale(PAS_LOCALE_JAPAN);
	$opt['ResponseGroup'] = 'Images,ItemAttributes';
	$opt['Sort'] = '-releasedate';
	$opt['SearchIndex'] = 'Music';
	$opt['Artist'] = (String)$artist;
	$res = $pas->item_search("(String)$artist", $opt, PAS_LOCALE_JAPAN);

	$getItems =& $res->body->Items->Item;
	$getItemCnt = count($getItems);

	if (0 === $getItemCnt) {
//		$ERRreult .= ' 0' . $opt['Artist'];
		return '';

	} elseif (5 >= $getItemCnt) {
		$lmax = $getItemCnt;

	} else {
		$lmax = 5;

	}

	$MISresult = "";
	for ($cnt = 1; $cnt <= $lmax; $cnt++)
	{
		$MISresult .= '<p><a href="' . $getItems[$cnt]->DetailPageURL . '" target="_blank">';
		if ("" !==  $getItems[$cnt]->SmallImage->URL)
		{
			$MISresult .= '<img src="' . $getItems[$cnt]->SmallImage->URL . '" class="aligncenter" alt="$getItems[$cnt]->ItemAttributes->Title" title="$getItems[$cnt]->ItemAttributes->Title" /><br />';

		} else {
			$MISresult .= '<img src="' . $noimgUrl . '" class="aligncenter" /><br />';

		}

		$MISresult .= $getItems[$cnt]->ItemAttributes->Title . '</a></p>' . "\n";

	}
	return $MISresult;

}//MusicItemSearch

?>
