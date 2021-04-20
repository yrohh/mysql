<?php
   $con=mysqli_connect("localhost", "root", "6238", "test") or die("fail");

   $userID = $_POST["userID"];

   $sql ="DELETE FROM members WHERE userID='".$userID."'";
   $ret = mysqli_query($con, $sql);
   
 
    
   if($ret) {
	   ?> <script> alert("회원 정보가 삭제되었습니다.");location.replace("./view.php");</script><?php
   }
   else {
	   echo "데이터 삭제 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
   } 
   mysqli_close($con);
   
?>
