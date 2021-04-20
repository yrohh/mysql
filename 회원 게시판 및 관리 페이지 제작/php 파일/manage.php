<HTML>
<HEAD>
<META http-equiv="content-type" content="text/html; charset=utf-8">
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
</style>
</HEAD>
<BODY>
    <?php
    session_start();

    if(isset($_SESSION['userID'])){
        ?>[<?php echo $_SESSION['userID'];?> page]
        <?php
    }
    ?>

    <button id="logout" onclick="location.href='./logout.php'">로그아웃</button>

<div align=center>
<h3> 회원 관리 시스템 </h3>

<fieldset style= "width:150; height:66; text-align:center;">
	<button id="view" onclick="location.href='./view.php'">회원 관리</button><br><br>
	<button id="insert" onclick="location.href='./insert.php'">신규 등록</button>
</fieldset>

</div>

</BODY>
</HTML>