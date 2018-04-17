<?php
  include "class/Conn.php";
  include "class/Member.php";

  $id = $_REQUEST['cusername'];
  $pwd = $_REQUEST['cpassword'];

  $mem = new Member($id,$pwd,'','','','','');
  $mem->login($conn);

?>
