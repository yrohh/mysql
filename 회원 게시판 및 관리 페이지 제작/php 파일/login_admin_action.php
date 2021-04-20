<?php
        /*200505*/
        
        /*세션을 사용하기 위한 세션 초기화 함수*/
        session_start();
 
        $connect = mysqli_connect("localhost", "root", "6238", "test") or die("fail");
 
        /*각 변수에 입력값 저장*/
        $id=$_POST['id'];
        $pw=$_POST['pw'];
        $sql="select * from members where userID = '$id'";
        $sql2="select * from members where password = '$pw'";
        $result_id = mysqli_query($connect,$sql);
        $result_pw = mysqli_query($connect,$sql2);
        /*result에 입력 id 값을 갖는 튜플이 있는지 여부*/
        if(mysqli_num_rows($result_id)==1) {
 
                /*입력 비밀번호가 등록 비밀번호가 부합할 시 세션 생성*/
                if(mysqli_num_rows($result_pw)==1){
                        $_SESSION['userID']=$id;
                        /*변수가 설정됐는지 확인*/
                        if(isset($_SESSION['userID'])){
                        ?>      <script>
                                        alert("로그인 되었습니다.");
                                        location.replace("./manage.php");
                                </script>
                        <?php
                        }
                        else{
                                echo "session fail";
                        }
                }
                else {
        ?>              <script>
                                alert("관리자가 아닐 시, 사용자 로그인을 이용해주세요.");
                                history.back();
                        </script>
        <?php
                }
 
        }
 
        else{
        ?>      <script>
                        alert("관리자가 아닐 시, 사용자 로그인을 이용해주세요.");
                        history.back();
                </script>
        <?php
        }
 
 
?>
 
