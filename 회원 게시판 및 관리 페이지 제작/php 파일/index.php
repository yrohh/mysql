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
        color:rgb(123,132,255);
    }
    #search{
            text-align:right;
            width:90%;
            padding-bottom:10px;
         }
    a:visited{
        color:color:rgb(123,132,255);
    }
    a:hover{
        font-weight:bold;
    }
    #page_num{    
        
        top:50%;
        left:50%;
        width:350px;
        height:10px;

        font-size:14px;
        
    }
    #page_num ul li {
        float : left;
        margin-left : 10px;
        text-align : center;
        list-style-type:none;
    }
    .fo_re{
        font-weight:bold;
        color:red;
    }
    li>a{
        color:black;
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
    ?>
    <div align=center> 
    <br><br>
  <h3>자유게시판</h3>
   <!-- 검색창 만들기 -->
   <form id="search" method="POST" action="index_search.php">
   회원 ID 입력 : <input type="text" name="search" placeholder = "Honggildong">
   <input type="submit" value="검색">
   </form>
   <!-- 검색창 만들기 -->
    <table class="list-table">
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
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
$sql = "select * from board";
$ret = mysqli_query($connect, $sql);
$row_num = mysqli_num_rows($ret);
$list = 10; // 한 페이지에 보여줄 게시글 수
$block_ct = 5; // 블록당 보여줄 페이지 수

$block_num = ceil($page/$block_ct); // 현재 페이지 블록 구하기
$block_start = (($block_num -1) * $block_ct ) +1; // 블록의 시작 번호
$block_end = $block_start + $block_ct - 1 ; // 블록의 마지막 번호

$total_page = ceil($row_num / $list); // 페이징한 페이지 수 구하기
if($block_end > $total_page) $block_end = $total_page; // 만약 블록의 마지막 번호가 페이지수보다 많다면
$total_block = ceil($total_page/$block_ct); // 블록 총 개수
$start_num = ($page-1) * $list; // 시작번호 (page-1)에서 $list를 곱한다.

$sql2 = "select * from board order by idx desc limit $start_num, $list";
$ret2 = mysqli_query($connect, $sql2);
while($row = mysqli_fetch_array($ret2)) {
    $title = $row['title'];
    if(strlen($title)>30){
        $title=str_replace($row["title"],mb_substr($row["title"],0,30,"utf-8")."...",$row['title']);
    }



?>
<tbody>
<tr>
<td id="thin"><?php echo $row['idx'];?></td>
<td id="wide"><?php $boardtime = $row['date']; $timenow = date("Y-m-d");
if($boardtime==$timenow){
    $img = "<img src='/img/new.png' alt='new' title='new' />";
}else{
    $img = "";
}
?><a href="read.php?idx=<?php echo $row["idx"];?>"><?php echo $title;?><?php echo $img;?></a></td>
<td id="bit_thin"><?php echo $row['bname']?></td>
<td id="bit_thin"><?php echo $row['date']?></td>
<td id="thin"><?php echo $row['hit']?></td>
</tr>
</tbody>
<?php } ?>
</table>

<div id="page_num">
      <ul>
      <?php
          if($page <= 1)
          { //만약 page가 1보다 크거나 같다면
            echo "<li class='fo_re'>처음</li>"; //처음이라는 글자에 빨간색 표시 
          }else{
            echo "<li><a href='?page=1'>처음</a></li>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
          }
          if($page <= 1)
          { //만약 page가 1보다 크거나 같다면 빈값
            
          }else{
          $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
            echo "<li><a href='?page=$pre'>이전</a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
          }
          for($i=$block_start; $i<=$block_end; $i++){ 
            //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
            if($page == $i){ //만약 page가 $i와 같다면 
              echo "<li class='fo_re'>[$i]</li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
            }else{
              echo "<li><a href='?page=$i'>[$i]</a></li>"; //아니라면 $i
            }
          }
          if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
          }else{
            $next = $page + 1; //next변수에 page + 1을 해준다.
            echo "<li><a href='?page=$next'>다음</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
          }
          if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
            echo "<li class='fo_re'>마지막</li>"; //마지막 글자에 긁은 빨간색을 적용한다.
          }else{
            echo "<li><a href='?page=$total_page'>마지막</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
          }
        ?>
      </ul>



    </div>

<br>

<div>
<button id="write" onclick="location.href='./write.php'">게시글 작성</button>
</div>
</body>
</html>