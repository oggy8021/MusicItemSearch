<?php

/*
	Plugin Name: MusicItemSearch
	Plugin URI: http://oggy.no-ip.info/blog/
	Description: AmarokNowPlaying -> artist -> ItemSearch
	Version: 1.1
	Author: oggy
	Author URI: http://oggy.no-ip.info/blog/
 */

require_once('AWSSDKforPHP/sdk.class.php');

function MusicItemSearch($artist, $listed)
{
	$noimgUrl = 'http://oggy.no-ip.info/blog/wp-content/plugins/MusicItemSearch/noimg.png';
	const PAS_LOCAL_JAPAN = 'jp';

	$pas = new AmazonPAS();
	$pas->set_locale(PAS_LOCALE_JAPAN);
	$opt['ResponseGroup'] = 'Images,ItemAttributes';
	$opt['Sort'] = '-releasedate';
	$opt['SearchIndex'] = 'Music';
	$opt['Artist'] = (String)$artist;
	$res = $pas->item_search((String)$artist, $opt, PAS_LOCALE_JAPAN);

	$getItems =& $res->body->Items->Item;
	$getItemCnt = count($getItems);

	if (0 === $getItemCnt) {
		return '';

	} elseif ($listed >= $getItemCnt) {
		$lmax = $getItemCnt;

	} else {
		$lmax = $listed;

	}

	$MISresult = "";
	for ($cnt = 0; $cnt <= ($lmax - 1); $cnt++)
	{
		$MISresult .= '<p><a href="' . $getItems[$cnt]->DetailPageURL . '" target="_blank">';

		if ("" !=  $getItems[$cnt]->SmallImage->URL)
		{
			$MISresult .= '<img src="' . $getItems[$cnt]->SmallImage->URL . '" class="aligncenter" alt="' . $getItems[$cnt]->ItemAttributes->Title . '" title="' . $getItems[$cnt]->ItemAttributes->Title . '" /><br />';

		} else {
			$MISresult .= '<img src="' . $noimgUrl . '" class="aligncenter" width="75" height="75" /><br />';

		}

		$MISresult .= $getItems[$cnt]->ItemAttributes->Title . '</a></p>' . "\n";

	}
	return $MISresult;

}//MusicItemSearch

?>
