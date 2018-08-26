<?php
    include "include/db.inc.php";
if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $con_no = $_POST['contact'];
    $email = $_POST['email'];
    $college = $_POST['col_name'];
    $gender = $_POST['gender'];
    if (empty($name)||empty($email)||empty($con_no)||empty($gender)||empty($college)){
        $empty = "";
        if(empty($name)){
            $empty .= " Name";
        }
        if(empty($con_no)){
            $empty .= " Contact Number";
        }
        if(empty($college)){
            $empty .= " College Name";
        }
        if(empty($gender)){
            $empty .= " Gender";
        }
        if(empty($email)){
            $empty .= " Email";
        }
        mysqli_close($conn);
        header("Location: index.php?registration=Empty+".$empty);
    }
    else{
        if (!preg_match('/^[a-zA-Z]*$/',$name)){
            mysqli_close($conn);
            header("Location: index.php?registration=Invalid+Name");
        }
        else{
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                mysqli_close($conn);
                header("Location: index.php?registration=Invalid+Email");                                      
            }
            else{
                if (!preg_match('/^[0-9]*$/',$con_no) || strlen($con_no) != 10){
                    mysqli_close($conn);
                    header("Location: index.php?registration=Invalid+Number");
                }
                else{
                    $sql = "SELECT * FROM cse.participants WHERE email = \"$email\"";
                    $result = mysqli_query($conn,$sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck > 0){
                        mysqli_close($conn);
                        header("Location: index.php?registration=Already+Registered");
                    }
                    else{
                        $sql = "INSERT INTO cse.participants (name, contact_no, email, college_name, gender) VALUES('$name','$con_no','$email','$college','$gender')";
                        if(mysqli_query($conn,$sql))
                        {
                            mysqli_close($conn);
                            header("Location:thankyou.php");
                        }
                        else{
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    }
                }
            }
        }

    }
}
else{
    mysqli_close($conn);
    header("Location:thankyou.php");
}
?>
