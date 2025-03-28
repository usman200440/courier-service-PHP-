<?php
include 'connection.php';
$id=$_GET["id"];
if(isset($_POST['submit']))
{
    $status=$_POST['status'];
    $query="UPDATE `courier_details` SET `status`='$status' where `id`='$id'";
    mysqli_query($connect,$query);
    header("location:status.php");

    if($status=='Wrong Info')
    {
        $query2="DELETE FROM `courier_details` WHERE `id`='$id'";
        mysqli_query($connect,$query2);
    }
}
?>