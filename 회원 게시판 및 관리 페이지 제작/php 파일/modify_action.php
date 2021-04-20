<?php
   $con=mysqli_connect("localhost", "root", "6238", "test") or die("fail");

   $bno = $_POST['idx'];
   $bname = $_POST['bname'];
   $title = $_POST['title'];
   $content = $_POST['content'];
   $bpassword = $_POST['bpassword'];
   $check_sql = "select * from board where idx = '".$bno."'";
   $check_ = mysqli_query($con,$check_sql);
   $check = mysqli_fetch_array($check_);
   $check_pw = $check["bpassword"];
   $idx = $check["idx"];

   if ($check_pw == $bpassword){
      $sql = "update board set bname='".$bname."',title='".$title."',content='".$content."' where idx='".$bno."'";
      $ret = mysqli_query($con,$sql);
      ?><script>alert("수정되었습니다."); location.replace("./index.php");</script>
      <?php ;}
   
      else {
         ?>
         <script>alert("비밀번호를 정확히 입력해주세요."); history.back();</script>
         <?php
      ;}?>
