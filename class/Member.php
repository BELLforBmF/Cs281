

<?php

class Member
{
  private $_id;
  private $_pwd;
  private $_name;
  private $_lname;
  private $_type;
  private $_address;
  private $_email;

  public function __construct($id,$pwd,$name,$lname,$type,$address,$email)
  {

      $this->_id = $id;
      $this->_name =$name;
      $this->_lname = $lname;
      $this->_pwd =  $pwd;
      $this->_type = $type;
      $this->_address = $address;
      $this->_email = $email;

  }

  public function register($conn)
  {

      $sql = "SELECT COUNT(mem_id) AS cData FROM member WHERE mem_id = '".$this->_id."'";
      $rs = $conn->query($sql) or die($sql."<br>".$conn->error);
      $data = $rs->fetch_array();

      if($data['cData'] != 0) {

          echo "<script>alert('username ถูกใช้แล้วจ้าาา');window.history.back()</script>";
          return -1;

      }

      $sql = "INSERT INTO member
                (mem_id, mem_name, mem_lname, mem_pass, mem_type, mem_add, mem_email)
                VALUES
                ('".$this->_id."','".$this->_name."','".$this->_lname."','".$this->_pwd."','".$this->_type."','".$this->_address."','".$this->_email."')";
      $conn->query($sql) or die($sql."<br>".$conn->error);
      echo "<script>alert('บักทึกแล้วจ้าาา');window.location='login.html'</script>";
  }

  public function login($conn)
  {
      $sql = "SELECT * FROM member WHERE mem_id = '".$this->_id."' AND mem_pass = '".$this->_pwd."'";
      $rs = $conn->query($sql) or die($sql."<br>".$conn->error);     //save information from table to object
      $data = $rs->fetch_array();  //mysqli_fecth_array($object);
      if(!$data){
                 echo "<script>alert('ID or Password incorrect.');window.history.back()</script>";
       }else{
          session_start();
	        $_SESSION["mem_id"] = $data['mem_id'];
	        $_SESSION["mem_type"] = $data['mem_type'];
	        session_write_close();
	        if($_SESSION["mem_type"]==1){
		            echo "<script>alert('Login successful.');window.location='index.php'</script>";
	        }else{
		            echo "<script>alert('Login successful.');window.location='index.php'</script>";
	        }

      }


  $conn->close();
  }


}

?>
