<!--200505-->
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
        <button id="login" onclick="location.href='./login.php'">이전으로</button> 
        <div align="center">
                <h3>회원가입</h3>
                <form method='post' action='join_action.php'>
                <fieldset style= "width:235; height:330; text-align:right;padding-right:20px">
                        <p>ID : <input type="text" name="id"></p>
                        <p>PW : <input type="password" name="pw"></p>
                        <p>이름 : <input type="text" name="name" placeholder="홍길동"></p>
                        <p>주소 : <input type="text" name="address" placeholder="경기도 구리시"></p>
                        <p>나이 : <input type="number" name="age" placeholder="26"></p>
                        <p>성별 : <input type="text" name="sex" placeholder="남"></p>
                        <p>번호 : <input type="text" name="mobile" placeholder="01012341234"></p>
                        <p>Email : <input type="email" name="email" placeholder="apple@naver.com"></p>

                </fieldset>
                <br>
                        <input type="submit" value="회원가입">
                </form>
        </div>
</body>
</html>

