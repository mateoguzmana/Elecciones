<?php

// This is the database connection configuration.
return array(
	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	'connectionString' => 'mysql:host=localhost;dbname=rionegro_bd',
	'emulatePrepare' => true,
	'username' => 'eleccrionegro',
	'password' => 'eSzYou_TE2',
	'charset' => 'utf8',
);
