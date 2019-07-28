<!--
@ This file consists of code for adding news and links to edit news
-->

<?php

session_start(); //preventing direct access of this page
if(!isset($_SESSION['user_type']) || empty($_SESSION['user_type']) || $_SESSION['user_type']!=1)
{
  exit('<div style="top:50%;left:50%;font-size:30px; color:rgba(80,80,80,1);
  font-weight:bold;text-transform:uppercase;text-align:center;
  transform:translate(-50%,-50%);position:absolute;">Access denied <br/>page 404<br/> not found<div>');
}


include_once('connection.php');
if(isset($_POST['submit']))
{
    $file= addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $head = addslashes($_POST['heading']);
    $news = addslashes($_POST['news']);
    $views=0;
    $likes=0;
    $comments=0;
    $dislikes=0;
    $query="insert into tbl_images (name,heading, text,views,likes,dislikes,comments) 
    values('$file', '$head', '$news','$views','$likes','$dislikes','$comments')";
    if(mysqli_query($conn, $query))  
    {
        echo  "<script>alert('Inserted successfully')</script>";
    }
    else
    {
        echo  "<script>alert('Insertion Failed')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>I Am An Nitian | Admin Panel</title>
<link rel="icon" href="images/imnitian.png">
<meta name="viewport"  content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<meta name="theme-color" content="#000">
<meta name="author" content="Shubham Maurya">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link href="css/edit_news.css" type="text/css" rel="stylesheet">
<link href="css/left-menu.css" type="text/css" rel="stylesheet">
<link href="css/back-to-top.css" type="text/css" rel="stylesheet">
<style>

</style>
</head>

<body onload="loadme()">

 <!--================ Back to top Button ====================-->
  <button id="back-to-top" ><i class="fas fa-angle-double-up"></i></button>

  <!--================== Preloader ==========================-->
<div id="loader">
</div>

<!--=================  Menu Button   ===================-->
<button id="show"><i class="fas fa-bars"></i></button>
<!--================= Edit News   ===================-->
<div class="mainx"  id="mainx">
    <p class="mainh">Edit News</p>
 <div class="edit-news">
<table>
<tr>
 <th>Id</th>
<th>Image</th>
<th>Heading</th>
<th>News</th>
<th>Edit</th>
<th>Delete</th>
</tr>

<?php
$query = "select * from tbl_images order by id desc";
$result=mysqli_query($conn, $query);
while($row=mysqli_fetch_array($result))
{
  ?>
  <tr>
    <td style="font-weight:bold;"><?php echo $row['id']  ?></td>
    <td><?php echo '<img class="imgx" alt="news" src="data:image/jpg;base64,'.base64_encode($row['name']).'"/>' ?></td>
    <td class="thead"><?php  echo $row['heading']  ?></td>
    <td><?php echo $row['text'] ?></td>
    <td> <a href="update_news.php?update=<?php echo  $row['id']; ?>">Edit</a> </td>

    <td> <button name="delete" onclick="location.href='delete_news.php?del=<?php echo $row['id']; ?>'">Delete</button>
  </tr>
  <?php 
}
?>

</table>
</div>
</div>

<!--=================  Left Side MAnu Bar   ===================-->
<div class="left-menu" class="popup" id="demo">
<p><?php echo "Hello! ".$_SESSION['user_name'];  ?></p>
    <div>
    <button id="add" type="button" >add news</button>
    <button id="statics" type="button">statics</button>
    <button id="home" type="button">Home</button>
</div>
</div>


</body>

</html>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
<script src="js/main.js"></script>

<script>
$(document).ready(function(){

  //home button
    $("#home").click(function(){
    TweenMax.to('#demo',0.5,{scaleX: 0}); 
    setTimeout(function() {
        window.location.href="index.php";
    },500);  
  })


//add news button
  $("#add").click(function(){
    TweenMax.to('#demo',0.5,{scaleX: 0});   
    setTimeout(function() {
        window.location.href="insert_news.php";
    },500); 
  })


//static button
$("#statics").click(function(){
    TweenMax.to('#demo',0.5,{scaleX: 0});   
    setTimeout(function() {
        window.location.href="statics.php";
    },500); 
  })


$("#demo").on('click',function(){
    TweenMax.to('#demo',0.5,{scaleX: 0}); 
})

    $('#show').on('click', function(){
        TweenMax.to('#demo',0.5,{scaleX:1});
    });

})
</script>



