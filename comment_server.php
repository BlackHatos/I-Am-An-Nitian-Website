<?php
include_once('connection.php');
session_start();

if(isset($_SESSION['user_id']) && !empty(($_SESSION['user_id'])))
{
      $user_id = $_SESSION['user_id'];
      $post_id = $_POST['post_id'];
      $comment = $_POST['comment'];
      $user_name = $_SESSION['user_name'];
    
     $query = "insert into comment (user_id, post_id, comment, user_name) values('$user_id', '$post_id', '$comment', '$user_name')";
      $result = mysqli_query($conn, $query);
if($result)
{
    echo  'successfully inserted';
}    

}
else
{
    echo 2; //if user is not logged in
}
?>