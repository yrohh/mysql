<?php
   $con=mysqli_connect("localhost", "root", "6238", "test") or die("fail");
   $sql ="SELECT * FROM members WHERE userID='".$_GET['userID']."'";

   $ret = mysqli_query($con, $sql);   
   if($ret) {
	   $count = mysqli_num_rows($ret);
	   if ($count==0) {
		   echo $_GET['userID']." 의 회원 ID가 존재하지 않습니다."."<br>";
		   echo "<br> <a href='view.php'> <--초기 화면</a> ";
		   exit();	
	   }		   
   }
   else {
	   echo "데이터 조회 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
	   echo "<br> <a href='view.php'> <--초기 화면</a> ";
	   exit();
   }   
   
   $row = mysqli_fetch_array($ret);
   $userID = $row['userID'];
   $password = $row['password'];
   $name = $row["name"];
   $address = $row["address"];
   $age = $row['age'];
   $sex = $row['sex'];
   $mobile = $row["mobile"];
   $email = $row["email"];
         
?>

<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
<style>
	div{
                        position: absolute;
                        top:50%;
                        left:50%;
                        width:300px;
                        height:150px;
                        margin-left:-150px;
                        margin-top:-230px;
                }
	#A{
		background-color:#DCDCDC;
	}
	#B{
		display: inline
	}
	#manage{
		float:right;
	}
</style>
</HEAD>
<BODY>
<?php
    session_start();

    if(isset($_SESSION['userID'])){
        ?>[<?php echo $_SESSION['userID'];?> page]
        <?php
    }
    ?>
    <button id="logout" onclick="location.href='./logout.php'">로그아웃</button>
	<button id="manage" onclick="location.href='./manage.php'">이전으로</button>
<div align =center>
<h3> 회원 정보 수정 </h3>
<FORM METHOD="POST"  ACTION="update_action.php">
<fieldset style= "width:270; height:180; text-align:right;padding-right:20;padding-top:15;padding-bottom:15;">
	아이디 : <INPUT id="A" TYPE ="text" NAME="userID" VALUE=<?php echo $userID ?> READONLY> <br>
	비밀번호 : <INPUT id="A" TYPE ="text" NAME="password" VALUE=<?php echo $password ?> READONLY> <br>
	이름 : <INPUT TYPE ="text" NAME="name" VALUE=<?php echo $name ?>> <br> 
	주소 : <INPUT TYPE ="text" NAME="address" VALUE=<?php echo $address ?>> <br>
	나이 : <INPUT TYPE ="number" NAME="age" VALUE=<?php echo $age ?>> <br>
	성별 : <INPUT TYPE ="text" NAME="sex" VALUE=<?php echo $sex ?>> <br>
	연락처 : <INPUT TYPE ="text" NAME="mobile" VALUE=<?php echo $mobile ?>> <br>
	이메일 : <INPUT TYPE ="email" NAME="email" VALUE=<?php echo $email ?>> <br>
</fieldset>
<br>
<INPUT TYPE="submit"  VALUE="정보 수정">
</FORM>
</div>
</BODY>
</HTML>