<?php

include("data_class.php");

$userid=$_GET['userid'];
$bookname=$_GET['bookname'];





$obj=new data();
$obj->setconnection();
$obj->returnbook($userid,$bookname);

?>