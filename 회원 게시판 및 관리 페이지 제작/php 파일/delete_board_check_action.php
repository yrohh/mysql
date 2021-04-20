
<?php
   $con=mysqli_connect("localhost", "root", "6238", "test") or die("fail");

   
   $bno = $_GET['idx'];
   $bpassword = $_POST{'bpassword'};

   $check_sql = "select * from board where idx = '".$bno."'";
   $check_ = mysqli_query($con,$check_sql);
   $check = mysqli_fetch_array($check_);
   $check_pw = $check["bpassword"];

   if($check_pw!=$bpassword){
       ?><script>alert("비밀번호를 정확히 입력해주세요.");history.back();</script><?php
   }
    else{
        $sql = "delete from board where idx ='".$bno."'";
        $ret = mysqli_query($con,$sql);
        if($ret){
       ?><script>alert("게시글이 삭제되었습니다."); location.replace("./index.php")</script><?php
   }
    }
   

?>
