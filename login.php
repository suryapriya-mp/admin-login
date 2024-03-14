<?php

$host="localhost";
$user="root";
$password="";
$db="user";
session_start();

$data=mysqli_connect($host,$user,$password,$db);
if($data===false){
    die("connection error");

}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username=$_POST["username"];
    $password=$_POST["password"];

    $sql="select * from login where username='".$username."' AND password='".$password."' ";
    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);
    if($row["usertype"]=="user")
    {
        $_SESSION["username"]=$username;
        header("location:userhome.php");
    }
    elseif($row["usertype"]=="admin")
    {
        $_SESSION["username"]=$username;
        header("location:adminhome.php");
    }
    else
    {
        echo "username or password incorrect";
    }
}


?>



<html>
    <head>
        <title></title>
    </head>
    <body>
        <center>
            <br><br>
            <form action="#" method="POST">
            <div>
                <label>username</label>
                <input type="text" name="username" required>
            </div>
            <br>
            <div>
                <label>password</label>
                <input type="password" name="password" required>
            </div>
            <br>
            <div>
                <input type="submit" value="Login">
            </div>
            </form>
        </center>
    </body>
</html>
