<?php
ini_set('display_errors', 0);

// Enable error reporting for NOTICES
error_reporting(E_NOTICE);

require_once 'config.php';

$CONFIG['webdir'] = preg_replace('/\/[a-z\.]+$/', '', $_SERVER['SCRIPT_FILENAME']);
$CONFIG['weburl'] = preg_replace('/(?<=\/)[a-z\.]+$/', '', $_SERVER['SCRIPT_NAME']);

if (!ini_get('date.timezone')) {
	date_default_timezone_set($CONFIG['default_timezone']);
}
