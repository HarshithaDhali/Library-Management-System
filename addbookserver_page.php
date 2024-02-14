<?php
include("data_class.php");

$bookname = $_POST['bookname'];
$bookdescription = $_POST['bookdescription'];
$bookauthor = $_POST['bookauthor'];
$bookpublication = $_POST['bookpublication'];
$bookprice = $_POST['bookprice'];
$bookquantity = $_POST['bookquantity'];

if (move_uploaded_file($_FILES["bookphoto"]["tmp_name"],"uploads/" . $_FILES["bookphoto"]["name"])){
    $bookpic = $_FILES["bookphoto"]["name"];

    $obj=new data();
    $obj->setconnection();
    $obj->addbook($bookpic,$bookname,$bookdescription,$bookauthor,$bookpublication,$bookprice,$bookquantity);
}
else{
    echo "upload failed";
}