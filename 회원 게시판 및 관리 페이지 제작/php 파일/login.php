
<html>
<head>
        <meta charset='utf-8'>
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
                #admin{
                        float:right;
                }
        </style>
</head>
 
<body>  
        
        <button id="admin" onclick="location.href='./login_admin.php'">관리자 로그인</button>
        
        <div align='center'>
  
        <span><h3>로그인</h3></span>
        
        <form method='post' action='login_action.php'>
        <fieldset style= "width:230; height:95; text-align:right;padding-right:20">
                <p>ID : <input name="id" type="text"></p>
                <p>PW : <input name="pw" type="password"></p>
        </fieldset>
        <br>
                <input type="submit" value="로그인">

        </form>
        
        <button id="join" onclick="location.href='./join.php'">회원가입</button>
 
        </div>
 
 
</body>
 
</html>


