<?php
$entSearchTerms = array('gintama', 'one punch man', 'one-punch', 'ghibli', 'mob');

$entUrlArray = array('http://www.animenewsnetwork.com');
$entExtensionArray = array('');

retrieve_links($entUrlArray, $entExtensionArray, $entSearchTerms);

echo "<hr>";

?>