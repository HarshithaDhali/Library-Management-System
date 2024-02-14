<?php
include("data_class.php");

$name=$_GET['name'];
$fineid=$_GET['fineid'];


$obj=new data();
$obj->setconnection();
$obj->deletefine($name,$fineid);