<html>
<body>
    <center>
    <?php
        if(isset($_GET['registration']))
        {
            $message = $_GET['registration'];
            echo $message;
        }
    ?>
    <form action="registration.php" method="post">
    <input type="text" name="name" placeholder="Name"><br>
    <input type="text" name="email" placeholder="Email"><br>
    <input type="text" name="contact" placeholder="Contact Number"><br>
    <input type="text" name="col_name" placeholder="College Name"><br>
    <input type="radio" name="gender" value='male'>Male<br>
    <input type="radio" name="gender" value='female'>Female<br>
    <button type="submit" name="submit">Submit</button>
    </form>
    </center>
</body>
</html>
