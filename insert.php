<?php
include_once('connection.php');

if(isset($_POST['submit']))
{
    $file= addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    $head = $_POST['heading'];
    $news = $_POST['news'];
    $query="insert into tbl_images (name,heading, text) values('$file', '$head', '$news')";
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
<link href="css/insert.css" type="text/css" rel="stylesheet">
<link href="css/edit.css" type="text/css" rel="stylesheet">
<style>

</style>
</head>
<body>

<div class="main" >
<p class="mainh" id="mainh" style="display:none;">Add News</p>
<!--=================  Menu Button   ===================-->
<button id="show"><i class="fas fa-bars"></i></button>

<!--=================  Adding News  ===================-->
<div class="add-news" id="add-news">
<form method="post" enctype="multipart/form-data" autocomplete="off">

<input type="file" name="image" id="image"> 

<input type="heading" name="heading" id="heading" placeholder="Heading">

<textarea placeholder="Enter News Here..." name="news" id="news" rows="12" ></textarea>

<input type="submit" name="submit" id="submit" value="Insert" > 

</form>
</div>
</div>

<!--================= Edit News   ===================-->
<div class="mainx">
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
$query = "select * from tbl_images";
$result=mysqli_query($conn, $query);
while($row=mysqli_fetch_array($result))
{
  ?>
  <tr>
    <td style="font-weight:bold;"><?php echo $row['id']  ?></td>
    <td><?php echo '<img class="imgx" alt="news" src="data:image/jpg;base64,'.base64_encode($row['name']).'"/>' ?></td>
    <td class="thead"><?php  echo $row['heading']  ?></td>
    <td><?php echo $row['text'] ?></td>
    <td> <a href="edit.php?edit=<?php echo  $row['id']; ?>">Edit</a> </td>
    <td><?php echo '<button>Delete</button>' ?></td>
  </tr>
  <?php  
}
?>

</table>
</div>
</div>




<!--=================  Left Side MAnu Bar   ===================-->
<div class="left-menu" class="popup" id="demo">
    <img src="images/cutk.png" id="cut">
    <p>Admin Panel</p>
    <button id="add" type="button" onclick="func()">add news</button>
    <button id="delete" type="button" onclick="fund()">delete news</button>
    <button id="edit" type="button">edit news</button>
    <button id="statics" type="button">statics</button>
</div>

</body>

</html>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>


<script>
$(document).ready(function(){
    $('#submit').click(function(){
        var image_name = $('#image').val();
        var head = $('#heading').val();
        var text = $('#news').val();
        if(image_name== '') 
        {
            alert('Please choose a file');
            return false;
        } 
        else if( head == '' || text == '')
        {
            alert('Please fill all the fields');
            return false;
        }
        else
        {
            var extension = $('#image').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['png', 'gif','jpg','tif','jpeg','mp4'])== -1)
            {
                alert("invalid image format");
                $('#image').val('');
                return false;
            }
            
        }
    })
})
</script>



<!--Hiding and Showing Side Menu bar-->
<script>
    $(document).ready(function(){
    $('#cut').on('click', function(){
        TweenMax.to('#demo',0.5,{scaleX: 0});
    });


    $('#show').on('click', function(){
        TweenMax.to('#demo',0.5,{scaleX:1});
    });
});

</script>

<script>
function func()
{
    document.getElementById('mainh').style.display='block';
    document.getElementById('add-news').style.display='block';
}
function fund()
{
    document.getElementById('mainh').style.display='none';
    document.getElementById('add-news').style.display='none';
}
</script>