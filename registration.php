<?php
    include "include/db.inc.php";
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $con_no = $_POST['contact'];
    $email = $_POST['email'];
    $college = $_POST['col_name'];
    $gender = $_POST['gender'];
    if (empty($name)||empty($email)||empty($con_no)||empty($gender)||empty($college)){
        header("Location: registration.php?registration=empty");
        exit();
    }
    else{
        if (!preg_match('/^[a-zA-Z]*$/',$name)){
            header("Location: registration.php?registration=invalid");
            exit();
        }
        else{
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                header("Location: registration.php?registration=email");
                exit();                                         
            }
            else{
                $sql = "SELECT * FROM cse.participants WHERE name = \"$name\"";
                $result = mysqli_query($conn,$sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0){
                    header("Location: registration.php?registration=AlreadyRegistered");
                    exit();
                }
                else{
                    $sql = "INSERT INTO cse.participants (name, contact_no, email, college_name, gender) VALUES('$name','$con_no','$email','$college','$gender')";
                    mysqli_query($conn,$sql);
                    header("Location:registration.php?registration=success");
                    exit();
                }
            }
        }

    }
}
else{
    header("Location:thankyou.php");
    exit();
}
?>
