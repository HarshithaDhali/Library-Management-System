<?php
session_start();
use LDAP\Result;

include("db.php");

class data extends db{
    private $bookpic;
    private $bookname;
    private $bookdescription;
    private $bookauthor;
    private $bookpublication;
    private $branch;
    private $bookprice;
    private $bookquantity;
    private $type;
    private $book;
    private $userselect;
    private $days;
    private $getdata;
    private $returndate;
    private $name;
    private $password;
    private $email;
    private $username;
    private $userloginid;
    private $logid;
    private $status;
    // function __construct(){
    //     echo "working";
    // }
    
    function adminlogin($t1,$t2){
        $q = "select * from admin where email='$t1' and password='$t2'";
        $recordSet = $this->connection->query($q);
        $result = $recordSet->rowCount();

        if($result > 0){
            foreach($recordSet->fetchAll() as $row){
                $loginid = $row['id'];
                $_SESSION["adminid"] = $loginid;
                header("location:admin_service_dashboard.php");
            }
        } elseif ($result <= 0)
            header("location:index.php?msg=Invalid Credentials...");
    }
    function addnewuser($name,$password,$email,$type){
        
        $this->name=$name;
        $this->password=$password;
        $this->email=$email;
        $this->type=$type;
        $q = "insert into userdata(userid, name, email, password, type)values('','$name','$email','$password','$type')";
        if($this->connection->exec($q)){
            header("location:admin_service_dashboard.php");
        }
        else{
            header("location:admin_service_dashboard.php?msg=New user adding request failed");
        }
    }
    function addbook($bookpic,$bookname,$bookdescription,$bookauthor,$bookpublication,$bookprice,$bookquantity){
        $this->bookpic=$bookpic;
        $this->bookname=$bookname;
        $this->bookdescription=$bookdescription;
        $this->bookauthor=$bookauthor;
        $this->bookpublication=$bookpublication;
        $this->bookprice=$bookprice;
        $this->bookquantity=$bookquantity;

        $q = "insert into book(id,bookpic,bookname,bookdescription,bookauthor,bookpublication,bookprice,bookquantity,bookavailable,bookrented)values('','$bookpic','$bookname','$bookdescription','$bookauthor','$bookpublication','$bookprice','$bookquantity','$bookquantity',0)";

        if($this->connection->exec($q)){
            header("location:admin_service_dashboard.php?msg=New book added successfully");
        }
        else{
            header("location:admin_service_dashboard.php?msg=New book adding request failed");
        }
    }
    function userdata(){
        $q = "select * from userdata";
        $data = $this->connection->query($q);
        return $data;
    }
    function deleteuserdata($id){
        $q = "delete from userdata where userid = $id";
        if($this->connection->exec($q)){
            header("location:admin_service_dashboard.php?msg=user data deleted successfully");
        }
        else{
            header("location:admin_service_dashboard.php?msg=user data delition failed");
        }
    }
    function getbook(){
        $q = "select * from book";
        $data = $this->connection->query($q);
        return $data;
    }
    function getbookdetail($id){
        $q="select * from book where id ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }
    function deletebook($id){
        $q="delete from book where id='$id'";
        if($this->connection->exec($q)){
    
            
           header("Location:admin_service_dashboard.php?msg=book deleted successfully");
        }
        else{
           header("Location:admin_service_dashboard.php?msg=book deletion failed");
        }
    }
    function getbookissue(){
        $q = "select * from book where bookavailable !=0";
        $data = $this->connection->query($q);
        return $data;
    }
    function issuebook($book,$userselect,$days,$getdate,$returnDate){
        $this->$book= $book;
        $this->$userselect=$userselect;
        $this->$days=$days;
        $this->$getdate=$getdate;
        $this->$returnDate=$returnDate;


        $q="SELECT * FROM book where bookname='$book'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where name='$userselect'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();

        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $issueid=$row['userid'];
                $issuetype=$row['type'];

                // header("location: admin_service_dashboard.php?logid=$logid");
            }
            foreach($recordSetss->fetchAll() as $row) {
                $bookid=$row['id'];
                $bookname=$row['bookname'];

                    $newbookavailable=$row['bookavailable']-1;
                     $newbookrented=$row['bookrented']+1;
            }

        
            $q="UPDATE book SET bookavailable='$newbookavailable', bookrented='$newbookrented' where id='$bookid'";
            $status = "return pending";
            if($this->connection->exec($q)){

            $q="insert into issuebook (id,userid,name,issuedbook,issuetype,issuedays,issuedate,issuereturn,fine,status)values('','$issueid','$userselect','$book','$issuetype','$days','$getdate','$returnDate','0','$status')";
            if($this->connection->exec($q)) {
                // $q="insert into rentedbook (id,userid,name,issuedbook,issuetype,issuedays,issuedate,issuereturn,fine)values('','$issueid','$userselect','$book','$issuetype','$days','$getdate','$returnDate','0')";
                //     if ($this->connection->exec($q)) {
                        header("Location:admin_service_dashboard.php?msg=book issued successfully");
                    // }
            }
    
            else {
                header("Location:admin_service_dashboard.php?msg=issueing book failed");
            }
            }
            else{
               header("Location:admin_service_dashboard.php?msg=fail");
            }


        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }


    }
    function issuereport(){
        $q="SELECT * FROM issuebook ";
        $data=$this->connection->query($q);
        return $data;
        
    }
    function finecollect($username,$remark,$fine){
        $this->username=$username;
        $this->$remark= $remark;
        $this->$fine=$fine;
        $q = "update issuebook set fine='$fine' where name='$username'";
        // $this->connection->exec($q);
        // $q = "update rentedbook set fine='$fine' where name='$username'";
        $this->connection->exec($q);
            $status = "payment pending";
            $q = "insert into fine (fineid,name,remark,amount,status)values('','$username','$remark',$fine,'$status')";
            if ($this->connection->exec($q)) {
                header("location:admin_service_dashboard.php?msg=fine imposed successfully");
            } else {
                header("location:admin_service_dashboard.php?msg=fine imposing failed");
            }
     }
     function finecollectreport(){
        $q="SELECT * FROM fine ";
        $data=$this->connection->query($q);
        return $data;
     }
     function requestbookdata(){
        $q="SELECT * FROM requestbook ";
        $data=$this->connection->query($q);
        return $data;
    }
    function issuebookapprove($book, $userselect, $days, $getdate, $returnDate, $redid)
    {
        $this->$book = $book;
        $this->$userselect = $userselect;
        $this->$days = $days;
        $this->$getdate = $getdate;
        $this->$returnDate = $returnDate;


        $q = "SELECT * FROM book where bookname='$book'";
        $recordSetss = $this->connection->query($q);

        $q = "SELECT * FROM userdata where name='$userselect'";
        $recordSet = $this->connection->query($q);
        $result = $recordSet->rowCount();

        if ($result > 0) {

            foreach ($recordSet->fetchAll() as $row) {
                $issueid = $row['userid'];
                $issuetype = $row['type'];

                // header("location: admin_service_dashboard.php?logid=$logid");
            }
            foreach ($recordSetss->fetchAll() as $row) {
                $bookid = $row['id'];
                $bookname = $row['bookname'];

                $newbookavailable = $row['bookavailable'] - 1;
                $newbookrented = $row['bookrented'] + 1;
            }


            $q = "UPDATE book SET bookavailable='$newbookavailable', bookrented='$newbookrented' where id='$bookid'";
            $status = "return pending";
            if ($this->connection->exec($q)) {
                $q = "insert into issuebook (userid,name,issuedbook,issuetype,issuedays,issuedate,issuereturn,fine,status)values('$issueid','$userselect','$book','$issuetype','$days','$getdate','$returnDate','0','$status')";
                if ($this->connection->exec($q)) {
                    // $q = "insert into rentedbook (userid,name,issuedbook,issuetype,issuedays,issuedate,issuereturn,fine)values('$issueid','$userselect','$book','$issuetype','$days','$getdate','$returnDate','0')";

                    // if ($this->connection->exec($q)) {

                        $q = "DELETE from requestbook where id='$redid'";
                        $this->connection->exec($q);
                        header("Location:admin_service_dashboard.php?msg=done");
                    } else {
                        header("Location:admin_service_dashboard.php?msg=fail");
                    }
                }
                 else {
                    header("Location:admin_service_dashboard.php?msg=fail");
                }
            // }



        } else {
            header("location: index.php?msg=Invalid Credentials");
        }
    }
   function userLogin($t1, $t2) {
        $q="select * from userdata where email='$t1' and password='$t2'";
        $recordSet=$this->connection->query($q);
        $result=$recordSet->rowCount();
        if ($result > 0) {

            foreach($recordSet->fetchAll() as $row) {
                $logid=$row['userid'];
                $_SESSION['userid'] = $logid;
                header("location: otheruser_dashboard.php");
            }
        }

        else {
            header("location: index.php?msg=Invalid Credentials");
        }

    }
    function userdetail($id){
        $q="select * from userdata where userid ='$id'";
        $data=$this->connection->query($q);
        return $data;
    }
    function requestbook($userid,$bookid){

        $q="SELECT * FROM book where id='$bookid'";
        $recordSetss=$this->connection->query($q);

        $q="SELECT * FROM userdata where userid='$userid'";
        $recordSet=$this->connection->query($q);

        foreach($recordSet->fetchAll() as $row) {
            $username=$row['name'];
            $usertype=$row['type'];
        }

        foreach($recordSetss->fetchAll() as $row) {
            $bookname=$row['bookname'];
        }

        if($usertype=="student"){
            $days=7;
        }
        if($usertype=="teacher"){
            $days=21;
        }


        $q="INSERT INTO requestbook (id,userid,bookid,username,usertype,bookname,issuedays)VALUES('','$userid', '$bookid', '$username', '$usertype', '$bookname', '$days')";

        if($this->connection->exec($q)) {
            header("Location:otheruser_dashboard.php?userlogid=$userid");
        }

        else {
            header("Location:otheruser_dashboard.php?msg=fail");
        }
        

    }
    function issuebookreport($userloginid){
        $q = "select * from issuebook where userid=$userloginid";
        $data=$this->connection->query($q);
        return $data;
    }
    function returnbook($userid,$bookname){
        $q="SELECT * FROM book where bookname='$bookname'";
        $recordSetss=$this->connection->query($q);
        foreach($recordSetss->fetchAll() as $row) {
            $bookavailable=$row['bookavailable']+1;
            $bookrented=$row['bookrented']-1;
        }
        // $q = "delete from rentedbook where userid = '$userid' and issuedbook = '$bookname' ";
        // $this->connection->exec($q);
        $status = 'returned';
        $q = "update issuebook set status='$status' where userid='$userid'";
        $this->connection->exec($q);
        $q = "delete from returnrequest where userid = '$userid' and issuedbook = '$bookname'";
        $this->connection->exec($q);
        $q = "update book set bookavailable='$bookavailable',bookrented='$bookrented' where bookname='$bookname'";
        if ($this->connection->exec($q)) {
            header("location: admin_service_dashboard.php");
        } else {
            header("location: admin_service_dashboard.php");
        }
    }
    function adminreturnbook($userid,$bookname){
        $status = 'returned';
        $q="SELECT * FROM book where bookname='$bookname'";
        $recordSetss=$this->connection->query($q);
        foreach($recordSetss->fetchAll() as $row) {
            $bookavailable=$row['bookavailable']+1;
            $bookrented=$row['bookrented']-1;
        }
        $q = "update book set bookavailable='$bookavailable',bookrented='$bookrented' where bookname='$bookname'";
        $this->connection->exec($q);
        
        $q = "update issuebook set status='$status' where userid='$userid'";
        // $this->connection->exec($q);
        // $q = "delete from rentedbook where userid = '$userid' and issuedbook = '$bookname' ";
        if ($this->connection->exec($q)) {
            header("location: admin_service_dashboard.php?msg=success");
        } else {
            header("location: admin_service_dashboard.php?msg=fail");
        }
    }
    function userfinecollectreport($userloginid){
        $q = "select * from userdata where userid='$userloginid'";
        $recordSetss=$this->connection->query($q);
        foreach ($recordSetss->fetchAll() as $row) {
            $username = $row['name'];
            $q = "SELECT * FROM fine where name='$username' ";
            $data = $this->connection->query($q);
            return $data;
        }
    }
    function rentedbookreport($userloginid){
        $status = "return pending";
        $q = "select * from issuebook where userid='$userloginid' and status='$status'";
        $data=$this->connection->query($q);
        return $data;
    }
    function adminrentedbookreport(){
        $status = "return pending";
        $q = "select * from issuebook where status='$status' ";
        $data=$this->connection->query($q);
        return $data;
    }
    function returnbookrequest($userid,$bookname){
        $q = "select * from issuebook where userid='$userid'and issuedbook='$bookname'";
        $recordSetss=$this->connection->query($q);
        foreach ($recordSetss->fetchAll() as $row) {
            $username = $row['name'];
            $issuetype = $row['issuetype'];
            $issuedays = $row['issuedays'];
            $issuedate = $row['issuedate'];
            $issuereturn = $row['issuereturn'];
            $fine = $row['fine'];
        }
        $q = "insert into returnrequest(id,userid,name,issuedbook,issuetype,issuedays,issuedate,issuereturn,fine)values('','$userid','$username','$bookname','$issuetype','$issuedays','$issuedate','$issuereturn','$fine')";
        if ($this->connection->exec($q)) {
            header("location: otheruser_dashboard.php?msg=success");
        } else {
            header("location: otheruser_dashboard.php?msg=fail");
        }
    }
    function returnrequestdata(){
        $q = "select * from returnrequest";
        $data=$this->connection->query($q);
        return $data;
    }
    function returnrequestdelete($userid,$bookname){
        $q = "delete from returnrequest where userid='$userid'and issuedbook='$bookname'";
        if ($this->connection->exec($q)) {
            header("location: admin_service_dashboard.php?msg=success");
        } else {
            header("location: admin_service_dashboard.php?msg=fail");
        }
    }
    function deletefine($name,$fineid){
        $q = "delete from fine where name='$name' and fineid = '$fineid'";
        if ($this->connection->exec($q)) {
            header("location: admin_service_dashboard.php?msg=success");
        } else {
            header("location: admin_service_dashboard.php?msg=fail");
        }
    }
    function finepaymentreport(){
        $status = "payment pending";
        $q="SELECT * FROM fine where status='$status' ";
        $data=$this->connection->query($q);
        return $data;
    }
    function payfine($name,$fineid){
        $status = 'paid';
        $q = "update fine set status='$status'";
        if ($this->connection->exec($q)) {
            header("location: admin_service_dashboard.php?msg=success");
        } else {
            header("location: admin_service_dashboard.php?msg=fail");
        }
    }
    function numbook(){
        $q = "select * from book";
        $recordSet = $this->connection->query($q);
        $result = $recordSet->rowCount();
        return $result;
    }
    function numuser(){
        $q = "select * from userdata";
        $recordSet = $this->connection->query($q);
        $result = $recordSet->rowCount();
        return $result;
    }
    function numbookissue(){
        $q = "select * from issuebook";
        $recordSet = $this->connection->query($q);
        $result = $recordSet->rowCount();
        return $result;
    }
    function numbookreturn(){
        $status = 'returned';
        $q = "select * from issuebook where status='$status'";
        $recordSet = $this->connection->query($q);
        $result = $recordSet->rowCount();
        return $result;
    }
}