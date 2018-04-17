<?php
class Product{
  public $_pid;
  public $_pname;
  public $_info;
  public $_price;
  public $_pimg;
  public $_stock;

  public function __construct($id,$name,$price,$info,$img,$stock)
  {

      $this->_pid = $id;
      $this->_pname = $name;
      $this->_info = $info;
      $this->_price = $price;
      $this->_pimg =  $img;
      $this->_stock = $stock;

  }

  public function addProduct($conn){
    $sql = "INSERT INTO product
              (pid, pname, pdetail, pprice, pimg, stock)
              VALUES
              ('".$this->_pid."','".$this->_pname."','".$this->_info."','".$this->_price."','".$this->_pimg."','".$this->_stock."')";
    $conn->query($sql) or die($sql."<br>".$conn->error);
    echo "<script>alert('บักทึกแล้วจ้าาา');window.location='addproduct.html'</script>";
  }

  public function getListProd($conn) {

      $sql = "SELECT * FROM product  ";
      $rs = $conn->query($sql) or die($sql."<br>".$conn->error);

      $tempArr = array();

      while ($data = $rs->fetch_array()) {

          $prod = new Product($data['pid'],$data['pname'],$data['pprice'],$data['pdetail'],$data['pimg'],$data['stock']);
          array_push($tempArr,$prod);
      }

      return $tempArr;
  }

  public function updateProduct($conn) {
    $sql = "UPDATE product
              SET
              pprice = '".$this->_price."', stock = '".$this->_stock."' WHERE pid = '".$this->_pid."'";
    $conn->query($sql) or die($sql."<br>".$conn->error);
    echo "<script>alert('Update complete.');window.location='manageProduct.php'</script>";

  }


}


?>
