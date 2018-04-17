<?php

  include "class/Conn.php";
  include "class/Product.php";


  $id = $_REQUEST['pid'];
  $price = $_REQUEST['pprice'];
  $stock = $_REQUEST['qty'];
  $pro = new Product($id,'',$price,'','',$stock);
  $pro->updateProduct($conn);
?>
