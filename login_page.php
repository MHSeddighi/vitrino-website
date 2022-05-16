<?php
  include('PHP/config.php');
  session_start();
  if(isset($_COOKIE['savelogin']))
  {
    header("location:workspace.php");
    exit;
  }
?>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="all.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        $(document).ready(function() {
          $('.close').click(function() {
            $('.jumbotron').css('display' , 'none');
            $(".main").css("display" , "block");
          });
        });
    </script>
    <script>
      function goToURL() {
        location.href = 'register.php';
      }
    </script>
    <title>فرم ورود</title>
    <style>
      @font-face {
        font-family: 'myFont';
        src: url('Fonts/iranyekanwebboldfanum.eot');
        src: url('Fonts/iranyekanwebboldfanum.woff') format('woff');
        src: url('Fonts/iranyekanwebboldfanum.woff2') format('woff2');
        src: url('Fonts/iranyekanwebboldfanum.ttf') format('truetype');
        font-weight: normal !important;
        font-style: none !important;
      }

      body {
          background: url('images/image.jpg');
          background-size: cover;
          background-repeat: no-repeat;
          height: 100%;
          display: flex;
          align-items: center;
          justify-content: center;
          font-family: 'myFont';
      }
      
      @media (max-width:500px) {
        .main
        {
          width: 350px !important;
        }
      }
      @media (max-width:400px) {
        .main
        {
          width: 300px !important;
        }
      }
      @media (max-height:530px) {
        .main
        {
          width: 320px !important;
        }
        h3
        {
          position: relative !important;
          top: 0px !important;
          margin-top: 30px !important;
          margin-bottom: 20px !important;
        }
        .profile
        {
          position: relative !important;
          top: 15px !important;
        }
      }
      @media (max-height:470px) {
        html
        {
          background: url('images/image.jpg');
        }
        body
        {
          display: block;
          background: none;
        }
        .main
        {
          width: 90% !important;
          margin: auto !important;
          padding-right: 50px !important;
          padding-left: 50px !important;
          background: rgba(0, 0, 0, 0.9);
        }
        .profile
        {
          position: relative !important;
          top: 15px !important;
        }
      }

      .main {
          position: relative;
          background: rgba(0, 0, 0, 0.8);
          color: #fff;
          display: block;
          margin: 0px;
          padding: 10px 23px;
          border-radius: 10px;
          width: 400px;
          text-align: center;
      }
      h3 {
          text-align: center;
          font-weight: bold;
          color: #fff;
          position: relative;
          top: -30px;
          margin-bottom: -20px;
      }
      input[type="text"], input[type="password"], button {
          border: 1px solid #606060;
          display: block;
          width: 100%;
          border-radius: 3px;
          background: transparent;
          text-align: center;
          color: white;
          margin-top: 10px;
          height: 40px;
          padding: 0 10px;
          font-size: 12px;
      }
      input[type="text"], input[type="password"] {
          box-shadow: inset 0px 0px 10px rgb(150,150,150);
      }

      ::placeholder
      {
          text-align: center;
          color: white;
      }
      
      .jumbotron
      {
          font-size: 11pt;
          opacity: 1 !important;
          background: rgba(220, 53, 69, 0.8);
          z-index: 10000;
          position: relative;
          display: inline;
      }
      
      .button
      {
          background: #007bec !important;
          color: white;
          font-weight: normal;
          opacity: 1 !important;
          font-size: 11pt;
          border-radius: 5px;
          border: none;
          transition: background 0.3s;
          height: 43px;
      }
      .button:hover
      {
          cursor: pointer;
          color: white;
          background: #0066c4 !important;
      }
      
      .preloader 
      {
          position: absolute;
          width: 100%;
          height: 100%;
          top: 0;
          left: 0;
          background-image: url('icons/Spinner-5.gif');
          background-repeat: no-repeat;
          background-color: #fff;
          background-position: center;
          z-index: 999999;
      }
    </style>
  </head>
  <body>
    <div class="main">
      <img class="profile" src="icons/profile.png" style="text-align:center;border-radius:100%;position:relative;top:-48px;width:5.5em;height:5.5em;"/>
      <h3>فرم ورود</h3>
      <form method="post">
        <input type="text" pattern="[a-zA-Z0-9]+" name="username" placeholder="نام کاربری" required />
        <input pattern="[a-zA-Z0-9]+" class="mb-2" type="password" name="password" placeholder="رمز عبور" required />
        <label for="savelogin" style="font-size:12pt;margin-top:12px;">مرا به خاطر بسپار</label>
        <input id="savelogin" type="checkbox" name="savelogin" value="1"/>
        <button type="submit" class="button" name="login" name="login">ورود</button>
        <p class="text-center mt-3 register" style="font-size:11.5pt;color:#fff;">اگر حسابی ندارید <span class="text-primary register-text" style="cursor:pointer;" href="javascript:void(0)" onclick="goToURL(); return false;">ثبت نام</span> کنید</p>
      </form>
    </div>
    <?php
  
      if (isset($_POST['username']) && isset($_POST['password'])) {

          if(isset($_POST['savelogin']))
          {
            setcookie("savelogin", "1", time() + (60*60*24*365), "/");
          }
      
          $username = $_POST['username'];
          $password = $_POST['password'];
      
          $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
          $query->bindParam("username", $username, PDO::PARAM_STR);
          $query->execute();
      
          $result = $query->fetch(PDO::FETCH_ASSOC);
      
          if (!$result) {
            echo '<script>$(".main").css("display" , "none");</script>';
            echo '<div class="jumbotron p-4 align-items-center">';
            echo '<p class="text-light text-center">نام کاربری صحیح نیست</p>';
            echo '<button class="p-3 w-100 close text-center button">باشه</button>';
            echo '</div>';
          } else {
              if ($password == $result['password']) {
                  $_SESSION['user_id'] = $result['id'];
                  echo '<script>$(".main").css("display" , "none");</script>';
                  echo '<div class="preloader"></div>';
                  echo "<script>location.href = 'tools.php';</script>";
                  
              } else {
                echo '<script>$(".main").css("display" , "none");</script>';
                echo '<div class="jumbotron p-4 align-items-center">';
                echo '<p class="text-light text-center">رمز عبور صحیح نیست</p>';
                echo '<button class="p-3 w-100 close text-center button">باشه</button>';
                echo '</div>';
              }
          }
      }
    ?>
  </body>
</html>
