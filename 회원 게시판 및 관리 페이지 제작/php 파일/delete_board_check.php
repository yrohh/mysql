<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
                    div{
                        position: absolute;
                        top:50%;
                        left:50%;
                        width:300px;
                        height:150px;
                        margin-left:-150px;
                        margin-top:-200px;
                }
                #index{
            float:right;
        }
    </style>
</head>
<body>
<?php
    
    session_start();
    if(isset($_SESSION['userID'])){
        ?><?php echo $_SESSION['userID'];?> 님 반갑습니다.
        <?php
    }
    ?>
    <button id="logout" onclick="location.href='./logout.php'">로그아웃</button>
    <button id="index" onclick="location.href='./index.php'">이전으로</button> 
    <?php
        $connect = mysqli_connect('localhost', 'root', '6238', 'test') or die("fail");

        $bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
    ?>
<div align=center>
    <form method = "POST" action="delete_board_check_action.php?idx=<?php echo $bno ?>">
    <fieldset style= "width:270px;height:60px;text-align:left;padding-left:20px; padding-top:20px">
    <legend>작성자 확인</legend>
    비밀번호 : <input type="password" name="bpassword">
    <br>
    
    </fieldset>
    <br>
    <input type="submit" value="삭제하기">
    </form>
    </div>
</body>
</html>
