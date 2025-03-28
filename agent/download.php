<?php
include 'connection.php';
session_start();
$branch=$_SESSION['b'];
$sdate=$_SESSION['sd'];
$rdate=$_SESSION['rd'];

function filterData(&$str){
    $str= preg_replace("/\t/","\\t",$str);
    $str= preg_replace("/\r?\n/","\\n",$str);
    if(strstr($str,'"'))$str='"'. str_replace('"','""',$str) . '"';
}

$filename="BranchReport".date('y-m-d') . ".xls";

$field=array('Sender_Name','Reciever_Name','Sender_Address','Reciever_Address','Parcel_Name','Weight','Price','Sender_Contact'
,'Branch','Status','Date');

$excelData = implode("\t",array_values($field))."\n";

$query1="SELECT * FROM `courier_details` WHERE `date`>='$sdate' && `date`<='$rdate' && `branch`='$branch'";
$query=mysqli_query($connect,$query1);

if($query->num_rows>0)
{
    while($row=$query->fetch_assoc()){
        $lineData=array($row['sender_name'],$row['reciever_name'],$row['sender_address'],$row['reciever_address'],
        $row['parcel'],$row['weight'],$row['amount'],$row['sender_contact'],$row['branch'],$row['status'],$row['date']);
        array_walk($lineData,'filterData');
        $excelData .=  implode("\t",array_values($lineData))."\n";
    }
}
else
{
    $excelData .=  'no record found...'."\n";
}


header("Content-type: application/vnd.ms.excel");
header("Content-Disposition: attachment;filename=\"$filename\"");

echo $excelData;

exit;

?>