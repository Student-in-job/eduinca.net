<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=statistic',
        //'connectionString' => 'mysql:host=localhost;dbname=DB2039523',
	'emulatePrepare' => true,
	'username' => 'user',
	'password' => 'password',
	'charset' => 'utf8',
	
);