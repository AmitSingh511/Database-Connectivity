<?php
$servername="localhost";
$password="";
$username="root";
$db_name="user_data";
$conn=mysqli_connect($servername,$username,$password,$db_name);
if(!$conn)
{
    die("sorry failed to connect".mysqli_connect_error());
}
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $r_no=$_POST["r"];
    $f_name=$_POST["f"];
    $l_name=$_POST["l"];
    $class=$_POST["c"];

    $stmt=$conn->prepare("INSERT INTO user_info(r_no,f_name,l_name,class)VALUES(?,?,?,?)");
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
}
?>