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
   $name = $row["name"];
   
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
<div align=center>
<h3> 회원 삭제 </h3>
<FORM METHOD="post"  ACTION="delete_action.php">
<fieldset style= "width:260; height:100; text-align:right;padding-right:20;padding-top:15;padding-bottom:15;">
	아이디 : <INPUT id="A" TYPE ="text" NAME="userID" VALUE=<?php echo $userID ?> READONLY> <br>
	이름 : <INPUT id="A" TYPE ="text" NAME="name" VALUE=<?php echo $name ?> READONLY> <br> 
	<br>
	정말로 삭제하시겠습니까?	
</fieldset>
<br>
	<INPUT TYPE="submit"  VALUE="회원 삭제">
</FORM>
</div>
</BODY>
</HTML>