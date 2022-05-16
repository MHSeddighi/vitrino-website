<?php 
  session_start();
  if(!isset($_SESSION['user_id'])){
    header('location:login_page.php');
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>بازی جمع و تفریق</title>
        <style>
            body
            {
                margin:0;
                overflow:hidden
            }
            iframe
            {
                border:none;
                width:100vw;
                height:100vh;
            }
        </style>
    </head>
    <body>
        <iframe src="https://scratch.mit.edu/projects/660953493/embed" allowtransparency="true"emmetemmet scrolling="no" allowfullscreen></iframe>
    </body>
</html>