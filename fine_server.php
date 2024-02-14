<?php

include("data_class.php");


$username= $_POST['username'];
$remark= $_POST['remark'];
$fine=$_POST['fine'];

$obj=new data();
$obj->setconnection();
$obj->finecollect($username,$remark,$fine);
