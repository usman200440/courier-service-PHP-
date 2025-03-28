<?php
include 'connection.php';
$id=$_GET["id"];
$query="SELECT * FROM `sign_in_up` where `id`='$id'";
$result=mysqli_query($connect,$query);
$row=mysqli_fetch_assoc($result);


if($row['roles']==3){
    $query1="DELETE FROM `sign_in_up` WHERE id='$id'";
    mysqli_query($connect,$query1);
header("location:ViewAgent.php");
}
else
{
    $query1="DELETE FROM `sign_in_up` WHERE id='$id'";
    mysqli_query($connect,$query1);
header("location:alluser.php");
}
?>