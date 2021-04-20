
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
                #login{
                        float:right;
                }
        </style>
</head>
 
<body>  
        
        <button id="login" onclick="location.href='./login.php'">사용자 로그인</button>
        <div align='center'>
  
        <span><h3>관리자 로그인</h3></span>
        
        <form method='post' action='login_admin_action.php'>
        <fieldset style= "width:270; height:100; text-align:right;padding-right:20">
                <p>관리자ID : <input name="id" type="text"></p>
                <p>관리자PW : <input name="pw" type="password"></p>
        </fieldset>
        <br>
                <input type="submit" value="로그인">

        </form>
        
 
        </div>
 
 
</body>
 
</html>


