<?php

  include "class/Conn.php";
  include "class/Product.php";



  $name = $_REQUEST['pname'];
  $price = $_REQUEST['pprice'];
  $info = $_REQUEST['pinfo'];
  $img = $_FILES["pimg"]["name"];

  $pro = new Product($id,$name,$price,$info,$img);
  $pro->addProduct($conn);
  move_uploaded_file($_FILES["pimg"]["tmp_name"],"img/product/".$img);
  echo "<script>alert('บักทึกแล้วจ้าาา');window.location='add_product.html'</script>";

?>
