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
<link href="css/more-news.css" rel="stylesheet"  type="text/css">
<style>

</style>
</head>

<body onload="loadme()">

 <!--================ Back to top Button ====================-->
  <button id="back-to-top" ><i class="fas fa-angle-double-up"></i></button>

  <!--================== Preloader ==========================-->
<div id="loader">
</div>

<div class="wrapper">
 <!--================ Scroll Indicator ======================-->
<div class="progress-container">
    <div class="progress-bar" id="myBar"></div>
  </div>   

<header id="f" style="background:black;">
<div class="logo">
<ul>
<li><a href="index.php"><img src="images\imnitian.png"></a></li>
<li class="logo_txt"><a href="index.php" style="font-family: 'Dancing Script', cursive;color:white;font-weight:bold;font-size:13px;letter-spacing: 0.7px;" >I AM AN NITIAN</a></li>
</ul>
</div>
<nav class="active">
<ul>
<li><a href="index.php" class="home" >Home</a></li>
<li><a href="team.html" class="homex">Our team</a></li>
<li><a href="more-news.php" class="homex" >News</a></li>
<li><a href="index.php#about" class="homex" id="about_nav">About Us</a></li>
<li><a class="sub-menu" style="width:115px;" id="exam">Exams <i class="fas fa-caret-square-down"></i></a>
<ul>
<li style="width:115px;"><a href="#">Jee</a></li>
<li style="width:115px;"><a href="#">Gate</a></li>
<li style="width:115px;"><a href="#">Neet</a></li>
<li style="width:115px;"><a href="#">Camt</a></li>
<li style="width:115px;"><a href="#">Gre</a></li>
</ul>
</li>
<li>
<button onclick="search()" style="text-transform: uppercase;letter-spacing: 0.8px; font-weight: bold;" id="searching">Search <i class="fas fa-search"></i></button>
</li>
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

<!--======================  Login signup popups  ====================-->

<!--============== Signup Popup ==================-->
<div class="signup" id="sign">
<div class="sign-card">
 <div class="sign-img">
  <div class="links">
    <p class="p1">Quick Links</p>
    <div class="msgx" ><p id="msgx" ></p></div>
    <ul>
     <a href="#"> <li>Colleges</li></a>
     <a href="#"> <li>Exams</li></a>
     <a href="#"> <li>Cutoff</li></a>
     <a href="#"> <li>News</li></a>
     <a href="#"> <li>Events</li></a>
     <a href="#"> <li>Important Dates</li></a>
      </ul>
    <p class="p2"><a href="#">privacy policy</a></p>
  </div>
 </div>
 <div class="sign-form">
   <img class="cancel" onclick="cancel()" src="images/cut.png">
    <p class="mainh">Register Here</p>
    <div class="msgx"  id="msgk"><p id="msgy"></p></div>
   <div>
     <form method="post" autocomplete="off">
   <input  type="text"  name="name"  id="name" placeholder="Name"   onmousedown="this.style.paddingLeft='10px';this.style.transition='0.2s'" onmouseout="this.style.paddingLeft='2px';this.style.transition='0.2s'">
   <input  type="text" name="user_email" id="user_email"  placeholder="Email"  onmousedown="this.style.paddingLeft='10px';this.style.transition='0.2s'" onmouseout="this.style.paddingLeft='2px';this.style.transition='0.2s'">
   <input  type="text"  name="phone" id="phone" placeholder="Mobile Number"  onmousedown="this.style.paddingLeft='10px';this.style.transition='0.2s'" onmouseout="this.style.paddingLeft='2px';this.style.transition='0.2s'">
   <select name="clg" id="clg"  onmousedown="this.style.paddingLeft='10px';this.style.transition='0.2s'" onmouseout="this.style.paddingLeft='2px';this.style.transition='0.2s'">
      <option>Select College</option>
      <option>National Institute Of technology Srinagar</option> 
      <option>National Institute Of technology Srinagar Silchar</option>
      <option>National Institute Of technology Srinagar Trichy</option>
      <option>Motilal Nehru Institute Of Technology Allahabad</option>
      <option>Malviya Natioanl Institute Of Technology Jaipur</option>
      <option>Other</option>
      </select>
      <select name="state" id="state" autocomplete="off" onmousedown="this.style.paddingLeft='10px';this.style.transition='0.2s'" onmouseout="this.style.paddingLeft='2px';this.style.transition='0.2s'">
          <option>Select Your State</option>
          <option>Uttar Pradesh</option>
          <option>Jammu and Kashmir</option>
          <option>Rajsthan</option>
          <option>Tamilnadu</option>
          <option>Uttrakhand</option>
          <option>Bihar</option>
          </select>
          <input name="user_pass" id="user_pass" type="password" placeholder="Password" autocomplete="off" onmousedown="this.style.paddingLeft='10px';this.style.transition='0.2s'" onmouseout="this.style.paddingLeft='2px';this.style.transition='0.2s'">
          <input type="password"  id="cnf_pass" name="cnf_pass" placeholder="Confirm Password" autocomplete="off" onmousedown="this.style.paddingLeft='10px';this.style.transition='0.2s'" onmouseout="this.style.paddingLeft='2px';this.style.transition='0.2s'">
          <button name="register" id="register" type="button"   class="register">Register</button>
        </form>
         <p> <a onclick="show_log();cancel();">already a member? login</a></p>
  </div>
 </div>
</div>
</div>
<!--=============== Login Popup =================-->
<div class="login" id="log" >
<div class="log-card">
    <img class="cancel-log"  src="images/cut.png" onclick="cancel_log()">
<div>
<div class="log-msg"  ><p id="message"><p></div>
  <form  method="post" autocomplete="off">
  <input name="text" autocomplete="pnstech" id="email" type="text" placeholder="Email"  onmousedown="this.style.paddingLeft='10px';this.style.transition='0.2s'" onmouseout="this.style.paddingLeft='2px';this.style.transition='0.2s'">
  <input  name="pass" autocomplete="pnstech" id="pass" type="password" placeholder="Password"   onmousedown="this.style.paddingLeft='10px';this.style.transition='0.2s'" onmouseout="this.style.paddingLeft='2px';this.style.transition='0.2s'">
<div class="select" id="select">
  <input type="radio" name="user" id="user" value="1" checked>&nbsp <label class="lab1">User</label>
  <input type="radio" name="user" id="admin" value="2">&nbsp <label>Admin</label>
 </div>
  <button type="button"  name="login" id="login">Login</button>
</form>
  <p class="signx"><a onclick="show_signup();cancel_log();">new member? register</a></p>
</div>
</div>
</div>


<div style="width:100%;height:1%;background:transparent;margin-top:4%;"></div>

<div class="explore" style="margin-top:10rem;">
<p class="main-expo" >News <span id="ns-art"><br></span>&<span id="ns-art"><br></span>Articles</p>
<div class="line_more" ></div>
 <?php 
            $query = "select * from tbl_images order by id asc";
             $result = mysqli_query ($conn, $query);
                if (mysqli_num_rows($result)>0) 
                {
                    $i=0;
                    while ($row = mysqli_fetch_assoc($result))
                     {
                       $id = $row["id"];
                      if ($i++ % 3 == 0) 
                      {
                      
                        echo "<div class='expo' >";
                      }
          
                ?>        
          
              <div class="xnnn" style="box-shadow:none;">
              <?php  echo '<a href="news.php?id='.$id.'">'; ?>
                <?php echo '<div class="zoom"><img alt="news" src="data:image/jpg;base64,'.base64_encode($row['name']).'"/></div>'?>
              <?php 
              $head = implode(' ',array_slice(explode(' ', $row['heading']),0,4)); //getting fires 5 words from heading
              $text = implode(' ',array_slice(explode(' ', $row['text']),0,15)); //getting fires 19 words from text
              echo '<p style="margin-top:2px;">'.'<span class="heading">'.$head.'</span>'." ".$text.'..</p>';
                  ?>   
                  </a>                                            
                </div>   
          
          <?php
                      if ($i % 3 == 0) echo "</div>";
              ?>
          
           <?php
                  }
                  $_SESSION['x']=$ids;
                  if ($i % 4 != 0) echo "</div>";
                 }
               else 
               {
              ?>
              <div>No results found.</div>
              <?php   
              }
             ?>
                  
    </div>
          
         

 <!--============== ad Section ==================-->
 <div class="nad">
  <img src="images/ad-book.gif"  class="nad-img">
  </div>

  </div>

 <!--============== Footer Section ==================-->
  <footer>
    <div class="datay">
              
      <div><p class="y">Colleges</p>
        <div class="linex" id="lx"></div>
      <p><a href="#">IIT</a></p>
      <p><a href="#">NIT</a></p>
      <p><a href="#">IIIT</a></p>
      <p><a href="#">AIIMS</a></p>
      </div>
      <div>
          <p class="y">Exams</p>
          <div class="linex" id="ly"></div>
            <p><a href="#">Jee Advance</a></p>
            <p><a href="#">Jee Mains</a></p>
            <p><a href="#">Gate</a></p>
            <p><a href="#">Neet</a></p>  
          </div>


      <div><p class="y">Cutoff</p>
        <div class="linex" id="lz"></div>
        <p><a href="#">IITs </a></p>
        <p><a href="#">NITs</a></p>
        <p><a href="#">IIITs</a></p>
        <p><a href="#">AIIMS</a></p></div>

      <div><p class="y">Links</p>
        <div class="linex" id="la"></div>
        <p><a href="#">College Reviews</a></p>
        <p><a href="#">College Ranking</a></p>
        <p><a href="#">About Us</a></p>
        <p><a href="#">News</a></p></div>
        
    </div>


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
2019 &nbsp| &nbsp I AM AN NITIAN <span id="developer">&nbsp | &nbsp DESIGNED AND DEVELOPED BY SHUBHAM MAURYA &nbsp|&nbsp NIT SRINAGAR</span></p>
<p id="and_copy" class="copyright">Developed by Shubham Maurya</p>
</div>
</footer>
</div> 
</body>
</html>
<!--===============  Microsoft's JQuery CDN =================-->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.js" type="text/javascript"></script>
<!--==================  TweenMax CDN  ==================-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
<!--==================  SweetAlert2 CDN  ==================-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8" type="text/javascript"></script>
<!--==================  Local Js Files  ==================-->
<script   type="text/javascript" src="js/ajax-register.js"></script>
<script   type="text/javascript" src="js/ajax-login.js"></script>
<script   type="text/javascript" src="js/main.js"></script>

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

