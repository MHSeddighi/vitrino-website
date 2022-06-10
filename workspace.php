<?php 
  session_start();
  if(!isset($_COOKIE['savelogin']))
  {
    if(!isset($_SESSION['user_id'])){
      header('location:login_page.php');
      exit;
    }
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
    <title>برنامه ریزی</title>
    <script>
      function printDiv(divID) {
          window.print();
      }
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
        direction : rtl;
        background: #fafafa;
        margin : 0px;
      }

      ::placeholder
      {
        text-align: center;
      }

      input[type='text']
      {
        text-align: center;
      }
      
      .button
      {
          background: #007bec !important;
          color: white;
          font-weight: normal;
          font-size: 11pt;
          border-radius: 5px;
          border: none;
          transition: background 0.3s;
          padding: 0px 10px 0px 10px;
      }
      .button:hover
      {
          cursor: pointer;
          background: #0066c4 !important;
      }

      td
      {
        padding: 5px !important;
        padding-top: 12px !important;
      }

      @media print
      {    
          .no-print
          {
              display: none !important;
          }
      }

      .checkbox
      {
        display: none;
      }

      label:before
      {
        content: "\002718";
        color: white;
        padding: 2px 5px;
        border-radius: 5px;
        background: red;
        -webkit-transition: all 0.2s ease-in-out;
                transition: all 0.2s ease-in-out;
      }

      .checkbox:checked + label:before
      {
         content: "\002714";
         background: green;
      }
    </style>
  </head>
  <body>
    <?php
      $connection = mysqli_connect('localhost', 'root', '', 'vitrino');
    
      if(isset($_POST['vitrin_name']) && !isset($_POST['id']))
      {
        $insert_query = "INSERT INTO programs (user_id, name, saturday, sunday, monday, teusday, wednesday, thursday, friday) VALUE ('".$_SESSION['user_id']."','".$_POST['vitrin_name']."','".@$_POST['saturday']."','".@$_POST['sunday']."','".@$_POST['monday']."','".@$_POST['teusday']."','".@$_POST['wednesday']."','".@$_POST['thursday']."','".@$_POST['friday']."')";
        $checkboxes_unsave_query = "INSERT INTO checkboxes (saturday,sunday,monday,teusday,wednesday,thursday,friday) VALUES ('0','0','0','0','0','0','0')";
        mysqli_query($connection,$insert_query);
        mysqli_query($connection,$checkboxes_unsave_query);
        header('location:workspace.php');
      } else if (isset($_POST['vitrin_name']) && isset($_POST['id'])) {
        $update_query = "update programs set name = '".$_POST['vitrin_name']."' , saturday = '".@$_POST['saturday']."' , sunday = '".@$_POST['sunday']."' , monday = '".@$_POST['monday']."' , teusday = '".@$_POST['teusday']."' , wednesday = '".@$_POST['wednesday']."' , thursday = '".@$_POST['thursday']."' , friday = '".@$_POST['friday']."' where id = '".@$_POST['id']."'";
        mysqli_query($connection,$update_query);
        header('location:workspace.php');
      }
      
      if(isset($_POST['submit']))
      {
        if (isset($_POST['saturday']) || isset($_POST['sunday']) || isset($_POST['monday']) || isset($_POST['teusday']) || isset($_POST['wednesday']) || isset($_POST['thursday']) || isset($_POST['friday']))
        {
          $checkboxes_save_query = "update checkboxes set saturday = '".@$_POST['saturday']."' , sunday = '".@$_POST['sunday']."' , monday = '".@$_POST['monday']."' , teusday = '".@$_POST['teusday']."' , wednesday = '".@$_POST['wednesday']."' , thursday = '".@$_POST['thursday']."' , friday = '".@$_POST['friday']."' where id = '".@$_POST['id']."'";
          mysqli_query($connection,$checkboxes_save_query);
          header('location:workspace.php');
        } else
        {
          $checkboxes_uncheck_query = "update checkboxes set saturday = '0' , sunday = '0' , monday = '0' , teusday = '0' , wednesday = '0' , thursday = '0' , friday = '0' where id = '".@$_POST['id']."'";
          mysqli_query($connection,$checkboxes_uncheck_query);
          header('location:workspace.php');
        }
      }
    
      if(isset($_GET['delete']))
      {
        $delete_query = "delete from programs where id='".$_GET['delete']."'";
        $delete_checkboxes_query = "delete from checkboxes where id='".$_GET['delete']."'";
        mysqli_query($connection,$delete_query);
        mysqli_query($connection,$delete_checkboxes_query);
        header('location:workspace.php');
      }
    
      $row_edit = null;
      if(isset($_GET['edit']))
      {
        $query_edit_get = "SELECT * from programs where id='".$_GET['edit']."'";
        $row_edit = mysqli_fetch_assoc(mysqli_query($connection,$query_edit_get));
      }
    ?>
    <nav class="navbar navbar-expand-sm w-100" style="background:#0D1E30;text-align:center;">
      <a class="navbar-brand" style="color:#fff;" href="index.html"><img src="icons/Capture-removebg-preview.png" style="margin-right:0px;padding-right:0;"/></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="FDMainMenu" aria-expanded="false" aria-label="نمایش فهرست">
        <span class="navbar-toggler-icon"><i class="fas fa-list-alt text-light" style="font-size:23pt;"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="index.html">صفحه ی اصلی</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="about.html">درباره ی ما</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="notes.php">يادداشت ها</a>
          </li>
        </ul>
      </div>
    </nav><br />
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 no-print">
          <?php if (isset($_GET['edit'])): ?>
          <br /><div class="card bg-dark text-center">
            <div class="card-header text-light" style="font-size:13pt;font-weight:bold;color:white;background-color: #0D1E30;">ویرایش ویترین</div>
            <div class="card-body">
                <form method="post" name="edit_vitrin-form">
                  <input type="hidden" name="id" value="<?php echo @$row_edit['id']; ?>" />
                  <div class="form-group">
                    <input type="text" name="vitrin_name" required placeholder="نام ویترین" class="form-control" value="<?php echo $row_edit['name']; ?>">
                  </div>
                  <div style="background:#0D1E30;padding:10px;margin-bottom:10px;border-radius:5px;">
                    <legend style="color:white;font-size:12pt;">انتخاب روز ها</legend>
                    <span style="color:white;margin:10px;">شنبه</span><input type="checkbox" value="1" <?php if($row_edit['saturday']==1) echo "checked";?> name="saturday"/>
                    <span style="color:white;margin:10px;">1.شنبه</span><input type="checkbox" value="1" <?php if($row_edit['sunday']==1) echo "checked";?> name="sunday"/>
                    <span style="color:white;margin:10px;">2.شنبه</span><input type="checkbox" value="1" <?php if($row_edit['monday']==1) echo "checked";?> name="monday"/>
                    <span style="color:white;margin:10px;">3.شنبه</span><input type="checkbox" value="1" <?php if($row_edit['teusday']==1) echo "checked";?> name="teusday"/>
                    <span style="color:white;margin:10px;">4.شنبه</span><input type="checkbox" value="1" <?php if($row_edit['wednesday']==1) echo "checked";?>  name="wednesday"/>
                    <span style="color:white;margin:10px;">5.شنبه</span><input type="checkbox" value="1" <?php if($row_edit['thursday']==1) echo "checked";?> name="thursday"/>
                    <span style="color:white;margin:10px;">جمعه</span><input type="checkbox" value="1" <?php if($row_edit['friday']==1) echo "checked";?> name="friday"/>
                  </div>
                  <button type="submit" class="w-100 button" style="height:45px;">ویرایش</button>
                </form>
              </div>
            </div>
            <?php else: ?>
              <br /><div class="card bg-dark text-center w-100">
                <div class="card-header text-light" style="font-size:13pt;font-weight:bold;color:white;background-color: #0D1E30;">ایجاد ویترین</div>
                <div class="card-body">
                  <form method="post" name="create_vitrin-form" class="needs-validation" novalidate>
                    <div class="form-group">
                      <input type="text" name="vitrin_name" required placeholder="نام ویترین" class="form-control">
                    </div>
                    <div style="background:#0D1E30;padding:10px;margin-bottom:10px;border-radius:5px;">
                      <legend style="color:white;font-size:12pt;">انتخاب روز ها</legend>
                      <span style="color:white;margin:10px;">شنبه</span><input type="checkbox" value="1" name="saturday"/>
                      <span style="color:white;margin:10px;">1.شنبه</span><input type="checkbox" value="1" name="sunday"/>
                      <span style="color:white;margin:10px;">2.شنبه</span><input type="checkbox" value="1" name="monday"/>
                      <span style="color:white;margin:10px;">3.شنبه</span><input type="checkbox" value="1" name="teusday"/>
                      <span style="color:white;margin:10px;">4.شنبه</span><input type="checkbox" value="1" name="wednesday"/>
                      <span style="color:white;margin:10px;">5.شنبه</span><input type="checkbox" value="1" name="thursday"/>
                      <span style="color:white;margin:10px;">جمعه</span><input type="checkbox" value="1" name="friday"/>
                    </div>
                    <button type="submit" class="w-100 button" style="height:45px;" name="create">ایجاد</button>
                  </form>
                </div>
              </div>
            <?php endif; ?>
            </div>
            <div class="col-lg-8 mt-4">
              <img src="icons/print.png" class="no-print" style="width:3em;height:3.5em;cursor:pointer;float:right;" onclick="printDiv('printablediv')">
              <br /><h4 class="text-center">لیست برنامه ها</h4><br />
              <div class="table-responsive mt-2" id="printablediv">
                <table class="table table-bordered text-center table-hover">
                  <tr>
                    <th>نام</th>
                    <th>شنبه</th>
                    <th>1.شنبه</th>
                    <th>2.شنبه</th>
                    <th>3.شنبه</th>
                    <th>4.شنبه</th>
                    <th>5.شنبه</th>
                    <th>جمعه</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                    <th>ثبت</th>
                  </tr>
                  <?php
                    $programs_select = "SELECT * FROM programs where user_id='".$_SESSION['user_id']."'";
                    $result_programs = mysqli_query($connection, $programs_select);
                    $checkboxes_select = "SELECT * FROM checkboxes";
                    $result_checkboxes = mysqli_query($connection, $checkboxes_select);
                    if (mysqli_num_rows($result_programs) > 0):
                      while ($row_programs = mysqli_fetch_assoc($result_programs)):
                        $row_checkboxes = mysqli_fetch_assoc($result_checkboxes);
                      ?>
                      <tr>
                        <form method="post">
                          <input type="hidden" name="id" value="<?php echo @$row_programs['id']; ?>" />
                          <td><?php echo $row_programs['name']; ?></td>
                          <td>
                            <?php if($row_programs['saturday'] == 1 ):?>
                            <input type="checkbox" class="checkbox" id="saturday" name="saturday" value="1" <?php if($row_checkboxes['saturday']==1) echo " checked ";?> style="margin-top:6px;" />
                            <label for="saturday"></label>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if($row_programs['sunday'] == 1 ):?>
                            <input type="checkbox" class="checkbox" id="sunday" name="sunday" value="1" <?php if($row_checkboxes['sunday']==1) echo " checked ";?> style="margin-top:6px;" />
                            <label for="sunday"></label>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if($row_programs['monday'] == 1 ):?>
                            <input type="checkbox" class="checkbox" id="monday" name="monday" value="1" <?php if($row_checkboxes['monday']==1) echo " checked ";?> style="margin-top:6px;" />
                            <label for="monday"></label>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if($row_programs['teusday'] == 1 ):?>
                            <input type="checkbox" class="checkbox" id="teusday" name="teusday" value="1" <?php if($row_checkboxes['teusday']==1) echo " checked ";?> style="margin-top:6px;" />
                            <label for="teusday"></label>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if($row_programs['wednesday'] == 1 ):?>
                            <input type="checkbox" class="checkbox" id="wednesday" name="wednesday" value="1" <?php if($row_checkboxes['wednesday']==1) echo " checked ";?> style="margin-top:6px;" />
                            <label for="wednesday"></label>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if($row_programs['thursday'] == 1 ):?>
                            <input type="checkbox" class="checkbox" id="thursday" name="thursday" value="1" <?php if($row_checkboxes['thursday']==1) echo " checked ";?> style="margin-top:6px;" />
                            <label for="thursday"></label>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if($row_programs['friday'] == 1 ):?>
                            <input type="checkbox" class="checkbox" id="friday" name="friday" value="1" <?php if($row_checkboxes['friday']==1) echo " checked ";?> style="margin-top:6px;" />
                            <label for="friday"></label>
                            <?php endif; ?>
                          </td>
                          <td>
                            <a href="?edit=<?=$row_programs['id']?>"><i class="fas fa-pen mt-1"></i></a>
                          </td>
                          <td>
                            <a href="?delete=<?=$row_programs['id']?>"><i class="fa fa-trash mt-1 text-danger"></i></a>
                          </td>
                          <td>
                            <input type="submit" value="ثبت" class="text-center button" name="submit" />
                          </td>
                        </form>
                      </tr>
                     <?php endwhile;
                    endif;
                  ?>
                </table>
              </div>
            </div>
        </div>
    </div>
  </body>
</html>
