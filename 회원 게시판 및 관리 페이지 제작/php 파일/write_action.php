<?php

$con=mysqli_connect("localhost", "root", "6238", "test") or die("fail");

//각 변수에 write.php에서 input name값들을 저장한다
$bname = $_POST['bname'];
$bpassword = $_POST['bpassword'];
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
$hit = 0;

$check_sql = "alter table board auto_increment=1";
$check = mysqli_query($con,$check_sql);
if($bname && $bpassword && $title && $content){
    $sql = "insert into board(bname,bpassword,title,content,date,hit) values('".$bname;
    $sql = $sql."','".$bpassword."','".$title."','".$content."','".$date."','".$hit."')";
    $ret = mysqli_query($con, $sql);

    echo "<script>
    alert('게시글이 등록되었습니다.');
    location.href='/';</script>";
}
else{
    echo "<script>
    alert('게시글을 확인해주세요.');
    history.back();</script>";
}
?>


