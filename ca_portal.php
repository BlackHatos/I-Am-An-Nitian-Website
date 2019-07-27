<!--
* I AM AN NITIAN 
* v1.0
* May 17 2019
* Developer: Shubham Maurya
* National Institute Of Technology Srinagar J&K India 190006
* GitHub: https://github.com/pnstech
* LinkedIn: https://www.linkedin.com/in/cyberthreatatnit/
-->

<?php
include_once('db/connection.php');
session_start(); //starting session start
?>

<!DOCTYPE html>
<html lang="en" oncontextmenu="return false">
<head>
<title>I Am An Nitian | Home</title>
<meta name="viewport"  content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<meta name="theme-color" content="#000">
<meta name="author" content="Shubham Maurya">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" 
crossorigin="anonymous">
<link rel="icon" href="images/imnitian.png">
<link href="css/navbar.css" rel="stylesheet"  type="text/css">
<link href="css/back-to-top.css" type="text/css" rel="stylesheet">
<link href="css/footer.css" type="text/css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">
<link href="css/login_register.css" rel="stylesheet"  type="text/css">
<link href="css/ca_portal.css" rel="stylesheet"  type="text/css">
<style>

</style>
</head>

<body onload="loadme()">

 <!--================ Back to top Button ====================-->
  <button id="back-to-top" ><i class="fas fa-angle-double-up"></i></button>

  <!--================== Preloader ==========================-->
<div id="loader">
</div>

 <!--================ Scroll Indicator ======================-->
 <div class="progress-container">
    <div class="progress-bar" id="myBar"></div>
  </div> 

<div class="wrapper" >


<header id="f" style="background:black;">
<div class="logo">
<ul>
<li><a href="index.php"><img src="images\imnitian.png"></a></li>
<li class="logo_txt"><a href="index.php" style="font-family: 'Dancing Script', cursive;color:white;font-weight:bold;font-size:13px;letter-spacing: 0.7px;" >I AM AN NITIAN</a></li>
</ul>
</div>
<nav class="active">
<ul>
<li><a href="index.php" class="homex" >Home</a></li>
<li><a href="more-news.php" class="home" >News</a></li>
<li><a href="index.php#updf" class="homex" >Updates</a></li>
<li><a href="index.php#about" class="homex" id="about_nav">About Us</a></li>

<li><a class="homex" style="cursor:pointer; width:150px;text-align:center;margin-left:-1rem;" id="user">
<?php
  if(isset($_SESSION['name'])&& !empty($_SESSION['name']))
  {
    echo $_SESSION['name'];
  }
  else
  {
    echo 'User';
  }
?>
&nbsp <i class="fas fa-user-graduate"></i></a>
<ul style="margin-left:-1rem;">
<!-- Hide and Show login and php buttons -->

<?php
if( isset($_SESSION['user_type']) && !empty($_SESSION['user_type']))
{
  if($_SESSION['user_type'] == 1)
  {
    echo '<li><a href="edit_news.php" class="homex">Admin</a></li>';
  }
}
?>

<?php if( isset($_SESSION['name']) && !empty($_SESSION['name']))
{
?>
<li><a style="cursor:pointer;"  href="logout.php" >Logout</a></li>
<?php }else{ ?>
<li><a style="cursor:pointer;"  onclick="show_log()" id="login_nav">Login</a></li>
<li><a style="cursor:pointer;"  onclick="show_signup()" id="register_nav">Register</a></li>
<?php } ?>

</ul>
</li>
</ul>
</nav>
<!--================ Mobile Version Menu ====================-->
<div class="menu-toggle">
<i class="fas fa-bars"></i>
</div>
<img src="images/cutk.png" class="cut_nav" style="display:none;">

<!--================ Search Box ====================-->
<div class="search-popup" id="searchx" style="display:none;">
    <div><input type="text"  placeholder="Search"><button><i class="fas fa-search"></i></button></div>
  </div>

</header>













 </div>

 <!--============== Footer Section ==================-->
  <footer>
  <div class="datad">
  <p class="x">Feel Free To Contact Us</p>
  <p id="cont">iamannitian@gmail.com &nbsp &nbsp| &nbsp +91-9055667606 &nbsp | &nbsp  +91-9055667606</p>
 <span id="respo_contact">
 <P>iamannitian@gmail.com</p> 
 <P>+91-9055667606</p> 
 <P>+91-9055667606</p> 
   </span>
</div>
<!--============== Bottom Container =====================-->
 <div class="container">
 <p class="copyright">COPYRIGHT&nbsp<i class="far fa-copyright"></i>
2019 &nbsp| &nbsp I AM AN NITIAN <span id="developer">&nbsp | &nbspAll Rights Reserved</span></p>
<p id="and_copy" class="copyright">All rights reserved</p>
</div>
</footer>


</body>

</html>



<!--===============  Microsoft's JQuery CDN =================-->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.js" type="text/javascript"></script>
<!--==================  TweenMax CDN  ==================-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
<!--==================  SweetAlert2 CDN  ==================-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8" type="text/javascript"></script>
<script   type="text/javascript" src="js/main.js"></script>

<script>
  AOS.init({ disable: 'mobile' }); //disabling the animations in mobile version
</script>

<script>
 /*==================== Menu toggle =========================*/
 $(document).ready(function(){

  if (window.matchMedia('(max-width:721px)').matches)
{
  
  $('.cut_nav').click(function(){
    $(this).css('display','none');
    $('.menu-toggle').css('display','block');
    TweenMax.to('.active',0.5,{scaleX: 0});
    $('nav').css('z-index', '1');
    $('.logo').css('marginLeft', '0px');
    $('.logo').css('marginTop', '0px');
    $('.logo_txt').css('marginTop', '0px');
    setTimeout(function(){
    
      $('header').css('background', 'black');
    
    },200)

  })

  $(window).scroll(function(){
  $('header').css('background', 'black');
})
  


  $('.menu-toggle').click(function(){
    $(this).css('display','none');
    $('.cut_nav').css('display','block');

    $('nav').css('z-index', '4');

    $('header').css('background', 'transparent');
    $('.cut_nav').css('background','black');
    TweenMax.to('.active',0.4,{scaleX: 1});

    setTimeout(function(){
      $('.logo').css('marginLeft', '62px');
      $('.logo').css('marginTop', '18px');
      $('.logo_txt').css('marginTop', '10px');
    },200);

    setTimeout(function(){
      $('nav').css('z-index', '-1');
    },350);
   
  })

 

$('#login_nav').click(function()
{
  $('.logo').css('marginLeft', '0px');
  $('.logo').css('marginTop', '0px');
  TweenMax.to('.active',0.1,{scaleX: 0});  
  $('.cut_nav').css('display','none');
  $('.menu-toggle').css('display','block');
  $('header').css('background', 'black');
  $('.logo_txt').css('marginTop', '0px');
})

$('#register_nav').click(function(){
  $('.logo').css('marginLeft', '0px');
  $('.logo').css('marginTop', '0px');
  TweenMax.to('.active',0.1,{scaleX: 0});  
  $('.cut_nav').css('display','none');
  $('.menu-toggle').css('display','block');
  $('header').css('background', 'black');
  $('.logo_txt').css('marginTop', '0px');
})

$('#about_nav').click(function()
{
  $('.logo').css('marginLeft', '0px');
  $('.logo').css('marginTop', '0px');
  TweenMax.to('.active',0.1,{scaleX: 0});  
  $('.cut_nav').css('display','none');
  $('.menu-toggle').css('display','block');
})

}
  
})

</script>

