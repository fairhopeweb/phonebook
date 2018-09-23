<?php 
//September 2018 / Dylan Bickerstaff
set_time_limit(300);
$singlePointEntry = true;
header('phonebook-api-created-by: Dylan Bickerstaff');
header('phonebook-api-version: 2.0');
ob_start();
define('SCHEMA', json_decode(file_get_contents(__DIR__.'/schema.config.json'), true));
if(isset($_POST['api']) && !empty($_POST['api'])) {
	require('./reqs/database.api.php');
	if($_POST['api'] == 'import') {
		require('./reqs/import.api.php');
	}
} else {
	echo file_get_contents('api.documentation.htm');
}
header('phonebook-api-response-time: '.(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']));
ob_end_flush();
?>