<?php
include("data_class.php");
$msg="";
if(!empty($_REQUEST['msg'])){
    $msg = $_REQUEST['msg'];
}
// session_start();
$adminid = $_SESSION["adminid"];
if(empty($_SESSION["adminid"])){
    header("location: index.php msg= login first");
}
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
        <title>Admin-Dashboard</title>
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
            margin-bottom: 10px;
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
        .adminbutton{
            background-color: rgb(29,28,42);
            color: white;
            /* padding: 20px 5px; */
            border: none;
            /* float: none; */
            width: 1260px;
            height: auto;
            text-align: center;
            
        }
        .admintext{
            background-color: rgb(29,28,42);
            color: white;
            padding: 20px 5px;
            border: none;
            float: none;
            font-size: 20px;
            
        }
        .logoutbuttonimg{
            float: right;
            cursor: pointer;
            padding-top:10px ;
            padding-right: 3px;

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
            font-size:15px ;
        }

        .sidebutton:hover span:after {
            opacity: 1;
            right: 0;
        }
        
        input{
            border: 0.5px solid black;
            border-radius: 3px;
            background-color: RGB(230 230 230);
            height: 20px;
            width: 190px;
        }
        .addusersubmit{
            background-color:rgb(29,28,42) ;
            color:white;
            padding:5px;
            border: none;
            height:auto;
            border-radius: 10px;
            cursor: pointer;
            width:auto;
            
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
        select,option{
            background-color:RGB(230 230 230) ;
            cursor: pointer;
        }
        a{
            text-decoration: none;
            color: white;
        }
        .message{
            color:red;
        }
        .usertablealign{
            margin-left: 140px;
            margin-right: 150px;
        }
        .finetablealign{
            margin-left: 200px;
            margin-right: 200px;
        }
        footer {
            background-image: url('pictures/footer background.jpg');
            background-repeat: no-repeat;
            /* background-attachment: fixed; */
            background-size: cover;
            width:1260px ;
            height: 40px;
            color: white;
            margin-top: 680px;

        }
        #footertext{
            padding-left: 500px;
            padding-top: 10px;
        }
        .bookdetailimage{
            margin-bottom:200px;
        }
        .numofbooks{
            border: 2px solid rgb(0,116,255);
            float: left;
            width: 250px;
            height: 110px;
            margin-left: 160px;
            margin-top: 50px;
            background-color: rgb(0,192,239);
            color: white;
        }
        .numofstudents{
            border: 2px solid rgb(0,141,77);
            float: left;
            width: 250px;
            height: 110px;
            margin-left: 160px;
            margin-top: 50px;
            background-color: rgb(0,166,90);
            color: white;
        }
        .numbooksissued{
            border: 2px solid rgb(207,133,15);
            float: left;
            width: 250px;
            height: 110px;
            margin-left: 160px;
            margin-top: 50px;
            background-color: rgb(243,156,18);
            color: white;
        }
        .numbooksrented{
            border: 2px solid rgb(188,64,49);
            float: left;
            width: 250px;
            height: 110px;
            margin-left: 160px;
            margin-top: 50px;
            background-color: rgb(221,75,57);
            color: white;
        }
        .dashboardcontent{
            height: 450px;
        }
        .imglogo{
            float: right;
            margin-top: 15px;
            margin-right: 5px;
        }
        .bookcount{
            margin-left: 10px;
            margin-top: 5px;
            font-size: 50px;
            font-weight: 900;
        }
    </style>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="container">
        <img src="pictures/logo.jpg" id="logo" height="auto" width="1260px">
        <div class="adminbutton"><div class="admintext"><b><u>ADMIN DASHBOARD</u></b></div></div>
        <div class="leftcontainer">
            
            <button class="sidebutton" onclick="openpart('dashboard')"><span>My Dashboard</span></button><br>
            <button class="sidebutton" onclick="openpart('addbook')"><span>Add Book</span></button><br>
            <button class="sidebutton" onclick="openpart('bookreport')"><span>Book Report</span></button><br>
            <button class="sidebutton" onclick="openpart('bookrequestapproval')"><span>Book Request</span></button><br>
            <button class="sidebutton" onclick="openpart('addperson')"><span>Add User</span></button><br>
            <button class="sidebutton" onclick="openpart('studentreport')"><span>User Report</span></button><br>
            <button class="sidebutton" onclick="openpart('issuebook')"><span>Issue Book</span></button><br>
            <button class="sidebutton" onclick="openpart('rentedbook')"><span>Rented Book Report</span></button><br>
            <button class="sidebutton" onclick="openpart('returnrequestbook')"><span>Return Request Approval</span></button><br>
            <button class="sidebutton" onclick="openpart('issuebookreport')"><span>Book Issued Report</span></button><br>
            <button class="sidebutton" onclick="openpart('collectfine')"><span>Impose Fine</span></button><br>
            <button class="sidebutton" onclick="openpart('finepay')"><span>Fine Payment</span></button><br>
            <button class="sidebutton" onclick="openpart('finereport')"><span>Fine Report</span></button><br>
            <!-- <button class="sidebutton" onclick="openpart('')"><span></span></button><br> -->
            <button class="sidebutton"><span><a href="index.php"><img src="pictures/logout3.png" class="logoutbuttonimg" width="110px" height="20px"></a></span></button><br>
        </div>
        <div class="rightcontainer">
            <div id="dashboard" class="innerright portion" style="<?php if(!empty($_REQUEST['viewid'])){echo "display:none";} else{echo "";}?>"></br>
                <div class="innerportion">
                    <button class="innerheading">DASHBOARD</button>
                    </br></br>
                    <div class="dashboardcontent">
                    <h2 class="welcometext"><u>Welcome Admin,</u></h2>
                    <div class="numofbooks">
            <?php
            $u=new data;
            $u->setconnection();
            $u->numbook();
            $results = $u->numbook();
            
            ?>
            <img src="pictures/numbooklogo1.png" width="90px" height="75px" class="imglogo" /><h1 class="bookcount"><?php echo $results?></h1><h3 style="margin-left: 10px;"> Books Listed</h3>
        </div>
                    <div class="numofstudents">
                    <?php
            $u=new data;
            $u->setconnection();
            $u->numuser();
            $results = $u->numuser();
            
            ?>
            <img src="pictures/numuserlogo.png" width="90px" height="75px" class="imglogo" /><h1 class="bookcount"><?php echo $results?></h1><h3  style="margin-left: 10px;">Users Registered</h3>
            </div>
                    <div class="numbooksissued">
                    <?php
            $u=new data;
            $u->setconnection();
            $u->numbookissue();
            $results = $u->numbookissue();
            
            ?>
            <img src="pictures/numbookissue.png" width="70px" height="75px" class="imglogo" /><h1 class="bookcount"><?php echo $results?></h1><h3  style="margin-left: 10px;">Books Issued Count</h3>
                    </div>
                    <div class="numbooksrented">
                    <?php
            $u=new data;
            $u->setconnection();
            $u->numbookreturn();
            $results = $u->numbookreturn();
            
            ?>
            <img src="pictures/numbookreturn.png" width="70px" height="75px" class="imglogo" /><h1 class="bookcount"><?php echo $results?></h1><h3  style="margin-left: 10px;">Books Returned</h3>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rightcontainer">
            <div id="addperson" class="innerright portion" style="display:none"></br>
                <div class="innerportion">
                    <button class="innerheading">ADD USER</button>
                    </br></br>
                    <form action="addpersonserver_page.php"method="post" enctype="multipart/form-data">
                        <!-- <div><p class="message"></p></div> -->
                        <label><b>Name:</b></label></br><input type="text" name="addname"/>
                        </br>
                        </br>
                        <label><b>Email:</b></label></br><input type="text" name="addemail"/></br>
                        </br>
                        <label><b>Password:</b></label></br><input type="password" name="addpass"/></br>
                        </br>
                        <label for="type"><b>Choose type:</b></label>
                        <select name="type">
                            <option value="student">Student</option>
                            <option value="teacher">Teacher</option>
                        </select>
                        </br></br>
                        <input type="submit"class="addusersubmit" value="SUBMIT"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="rightcontainer">
        
            <div id="addbook" class="innerright portion" style="display:none" ></br>
                <div class="innerportion">
                    <button class="innerheading">ADD NEW BOOK</button>
                    </br></br>
                    <form action="addbookserver_page.php"method="post" enctype="multipart/form-data">
                        <!-- <div><p class="message"></p></div> -->
                        <label><b>Book Name:</b></label></br><input type="text" name="bookname"/>
                        </br>
                        </br>
                        <label><b>Book Description:</b></label></br><input type="text" name="bookdescription"/></br>
                        </br>
                        <label><b>Book Author:</b></label></br><input type="text" name="bookauthor"/></br>
                        </br>
                        <label><b>Book Publication:</b></label></br><input type="text" name="bookpublication"/></br>
                        </br>
                        <label><b>Book Price(INR):</b></label></br><input type="number" name="bookprice"/></br>
                        </br>
                        <label><b>Book Quantity:</b></label></br><input type="number" name="bookquantity"/></br>
                        </br>
                        <label><b>Book Picture:</b></label></br><input type="file" name="bookphoto"/></br>
                        </br></br>
                        <input type="submit" class="addusersubmit" value="SUBMIT"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="rightcontainer">
            <div id="studentreport" class="innerright portion" style="display:none"></br>
                <div class="innerportion">
                    <button class="innerheading">USER REPORT</button>
                    </br></br>
                    <!-- <div><p class="message"></p></div> -->
                    <div class="usertablealign">
                    <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'> Name</th><th>Email</th><th>Type</th><th>Delete</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td><button class='delete'> <a href='deleteuser.php?useriddelete=$row[0]'>Delete</a></button></td>";
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
            <div id="bookreport" class="innerright portion" style="display:none"></br>
                <div class="innerportion">
                    <button class="innerheading">BOOK REPORT</button>
                    </br></br>
                    <!-- <div><p class="message"></p></div> -->
                    <div class="usertablealign">
                    <?php
            $u=new data;
            $u->setconnection();
            $u->getbook();
            $recordset=$u->getbook();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'>Book Name</th><th>Price(INR)</th><th>Qnt</th><th>Available</th><th>Rent</th></th><th>View</th><th>Delete</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[9]</td>";
                $table.="<td><button class='delete'><a href='admin_service_dashboard.php?viewid=$row[0]'>View</a></button></td>";
                $table.="<td><button class='delete'><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></button></td>";
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
            <div id="bookdetail" class="innerright portion" style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>"></br>
                <div class="innerportion">
                    <button class="innerheading">BOOK DETAILS</button>
                    </br></br>
                    <!-- <div><p class="message"></p></div> -->
                    <?php
            $u=new data;
            $u->setconnection();
            $u->getbookdetail($viewid);
            $recordset=$u->getbookdetail($viewid);
            foreach($recordset as $row){

                $bookid= $row[0];
                $bookimg= $row[1];
                $bookname= $row[2];
                $bookdescription= $row[3];
                $bookauthor= $row[4];
                $bookpublisher= $row[5];
                $bookprice= $row[6];
                $bookquantity= $row[7];
                $bookavailable= $row[8];
                $bookrent= $row[9];

            }
            ?>
            <!-- <img src="uploads/" width='150px' height='150px'style='float:left; margin-left:20px;'> -->
            <img src="uploads/<?php echo $bookimg?>" width='150px' height='150px' margin-right='20px' class="bookdetailimage" style='border:1px solid #333333; float:left;margin-left:20px;margin-right:20px;'>
            </br>
            <p style="color:black"><u>Book Name:</u> &nbsp&nbsp<?php echo $bookname ?></p><br>
            <p style="color:black"><u>Book Description:</u> &nbsp&nbsp<?php echo $bookdescription ?></p><br>
            <p style="color:black"><u>Book Author:</u> &nbsp&nbsp<?php echo $bookauthor ?></p><br>
            <p style="color:black"><u>Book Publisher:</u> &nbsp&nbsp<?php echo $bookpublisher ?></p><br>
            <p style="color:black"><u>Book Price(INR):</u> &nbsp&nbsp &#8377;<?php echo $bookprice ?></p><br>
            <p style="color:black"><u>Books Available:</u> &nbsp&nbsp<?php echo $bookavailable ?></p><br>
            <p style="color:black"><u>Books Rented:</u> &nbsp&nbsp<?php echo $bookrent ?></p><br>
            
                </div>
            </div>
        </div>
        <div class="rightcontainer">
            <div id="issuebook" class="innerright portion" style="display:none"></br>
                <div class="innerportion">
                    <button class="innerheading">ISSUE BOOK</button>
                    </br></br>
                    <form action="issuebook_server.php" method="post" enctype="multipart/form-data">
            <label for="book"><b>Choose Book:</b></label>
           
            <select name="book" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->getbookissue();
            $recordset=$u->getbookissue();
            foreach($recordset as $row){

                echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";
        
            }            
            ?>
            </select><br>
<br>
            <label for="Select Student"><b>Select User:</b></label>
            <select name="userselect" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();
            foreach($recordset as $row){
               $id= $row[0];
                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
            }            
            ?>
            </select><br>
<br>
           <label><b>Days</b></label> <input type="number" name="days" style="width: 150px;"/>
            <br><br>
            <input type="submit" class="addusersubmit" value="SUBMIT"/>
            </form>
                </div>
            </div>
        </div>
        <div class="rightcontainer">
            <div id="issuebookreport" class="innerright portion" style="display:none"></br>
                <div class="innerportion">
                    <button class="innerheading">ISSUE BOOK REPORT</button>
                    </br></br> 
                    <div class="usertablealign">
                    <?php
            $u=new data;
            $u->setconnection();
            $u->issuereport();
            $recordset=$u->issuereport();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  
            padding: 8px;'>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Issue Type</th><th>Status</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[9]</td>";
                // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
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
            <div id="collectfine" class="innerright portion" style="display:none"></br>
                <div class="innerportion">
                    <button class="innerheading">IMPOSE FINE</button>
                    </br></br>
                    <form action="fine_server.php" method="post" enctype="multipart/form-data">
            <label for="Select Student"><b>Select User:</b></label>
            <select name="username" >
            <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();
            foreach($recordset as $row){
               $id= $row[0];
                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
            }            
            ?>
            </select><br>
<br>
<label><b>Remarks:</b></label><br><textarea rows="4" cols="50" name="remark" placeholder="Enter the Remarks here..." ></textarea><br><br>
           <label><b>Fine Imposed(INR):</b></label> <input type="number" name="fine" style="width: 150px;"/>
            <br><br>
            <input type="submit" class="addusersubmit" value="SUBMIT"/>
            </form>
                </div>
            </div>
        </div>
        <div class="rightcontainer">
            <div id="finereport" class="innerright portion" style="display:none"></br>
                <div class="innerportion">
                    <button class="innerheading">FINE REPORT</button>
                    </br></br> 
                    <div class="finetablealign">
                    <?php
            $u=new data;
            $u->setconnection();
            $u->finecollectreport();
            $recordset=$u->finecollectreport();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  
            padding: 8px;'>name</th><th>Remark</th><th>Amount</th><th>Status</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                // $table.="<td><button class='delete'> <a href='finedelete.php?name=$row[1]&fineid=$row[0]'> Delete </a></button></td>";
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
            <div id="finepay" class="innerright portion" style="display:none"></br>
                <div class="innerportion">
                    <button class="innerheading">FINE PAYMENT</button>
                    </br></br> 
                    <div class="finetablealign">
                    <?php
            $u=new data;
            $u->setconnection();
            $u->finepaymentreport();
            $recordset=$u->finepaymentreport();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  
            padding: 8px;'>name</th><th>Remark</th><th>Amount</th><th>Payment</th><th>Delete</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                // $table.="<td>$row[4]</td>";
                $table.="<td><button class='delete'> <a href='finepaid.php?name=$row[1]&fineid=$row[0]'> Pay </a></button></td>";
                $table.="<td><button class='delete'> <a href='finedelete.php?name=$row[1]&fineid=$row[0]'> Delete </a></button></td>";
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
            <div id="bookrequestapproval" class="innerright portion" style="display:none"></br>
                <div class="innerportion">
                    <button class="innerheading">BOOK REQUESTS</button>
                    </br></br>
                    <?php
            $u=new data;
            $u->setconnection();
            $u->requestbookdata();
            $recordset=$u->requestbookdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='
            padding: 8px;'>Person Name</th><th>person type</th><th>Book name</th><th>Days </th><th>Approve</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
              "<td>$row[1]</td>";
              "<td>$row[2]</td>";

                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
               // $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved BOOK</button></a></td>";
                 $table.="<td><button class='delete'><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'>Approve Book</a></button></td>";
                // $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'>Delete</a></td>";
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
            <div id="rentedbook" class="innerright portion" style="display:none"></br>
                <div class="innerportion">
                    <button class="innerheading">RENTED BOOK REPORT</button>
                    </br></br> 
                    <div class="usertablealign">
                    <?php
            $u=new data;
            $u->setconnection();
            $u->adminrentedbookreport();
            $recordset=$u->adminrentedbookreport();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  
            padding: 8px;'>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Type</th><th>return</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[4]</td>";
                
                $table.="<td><button class='delete'> <a href='adminreturnbook.php?bookname=$row[3]&userid=$row[1]'> Return  </a></button></td>";
                // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
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
            <div id="returnrequestbook" class="innerright portion" style="display:none"></br>
                <div class="innerportion">
                    <button class="innerheading">RETURN REQUEST APPROVAL</button>
                    </br></br> 
                    <!-- <div class="usertablealign"> -->
                    <?php
            $u=new data;
            $u->setconnection();
            $u->returnrequestdata();
            $recordset=$u->returnrequestdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  
            padding: 8px;'>user ID</th><th>Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Approve</th><th>Delete</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                
                $table.="<td><button class='delete'> <a href='returnbook.php?bookname=$row[3]&userid=$row[1]'> Approve </a></button></td>";
                $table.="<td><button class='delete'> <a href='returnrequestdelete.php?bookname=$row[3]&userid=$row[1]'> Delete </a></button></td>";
                // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <footer id="footerimg">
                <!-- <img src="pictures/footer background.jpg" height="auto" width="1178px"> -->
                <p id="footertext">whiteoak Library &copy; 2022-present</p>
            </footer>
        <script>
            function openpart(portion){
                var i;
                var x=document.getElementsByClassName("portion");
                for(i=0;i<x.length;i++){
                    x[i].style.display = "none";
                }
                document.getElementById(portion).style.display="block";
            }
        </script>
    </body>
</html>