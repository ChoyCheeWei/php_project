<?php
//initializing variables
$errors = array();
$databaseHost='localhost';
$databaseName='mydb';
$databaseUsername='root';
$databasePassword='';

//connect to database server
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

