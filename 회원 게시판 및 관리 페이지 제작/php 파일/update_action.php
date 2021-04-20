<?php
   $con=mysqli_connect("localhost", "root", "6238", "test") or die("fail");

   $userID = $_POST['userID'];
   $password = $_POST['password'];
   $name = $_POST["name"];
   $address = $_POST["address"];
   $age = $_POST['age'];
   $sex = $_POST['sex'];
   $mobile = $_POST["mobile"];
   $email = $_POST["email"];
   
   
   $sql ="UPDATE members SET name='".$name."', address='".$address;
   $sql = $sql."', age='".$age."', sex='".$sex."',mobile='".$mobile;
   $sql = $sql."', email='".$email."' WHERE userID='".$userID."'";
   
   $ret = mysqli_query($con, $sql);
 
    
   if($ret) {
	?> <script> alert("회원 정보가 수정되었습니다.");location.replace("./view.php");</script><?php
   }
   else {
      
	   echo "데이터 수정 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
   } 
   mysqli_close($con);
   
   
?>
