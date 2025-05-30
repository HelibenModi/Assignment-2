<?php

require_once ('config.php');
function db_connect(){
  try{
    $dbh = new PDO('mysql:host='.DB_Host.';dbname='.DB_DATABASE.';port='.DB_Port, DB_User, DB_Pass);
    return $dbh;
  } catch (PDOException $e) {

  }
}