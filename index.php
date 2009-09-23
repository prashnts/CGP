<?php

include_once 'conf/common.inc.php';
include_once 'inc/collectd.inc.php';
require_once 'inc/html.inc.php';

html_start();

$h = array();

# show all categorized hosts
foreach($CONFIG['cat'] as $cat => $hosts) {
	printf("<h1>%s</h1>\n", $cat);
	host_summary($hosts);
	$h = array_merge($h, $hosts);
}

# search for uncategorized hosts
$chosts = collectd_hosts();
$uhosts = array_diff($chosts, $h);

# show all uncategorized hosts
if ($uhosts) {
	echo "<h1>uncategorized</h1>\n";
	host_summary($uhosts);
}

html_end();

?>