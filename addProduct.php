<?php

  include "class/Conn.php";
  include "class/Product.php";



  $name = $_REQUEST['pname'];
  $price = $_REQUEST['pprice'];
  $info = $_REQUEST['pinfo'];
  $img = $_FILES["pimg"]["name"];
  $stock = 1;

  $pro = new Product($id,$name,$price,$info,$img,$stock);
  $pro->addProduct($conn);
  move_uploaded_file($_FILES["pimg"]["tmp_name"],"img/product/".$img);


?>
