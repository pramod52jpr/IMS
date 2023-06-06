<?php
include "conn.php";
include_once('./dbbackup/Mysqldump/Mysqldump.php');
$dump = new Ifsnop\Mysqldump\Mysqldump("mysql:host=$hostname;dbname=$db_name", $username, $db_password);
$date=date("d-m-Y-i");
$dump->start('./dbbackup/database/'.$date.'.sql');

?>