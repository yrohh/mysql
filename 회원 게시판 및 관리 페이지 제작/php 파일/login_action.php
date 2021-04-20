<?php
        /*200505*/
        
        /*세션을 사용하기 위한 세션 초기화 함수*/
        session_start();
 
        $connect = mysqli_connect("localhost", "root", "6238", "test") or die("fail");
 
        /*각 변수에 입력값 저장*/
        $id=$_POST['id'];
        $pw=$_POST['pw'];
 
        /*query 변수에 쿼리문 저장 후, 해당 추출값 result 변수에 저장*/
        $query = "select * from members where userID='$id'";
        $result = mysqli_query($connect,$query);
 
 
        /*result에 입력 id 값을 갖는 튜플이 있는지 여부*/
        if(mysqli_num_rows($result)==1) {
 
                $row=mysqli_fetch_assoc($result);
                /*입력 비밀번호가 등록 비밀번호가 부합할 시 세션 생성*/
                if($row['password']==$pw){
                        $_SESSION['userID']=$id;
                        /*변수가 설정됐는지 확인*/
                        if(isset($_SESSION['userID'])){
                        ?>      <script>
                                        alert("로그인 되었습니다.");
                                        location.replace("./index.php");
                                </script>
                        <?php
                        }
                        else{
                                echo "session fail";
                        }
                }
                else {
        ?>              <script>
                                alert("아이디 혹은 비밀번호가 잘못되었습니다.");
                                history.back();
                        </script>
        <?php
                }
 
        }
 
        else{
        ?>      <script>
                        alert("아이디 혹은 비밀번호가 잘못되었습니다.");
                        history.back();
                </script>
        <?php
        }
 
 
?>
 
