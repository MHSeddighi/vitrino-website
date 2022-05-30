<?php
    session_start();
    $connection = mysqli_connect('localhost', 'root', '', 'vitrino');
    
    if(isset($_POST['note']) && !isset($_POST['id'])) {
        $insert_query = "INSERT INTO notes (user_id,note_text) VALUE ('".@$_SESSION['user_id']."','".@$_POST['note']."')";
        mysqli_query($connection, $insert_query);
        header('location:notes.php');
    } else if(isset($_POST['note']) && isset($_POST['id'])) {
        $update_query = "update notes set note_text = '".@$_POST['note']."' where id = '".@$_POST['id']."'";
        mysqli_query($connection,$update_query);
        header('location:notes.php');
    }
    
    if(isset($_GET['delete']))
    {
      $delete_query = "delete from notes where id='".$_GET['delete']."'";
      mysqli_query($connection,$delete_query);
      header('location:notes.php');
    }
    
    $row_edit = null;
    if(isset($_GET['edit'])):
    
        $query_edit_get = "SELECT * from notes where id='".$_GET['edit']."'";
        $row_edit = mysqli_fetch_assoc(mysqli_query($connection,$query_edit_get));?>
        <div id="mask_edit"></div>
        <div class="modalbox_edit">
            <div class="title p-3 text-center">ویرایش یادداشت</div>
            <div class="content p-3">
                <form method="post">
                    <input type="hidden" name="id" value="<?php echo $row_edit['id']; ?>" />
                    <textarea class="form-control mb-3" name="note" required><?php echo $row_edit['note_text']; ?></textarea>
                    <button type="submit" class="button w-100" name="edit_note">ویرایش</button>
                </form>
            </div>
        </div>
        
    <?php endif;
    

    if(!isset($_SESSION['user_id'])){
		header('location:login_page.php');
		exit;
    }
?>
<!DOCTYPE html>
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
        <title>یادداشت ها</title>
        <script>
            $(document).ready(function() {
               $('#mask_edit').click(function() {
                   $('.modalbox_edit').css('display', 'none');
                   $('#mask_edit').css('display', 'none');
               });
               $('#mask_create').click(function() {
                   $('.modalbox_create').css('display', 'none');
                   $('#mask_create').css('display', 'none');
               });
               $('#showmodal').click(function() {
                   $('.modalbox_create').css('display', 'block');
                   $('#mask_create').css('display', 'block');
               });
            });
        </script>
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
            font-family : 'myFont';
            font-size: 11pt !important;
            direction: rtl;
            background: #fafafa;
          }
          
          .button
          {
              background: #007bec;
              color: white;
              font-weight: normal;
              font-size: 11pt;
              border-radius: 5px;
              border: none;
              transition: background 0.3s;
              height: 43px;
              box-shadow: 0px 0px 5px black !important;
          }
          .button:hover
          {
              cursor: pointer;
              background: #0066c4;
          }
          
          #mask_edit
          {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background: black;
            opacity: 0.6;
          }
          
          @keyframes modal_animation {
            from {
              margin-top: -100px;
            }
            to {
              margin-bottom: 0px;
            }
          }

          .modalbox_edit
          {
            background: #fff;
            opacity: 1 !important;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            margin: 0 auto;
            width: 320px;
            z-index: 999;
            border-radius: 5px;
            animation: modal_animation 0.4s;
          }
          
          #mask_create
          {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            background: black;
            opacity: 0.6;
            display: none;
          }
          
          .modalbox_create
          {
            background: #fff;
            opacity: 1 !important;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            margin: 0 auto;
            width: 320px;
            z-index: 999;
            border-radius: 5px;
            display: none;
            animation: modal_animation 0.4s;
          }
          
          .modal
          {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 320px;
          }
          
          .title
          {
            background: #dedede;
            border-bottom: 1px solid lightgray;
            border-radius: 5px 5px 0px 0px;
          }
        </style>
    </head>
    <body>
        <div style="background:lightgray;padding:10px;text-align:right;">
          <button type="button" class="button pr-3 pl-3" style="box-shadow:0px 0px 0px lightgray !important;" id="showmodal">ایجاد یادداشت</button>
        </div><br />
        <div id="mask_create"></div>
        <div class="modalbox_create">
          <div class="title p-3 text-center">ایجاد یادداشت</div>
          <div class="content p-3">
              <form method="post">
                  <textarea class="form-control mb-3" name="note" required></textarea>
                  <button type="submit" class="button w-100" name="create_note">ایجاد</button>
              </form>
          </div>
        </div>
        <?php
            $select = "SELECT * FROM notes where user_id='".$_SESSION['user_id']."'";
            $result = mysqli_query($connection, $select);
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)){
                echo '<div class="w-100" style="background:#CCE5FF;border-right:10px solid #007BEC;">';
                echo '<p class="text-right text-dark pt-2 pb-2 pr-3">';
                echo $row['note_text'];?>
                <a href="?edit=<?=$row['id']?>" style="float:left;margin-left:15px;margin-top:3px;"><i class="fas fa-pen mt-1"></i></a>
                <a href="?delete=<?=$row['id']?>" style="float:left;margin-left:15px;margin-top:3px;"><i class="fa fa-trash text-danger"></i></a>
                <?php echo '</p>';
                echo '</div>';
              }
            }
            ?>
    </body>
</html>