<?php
session_start();
print_r($_SESSION);
//creating new order

try{

    include_once('connection.php')
}