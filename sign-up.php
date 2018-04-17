<?php

  include "class/Conn.php";
  include "class/Member.php";


  $id = $_REQUEST['cusername'];
  $pwd = $_REQUEST['cpassword'];
  $name =$_REQUEST['cfirstname'];
  $lname =$_REQUEST['clastname'];
  $email =$_REQUEST['cmail'];
  $address = $_REQUEST['caddress'];
  $type = 1;

  $mem = new Member($id,$pwd,$name,$lname,$type,$address,$email);
  $mem->register($conn);

?>
