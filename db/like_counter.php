<?php
include_once('connection.php');
$id = $_POST['id'];
$query= "select * from tbl_images where id='".$id."' ";
$result = mysqli_query($conn, $query);
if($row= mysqli_fetch_assoc($result))
{
    echo $row['likes'];
}
else
{
    echo 0;
}
?>