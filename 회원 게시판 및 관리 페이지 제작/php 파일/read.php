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
        #idx{
            display:none;
        }
        #forrm{
            display:inline;
        }
        #bpassword{
            width:135px;
        }
        #space_{
            height:10px;
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
        $hit = mysqli_query($connect,$sql);
		$hit = mysqli_fetch_array($hit);
        $hit = $hit['hit'] + 1;
        $sql_u = "update board set hit = '".$hit."' where idx = '".$bno."'";
        $fet = mysqli_query($connect,$sql_u);
        $sql_c = "select * from board where idx='".$bno."'"; /* 받아온 idx값을 선택 */
        $ret = mysqli_query($connect,$sql_c);
		$board = mysqli_fetch_array($ret);
    ?>
    
    <div align=center>
    <br>
    <br><br>
        <h3>자유게시판</h3>
        
            <div>
                
                <fieldset style= "width:480px;height:480px;text-align:left;padding-left:20px; padding-top:20px">
                    <div><span>작성자 : <b><?php echo $board['bname'];?></b></span>
                <span id="hit">조회수 : <?php echo $board['hit'];?></span></div>
                    <br>
                    <div><b><?php echo $board['title'];?></b></div>
                    <br>                                    
                    <div></div>
                    <div id="content">
                        <textarea name="content" rows="25" cols="64" readonly><?php echo $board['content'];?></textarea>
                    </div>
                    <div>
                    
                
                </fieldset>
                    <br>
                        <span><button onclick="location.href='modify.php?idx=<?php echo $board['idx']; ?>'">수정하기</button>
                        <span id="space"></span>
                        <button onclick="location.href='delete_board_check.php?idx=<?php echo $board['idx'];?>'">삭제하기</button>
                    </span>
                
                    
                
            </div>
        </div>




</body>
</html>