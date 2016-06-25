<?php 
// GAME Websites
$gameSearchTerms = array('Legend of Heroes: Trails in the Sky', 'Trails in the sky', 'legend of heroes', 'Monster Hunter', 'MH4G', 'MH4U', 'Stardew Valley', 'stardew', 'Overwatch');

$gameUrlArray = array('http://www.pcgamer.com', 'http://gematsu.com', 'http://mmoculture.com' );
$gameExtensionArray = array('/news/', '/c/pc', '');

retrieve_links($gameUrlArray, $gameExtensionArray, $gameSearchTerms);

echo "<hr>";

?>