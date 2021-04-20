<?php
 
        $connect = mysqli_connect('localhost', 'root', '6238', 'test') or die("fail");
 
 
        $id=$_POST['id'];
        $pw=$_POST['pw'];
        $name=$_POST['name'];
        $address=$_POST['address'];
        $age=$_POST['age'];
        $sex=$_POST['sex'];
        $mobile=$_POST['mobile'];
        $email=$_POST['email'];


        
        /* 입력받은 값들을 DB에 삽입 */
        $query = "insert into members (userID, password, name, address, age, sex, mobile, email) values ('$id', '$pw', '$name', '$address', '$age','$sex','$mobile','$email')";
        $result = mysqli_query($connect,$query);
 
        /* 저장이 되면, result 변수에는 true 값이 저장됨 */
        if($result) {
        ?>      <script>
                alert('가입 되었습니다.');
                location.replace("./login.php");
                </script>
 
<?php   }
        else{
?>              <script>
                        
                        alert("fail");
                        location.replace("./join.php");
                        
                </script>
<?php   }
 
        mysqli_close($connect);
?>
 

