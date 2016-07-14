<?php
require 'retrieveLinksExecution.php';
$newsSearchTerms = array('marks & spencer', 'M&S', 'marks&spencer', 'brexit', 'BoE');
$newsUrlArray = array('http://uk.reuters.com');
$newsUrlExtensionArray = array('/business');
retrieve_links($newsUrlArray, $newsUrlExtensionArray, $newsSearchTerms, 'business');

$gameSearchTerms = array('Legend of Heroes: Trails in the Sky', 'Trails in the sky', 'legend of heroes', 'Monster Hunter', 'Monster Hunter Generations', 'MH4U', 'Stardew Valley', 'stardew', 'Overwatch');
$gameUrlArray = array('http://www.pcgamer.com', 'http://gematsu.com', 'http://mmoculture.com' );
$gameExtensionArray = array('/news/', '/c/pc', '');
retrieve_links($gameUrlArray, $gameExtensionArray, $gameSearchTerms, 'games');

$entSearchTerms = array('gintama', 'one punch man', 'one-punch', 'ghibli', 'mob', 'one piece');
$entUrlArray = array('http://www.animenewsnetwork.com');
$entExtensionArray = array('');
retrieve_links($entUrlArray, $entExtensionArray, $entSearchTerms, 'entertainment');

$musicSearchTerms = array('Kendrick Lamar', 'jay electronica');
$musicUrlArray = array('http://hiphopdx.com');
$musicExtensionArray = array('/news');
retrieve_links($musicUrlArray, $musicExtensionArray, $musicSearchTerms, 'music');


