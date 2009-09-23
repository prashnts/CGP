<?php

# Collectd CPU plugin

require_once $CONFIG['webdir'].'/conf/config.php';
require_once $CONFIG['webdir'].'/type/GenericStacked.class.php';

## LAYOUT
# processes/
# processes/ps_state-paging.rrd
# processes/ps_state-blocked.rrd
# processes/ps_state-zombies.rrd
# processes/ps_state-stopped.rrd
# processes/ps_state-running.rrd
# processes/ps_state-sleeping.rrd

# grouped
require_once $CONFIG['webdir'].'/inc/collectd.inc.php';
$tinstance = collectd_plugindetail($host, $plugin, 'ti');

$obj = new Type_GenericStacked;
$obj->datadir = $CONFIG['datadir'];
$obj->path_format = '{host}/{plugin}/{type}-{tinstance}.rrd';
$obj->args = array(
	'host' => $host,
	'plugin' => $plugin,
	'pinstance' => $pinstance,
	'type' => $type,
	'tinstance' => $tinstance,
);
$obj->data_sources = array('value');
$obj->ds_names = array(
	'paging' => 'Paging  ',
	'blocked' => 'Blocked ',
	'zombies' => 'Zombies ',
	'stopped' => 'Stopped ',
	'running' => 'Running ',
	'sleeping' => 'Sleeping',
);
$obj->colors = array(
	'paging' => 'ffb000',
	'blocked' => 'ff00ff',
	'zombies' => 'ff0000',
	'stopped' => 'a000a0',
	'running' => '00e000',
	'sleeping' => '0000ff',
);
$obj->width = $width;
$obj->heigth = $heigth;
$obj->seconds = $seconds;

$obj->rrd_title = "Processes on $host";
$obj->rrd_vertical = 'Processes';
$obj->rrd_format = '%5.1lf%s';

$obj->rrd_graph();

?>