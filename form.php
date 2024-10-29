<html>

<head>
    <title>testform</title>
</head>

<body>
    <center>
        <h1>form</h1>
        <form action="" method="post">
            <label for="fname">First_Name</label>
            <input type="text" id="fname" name="fname"><br>
            <label for="lname">Last_Name</label>
            <input type="text" id="lname" name="lname"><br>
            <label for="class"> Class</label>
            <input type="text" id="class" name="class"><br>
            <label for="rollno"> Rollno</label>
            <input type="number" id="rollno" name="rollno"><br>
            <button type="submit">Submit</button>
        </form>
    </center>
    <?php
    $servername = "localhost";
    $password = "";
    $username = "root";
    $db_name = "user_data";
    $conn =new mysqli($servername, $username,$password,$db_name);
    if($conn->connect_error) {
        die("connection failed".$conn->connect_error);
    } else {
        echo "<h1>connection successfully established</h1>";
    }
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $f_name=$_POST["fname"];
        $l_name=$_POST["lname"];
        $class=$_POST["class"];
        $r_no=$_POST["rollno"];
        // $sql="insert into user_data(r_no,f_name,l_name,class) values('?,?,?,?')";
        $stmt=$conn->prepare("INSERT INTO user_data(r_no,f_name,l_name,class)VALUES(?,?,?,?)");
        $stmt->bind_param("isss",$r_no,$f_name,$l_name,$class);
        if($stmt->execute())
    {
        echo"new record inserted successfully";
    }
    else{
        echo"Error".$stmt->error;
    }
    $stmt->close();
    $conn->close();
    //    if(mysqli_query($conn,$sql)) 
    //    {
    //     echo "inserted successfully";
    //    }
    //    else{
    //     echo "could not inserted.".mysqli_error($conn);
    //    }
    //    mysqli_close($conn);

    }
    ?>
</body>

</html>