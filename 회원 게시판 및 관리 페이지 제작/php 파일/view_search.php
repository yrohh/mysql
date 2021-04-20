<!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style>
         table{
            width:90%;
         }
         table,td,th{
            
            border-collapse:collapse;
            text-align : center;

         }
         th{
            height: 30px;
            width: 130px;
            border-bottom:1px solid gray;
         }
         td{
            padding-left:5px;
            border-bottom:1px solid gray;
         }
         thead{
            background: darkgray;
            color:white;
         }
         #thin{
            width:50px;
         }
         #edit{
            color : yellow;
            width: 70px;
         }
         #delete{
            color: #CC3399;
            width: 70px;
         }
         a{
            text-decoration :none;
         }
         a:hover{
            font-weight:bold;
            color: red;     
         }
         a:visited{
            color:blue;
         }
         #search{
            text-align:right;
            width:90%;
            padding-bottom:10px;
            display:inline-block;
         }
         #view{
        text-align:right;
        width:90%;
        padding-bottom:10px;
        
    }

      </style>
   </head>
   <body>
   <?php
    session_start();

    if(isset($_SESSION['userID'])){
        ?>[<?php echo $_SESSION['userID'];?> page]
        <?php
    }
    ?>
    <button id="logout" onclick="location.href='./logout.php'">로그아웃</button>
   <?php
   $connect=mysqli_connect("localhost", "root", "6238", "test") or die("fail");
   $id=$_POST['search'];
   $sql ="SELECT * FROM members where userID = '".$id."'";
   
   $ret = mysqli_query($connect, $sql);   
   if($ret) {
	   
	   $count = mysqli_num_rows($ret);
   }
   else {
	   echo "members 데이터 조회 실패."."<br>";
	   echo "실패 원인 :".mysqli_error($connect);
	   exit();
   } 
   ?>
   <div align=center>
      <br><br>
   <h3>회원 목록</h3>  
   <br>

   <!-- 검색창 만들기 -->
   <div id="view">
   <button onclick="location.href='./view.php'">전체 회원 조회</button>
   </div>
   <form id="search" method="post" action="view_search.php">
   회원 ID 입력 : <input type="text" name="search" placeholder = "Honggildong">
   <input type="submit" value="검색">
   </form>
   <!-- 검색창 만들기 -->
   
   
       <table>
          <thead><tr><th>ID</th><th>Password</th><th>이름</th><th>주소</th><th id="thin">나이</th>
          <th id="thin">성별</th><th>연락처</th><th>이메일</th>
          <th id="edit">수정</th><th id="delete">삭제</th></tr></thead>
   <?php
   while($row = mysqli_fetch_array($ret)) {
	  echo "<tr>";
	  echo "<td>", $row['userID'], "</td>";
	  echo "<td>", $row['password'], "</td>";
	  echo "<td>", $row['name'], "</td>";
	  echo "<td>", $row['address'], "</td>";
	  echo '<td id="thin">', $row['age'], "</td>";
	  echo '<td id="thin">', $row['sex'], "</td>";
	  echo "<td>", $row['mobile'], "</td>";
     echo "<td>", $row['email'], "</td>";
     echo '<td>', "<a href='update.php?userID=", $row['userID'], "'>수정</a></td>";
     echo '<td>', "<a href='delete.php?userID=", $row['userID'], "'>삭제</a></td>";
	  echo "</tr>";	  
   }   
   mysqli_close($connect);
   echo "</TABLE>"; 
   ?>
   <br>
   <button id="manage" onclick="location.href='./manage.php'">초기 화면</button>

</div>
   </body>
   </html>
