<!doctype html>
<head>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" href="/css/style.css" />
<style>

                #index{
                    display:inline;
                        float:right;
                }
                #content textarea{
                    overflow:auto;
                }
                textarea{
                    resize:none;
                }
                #bname{
                    background-color:#DCDCDC;
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
    <div align=center>
    <br>
    <br><br>
        <h3>게시글 작성</h3>
        
            <div id="write_area">
                <form action="write_action.php" method="post">
                <fieldset style= "width:420px;height:470px;text-align:left;padding-left:20px; padding-top:20px">
                    <div id="title">
                        <textarea name="title" rows="1" cols="55" placeholder="제목" maxlength="50" required></textarea>
                    </div>
                    <div></div>
                    <div>
                        <input id="bname" type="text" name="bname" value=<?php echo $_SESSION['userID'] ?> readonly>
                    </div>
                    <div></div>
                    <div id="content">
                        <textarea name="content" placeholder="내용" rows="25" cols="55" required></textarea>
                    </div>
                    <div id="bpassword">
                        <input type="password" name="bpassword" placeholder="비밀번호" required />  
                    </div>
                </fieldset>
                    <br>
                        <button type="submit">게시글 등록</button>
                    
                </form>
            </div>
        </div>
    </body>
</html>
