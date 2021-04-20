<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        textarea{
                resize:none;
                overflow:auto;
        }
        #hit{
            padding-right:15px;
            float:right;
        }
        #index{
            float:right;
        }
        #space{
            display:inline-block;
            width:10px;
        }
        #bname{
            background-color:#DCDCDC;
        }
        #idx{
            display:none;
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
        
        header('Content-Type: text/html; charset=utf-8'); # utf-8 인코딩
        $connect = mysqli_connect('localhost', 'root', '6238', 'test') or die("fail");
    ?>


	<?php
        $bno = $_GET['idx']; /* bno함수에 idx값을 받아와 넣음*/
        $sql = "select * from board where idx ='".$bno."'";
        $ret = mysqli_query($connect,$sql);
		$board = mysqli_fetch_array($ret);
    ?>
    
    <div align=center>
    <br>
    <br><br>
        <h3>게시글 수정</h3>
        
            <div>
                <form method="post" action="modify_action.php">
                <fieldset style= "width:480px;height:520px;text-align:left;padding-left:20px; padding-top:20px">
                    <div><span>작성자 : 
                        <input id="bname" type="text" name="bname" value=<?php echo $board['bname']; ?> readonly></span>
                        <span><input id="idx" type="text" name="idx" value=<?php echo $bno; ?> readonly> </span>
                <span id="hit">조회수 : <?php echo $board['hit'];?></span>
                    </div>

                    <br>
                    <textarea name="title" rows="1" cols="55" placeholder="제목" maxlength="50" required><?php echo $board['title'];?></textarea>
                    <br>                                    
                    <br>
                    <div id="content">
                        <textarea name="content" rows="26" cols="64" required><?php echo $board['content'];?></textarea>
                    </div>
                    <div id="bpassword">
                    <input type="password" name="bpassword" placeholder="비밀번호">
                    </div>
                    
                </fieldset>
                    <br>
                        <span><button type="submit">작성하기</button>                        
                    </span>
</form>

                    
                
            </div>
        </div>




</body>
</html>