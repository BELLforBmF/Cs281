<?php
class Product{
  public $_pid;
  public $_pname;
  public $_info;
  public $_price;
  public $_pimg;

  public function __construct($id,$name,$price,$info,$img)
  {

      $this->_pid = $id;
      $this->_pname =$name;
      $this->_info = $info;
      $this->_price = $price;
      $this->_pimg =  $img;

  }

  public function addProduct($conn){
    $sql = "INSERT INTO product
              (pid, pname, pdetail, pprice,pimg)
              VALUES
              ('".$this->_pid."','".$this->_pname."','".$this->_info."','".$this->_price."','".$this->_pimg."')";
    $conn->query($sql) or die($sql."<br>".$conn->error);
  }

  public function getListProd($conn) {

      $sql = "SELECT * FROM product  ";
      $rs = $conn->query($sql) or die($sql."<br>".$conn->error);

      $tempArr = array();

      while ($data = $rs->fetch_array()) {

          $prod = new Product($data['pid'],$data['pname'],$data['pprice'],$data['pdetail'],$data['pimg']);
          array_push($tempArr,$prod);
      }

      return $tempArr;
  }
}

?>
