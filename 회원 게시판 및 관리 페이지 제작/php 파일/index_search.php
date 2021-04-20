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
        height:30px;
        width:130px;
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
        width:60px;
    }
    #wide{
        width:400px;
    }
    #bit_thin{
        width:100px;
    }
    a{
        text-decoration:none;
    }
    #search{
            text-align:right;
            width:90%;
            padding-bottom:10px;
            display:inline-block;
         }
    #index{
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
        ?><?php echo $_SESSION['userID'];?> 님 반갑습니다.
        <?php
    }
    ?>
    <button id="logout" onclick="location.href='./logout.php'">로그아웃</button>
    <?php
        
        header('Content-Type: text/html; charset=utf-8'); # utf-8 인코딩
        $connect = mysqli_connect('localhost', 'root', '6238', 'test') or die("fail");
        $id=$_POST["search"];
        
    ?>
    <div align=center> 
    <br><br>
  <h3>자유게시판</h3>
  
   <!-- 검색창 만들기 -->
   <div id="index">
   <button onclick="location.href='./index.php'">전체 게시글 조회</button>
   </div>
   <form id="search" method="post" action="index_search.php">
   <span id="searchbox"> 회원 ID 입력 : <input type="text" name="search" placeholder = "Honggildong">
   <input type="submit" value="검색"></span>
   </form>
   <!-- 검색창 만들기 -->
    <table>
      <thead>
          <tr>
              <th id="thin">번호</th>
                <th id="wide">제목</th>
                <th id="bit_thin">글쓴이</th>
                <th id="bit_thin">작성일</th>
                <th id="thin">조회수</th>
            </tr>
        </thead>
<?php
$sql ="SELECT * FROM board where bname = '".$id."'order by idx desc";
$ret = mysqli_query($connect, $sql);   
while($row = mysqli_fetch_array($ret)) {
    $title=$row["title"];
    if(strlen($title)>30)
    {
        $title=str_replace($row["title"],mb_substr($row["title"],0,30,"utf-8")."...",$row['title']);
    }
?>
<tbody>
<tr>
<td id="thin"><?php echo $row['idx'];?></td>
<td id="wide"><a href=""><?php echo $title;?></a></td>
<td id="bit_thin"><?php echo $row['bname']?></td>
<td id="bit_thin"><?php echo $row['date']?></td>
<td id="thin"><?php echo $row['hit']?></td>
</tr>
</tbody>
<?php } ?>
</table>
<br>
<button id="write" onclick="location.href='./write.php'">게시글 작성</button>
</body>
</html>