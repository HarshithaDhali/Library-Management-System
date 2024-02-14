<?php
include("data_class.php");
// session_start();
$userloginid = "";
$userloginid=$_SESSION['userid'];
if(empty($_SESSION["userid"])){
    header("location: index.php msg= login first");
}
// echo $userloginid;


?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Student-Dashboard</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <style>
        *{
            padding: 0px;
            margin: 0px;
        }
        .container{
            /* padding: 10px 20px; */
            margin: 10px 130px;
            height: auto;
            width: auto;
            background-color:RGB(227 227 227);
        }
        .leftcontainer{
            float: left;
            width: auto;
            margin-bottom: 300px;
        }
        .rightcontainer{
            float: left;
            width:1018px;
            background-color:RGB(227 227 227);
            align-content: center;
            height:auto;
            padding-bottom: 20px;
            position: absolute;
            margin-left: 230px;
            
        }
        .userbutton{
            background-color: rgb(29,28,42);
            color: white;
            /* padding: 20px 5px; */
            border: none;
            /* float: none; */
            width: 1260px;
            height: auto;
            text-align: center;
            
        }
        .usertext{
            background-color: rgb(29,28,42);
            color: white;
            padding: 20px 5px;
            border: none;
            float: none;
            font-size: 20px;
            
        }
        .sideextrabutton{
            background-color: rgb(29,28,42);
            color: white;
            padding:15px 5px;
            border: none;
            float: none;
            width: 220px;
            text-align: left;
            cursor: pointer;
            font-size: 15PX;
        }
        .sidebutton{
            background-color: rgb(29,28,42);
            color: white;
            padding:15px 5px;
            border: none;
            float: none;
            width: 220px;
            text-align: left;
            cursor: pointer;
            font-size: 15PX;
        }
        .sidebutton span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.3s;
        }

        .sidebutton span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 8px;
            right: -17px;
            transition: 0.5s;
        }

        .sidebutton:hover span {
            padding-right: 15px;
            padding:10px 15px 10px 10px;
            background-color: rgb(52,52,64);
            font-size:16px ;
        }

        .sidebutton:hover span:after {
            opacity: 1;
            right: 0;
        }
        .logoutbuttonimg{
            float: right;
            cursor: pointer;
            padding-top:10px ;
            padding-right: 3px;

        }
        .innerheading{
            background-color: rgb(29,28,42);
            color: white;
            padding:15px 5px;
            border: none;
            float: none;
            width: 945px;
            text-align: center;
            font-size: 15PX;
        }
        
        .innerportion{
            /* position: absolute; */
            margin-top:11px;
            margin-left: 15px;
            padding:20px;
            background-color:white;
            width: 950px;
            box-shadow:-8px -8px 5px RGB(199 199 199);
            /* z-index: -1; */
        }
        a{
            text-decoration: none;
            color: white;
        }
        .delete{
            background-color:rgb(29,28,42) ;
            color:white;
            padding:3px;
            border: none;
            height:auto;
            border-radius: 10px;
            cursor: pointer;
            width:auto;
            font-size: 11px;
            
        }
        .finetablealign{
            margin-left: 300px;
            margin-right: 300px;
        }
        footer {
            background-image: url('pictures/footer background.jpg');
            background-repeat: no-repeat;
            /* background-attachment: fixed; */
            background-size: cover;
            width:1260px ;
            height: 40px;
            color: white;
            margin-top: 630px;

        }
        #footertext{
            padding-left: 500px;
            padding-top: 10px;
        }
    </style>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="container">
            <img src="pictures/logo.jpg" id="logo" height="auto" width="1260px">
            <div class="userbutton"><div class="usertext"><b><u>USER DASHBOARD</u></b></div></div>
            <div class="leftcontainer">

                <button class="sidebutton" onclick="openpart('myaccount')"><span>My Account</span></button><br>
                <button class="sidebutton" onclick="openpart('requestbook')"><span>Request Book</span></button><br>
                <button class="sidebutton" onclick="openpart('userbookreport')"><span>Book Report</span></button><br>
                <button class="sidebutton" onclick="openpart('rentedreport')"><span>Rented Book Report</span></button><br>
                <button class="sidebutton" onclick="openpart('finereport')"><span>Fine Report</span></button><br>
                <button class="sideextrabutton"><span></span></button><br>
                <button class="sideextrabutton"><span></span></button><br>
                <button class="sideextrabutton"><span></span></button><br>
                <button class="sideextrabutton"><span></span></button><br>
                <button class="sideextrabutton"><span></span></button><br>
                <button class="sideextrabutton"><span></span></button><br>
                <button class="sideextrabutton"><span></span></button><br>
                <button class="sideextrabutton"><span></span></button><br>
                <button class="sideextrabutton"><span></span></button><br>
                <button class="sideextrabutton"><span></span></button><br>
                <button class="sideextrabutton"><span></span></button><br>
                <button class="sidebutton"><span><a href="index.php"><img src="pictures/logout3.png" class="logoutbuttonimg" width="110px" height="20px"></a></span></button><br>
            </div>
            <div class="rightcontainer">
                <div id="myaccount" class="innerright portion" style="<?php  if(!empty($_REQUEST['returnid'])){ echo "display:none";} else {echo ""; }?>"></br>
                    <div class="innerportion">
                        <button class="innerheading">My Account</button>
                        </br></br>
                        <?php

                        $u=new data;
                        $u->setconnection();
                        $u->userdetail($userloginid);
                        $recordset=$u->userdetail($userloginid);
                        foreach($recordset as $row){
                        
                        $id= $row[0];
                        $name= $row[1];
                        $email= $row[2];
                        $pass= $row[3];
                        $type= $row[4];
                        }               
                        ?>

                        <p style="color:black"><u>User ID:</u> &nbsp&nbsp<?php echo $id ?></p><br>
                        <p style="color:black"><u>Person Name:</u> &nbsp&nbsp<?php echo $name ?></p><br>
                        <p style="color:black"><u>Person Email:</u> &nbsp&nbsp<?php echo $email ?></p><br>
                        <p style="color:black"><u>Account Type:</u> &nbsp&nbsp<?php echo $type ?></p><br>
                    </div>
                </div>
            </div>
            <div class="rightcontainer">
                <div id="requestbook" class="innerright portion" style="display:none"></br>
                    <div class="innerportion">
                        <button class="innerheading">Request Book</button>
                        </br></br>
                        <?php
            $u=new data;
            $u->setconnection();
            $u->getbookissue();
            $recordset=$u->getbookissue();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr>
            <th>Book Image</th><th>Book Name</th><th>Book Authour</th><th>price(INR)</th><th>book available</th></th><th>Request Book</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
               $table.="<td><img src='uploads/$row[1]' width='100px' height='100px' style='border:1px solid #333333;'></td>";
               $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[8]</td>";
                // $table.="<td>><button class='delete'><a href='requestbook.php?bookid=$row[0]&userid=$userloginid'> Request Book</a></button></td>";
                $table.="<td><button class='delete'> <a href='requestbook.php?bookid=$row[0]&userid=$userloginid'> Request Book </a></button></td>";
           
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;


                ?>
                    </div>
                </div>
            </div>
            <div class="rightcontainer">
                <div id="userbookreport" class="innerright portion" style="display:none"></br>
                    <div class="innerportion">
                        <button class="innerheading">Book Report</button><br><br>
                        </br></br>
                        <?php
            $u=new data;
            $u->setconnection();
            $u->issuebookreport($userloginid);
            $recordset=$u->issuebookreport($userloginid);

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr>
            <th>Book Name</th><th>Issue Days</th><th>Issue Date</th><th>Return Date</th></th><th>Fine</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
               $table.="<td>$row[3]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                // $table.="<td>><button class='delete'><a href='requestbook.php?bookid=$row[0]&userid=$userloginid'> Request Book</a></button></td>";
                // $table.="<td><button class='delete'> <a href='returnbook.php?bookname=$row[3]&userid=$userloginid'> Return Book </a></button></td>";
           
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;


                ?>
                    </div>
                </div>
            </div>
            <div class="rightcontainer">
                <div id="finereport" class="innerright portion" style="display:none"></br>
                    <div class="innerportion">
                        <button class="innerheading">Fine Report</button><br><br>
                        </br></br>
                        <div class="finetablealign">
                        <?php
            $u=new data;
            $u->setconnection();
            $u->issuereport();
            $recordset=$u->userfinecollectreport($userloginid);

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  
            padding: 8px;'>name</th><th>Remark</th><th>amount</th><th>Status</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>
                    </div>
                </div>
            </div>
            </div>
            <div class="rightcontainer">
                <div id="rentedreport" class="innerright portion" style="display:none"></br>
                    <div class="innerportion">
                        <button class="innerheading">Rented Book Report</button><br><br>
                        </br></br>
                        <?php
            $u=new data;
            $u->setconnection();
            $u->rentedbookreport($userloginid);
            $recordset=$u->rentedbookreport($userloginid);

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr>
            <th>Book Name</th><th>Issue Days</th><th>Issue Date</th><th>Return Date</th></th><th>Fine</th><th>Return</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
               $table.="<td>$row[3]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                // $table.="<td>><button class='delete'><a href='requestbook.php?bookid=$row[0]&userid=$userloginid'> Request Book</a></button></td>";
                $table.="<td><button class='delete'> <a href='returnbookrequest.php?bookname=$row[3]&userid=$userloginid'> Return</a></button></td>";
           
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;


                ?>
                    </div>
                </div>
            </div>   
            
            <footer id="footerimg">
                <!-- <img src="pictures/footer background.jpg" height="auto" width="1178px"> -->
                <p id="footertext">whiteoak Library &copy; 2022-present</p>
            </footer>
        </div>
        
        <script>
        function openpart(portion) {
        var i;
        var x = document.getElementsByClassName("portion");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        document.getElementById(portion).style.display = "block";  
        }

   
 
        
        </script>
    </body>
</html>