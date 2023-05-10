<?php
include_once('./dbbackup/Mysqldump/Mysqldump.php');
$dump = new Ifsnop\Mysqldump\Mysqldump('mysql:host=localhost;dbname=biocomplaint', 'root', '');
$date=date("d-m-Y");
$dump->start('./dbbackup/database/'.$date.'.sql');

?>