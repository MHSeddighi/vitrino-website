<?php 
  session_start();
  if(!isset($_SESSION['user_id'])){
    header('location:login_page.php');
    exit;
  }
?>
<!DOCTYPE html>
<html lang="fa">
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="all.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بازی</title>
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

      body
      {
        font-family: 'myFont';
        font-size: 11pt !important;
        direction: rtl;
        background: #fafafa;
      }

      .box
      {
        text-align: center;
        cursor: pointer;
        padding: 10px;
        width: 200px;
        margin: auto;
        border-radius: 5px;
        border: 1px solid #fafafa;
      }

      .box:hover
      {
        background-color: #ededed !important;
        border: 1px solid #CCCCCC;
        transition: all 0.2s;
      }

      a
      {
        text-decoration: none;
        color: black;
      }

      a:hover
      {
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <div class="row" style="position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);">
        <a href="games/game1.php" target="blank"><div class="box col-md-6">
            <img src="icons/icons8-multiply-100.png" style="width:5em;height:5em;margin-bottom:10px;"><br/>
            <b><a href="games/game1.php" target="blank">بازی آموزش ضرب</a></b>
        </div></a>
        <a href="games/game2.php" target="blank"><div class="box col-md-6">
            <img src="icons/9ff86916f8e3bbf79c43db4e9a231665.png" style="width:5em;height:5em;margin-bottom:10px;"><br/>
            <b><a href="games/game2.php" target="blank">بازی جمع و تفریق</a></b>
        </div></a>
    </div>
  </body>
</html>
