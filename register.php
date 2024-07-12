<?php  
    include 'components/connect.php';

    if(isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE['user_id'];
    }else{
        $user_id = '';
    }
  
    if(isset($_POST['submit'])){
      $id = unique_id();
      $name = htmlspecialchars($_POST['name']);
      
      $email = htmlspecialchars($_POST['email']);
      
      $pass = htmlspecialchars(sha1($_POST['pass']));
      
      $cpass = htmlspecialchars(sha1($_POST['cpass']));
      
      $image = htmlspecialchars($_FILES['image']['name']);
      
      $ext = pathinfo($image, PATHINFO_EXTENSION);
      $rename = unique_id().'.'.$ext;
      $image_size = $_FILES['image']['size'];
      $image_tmp_name = $_FILES['image']['tmp_name'];
      $image_folder = 'uploaded_files/'.$rename;
    
      $select_seller = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
      $select_seller -> execute([$email]);
    
      if ($select_seller->rowCount() > 0) {
        $warning_msg[] = 'email already exist!';
      }else{
        if($pass != $cpass) {
          $warning_msg[] = 'confirm password not matched';
        }else{
          $insert_seller = $conn->prepare("INSERT INTO `users`(id, name, email, password, image) VALUES(?, ?, ?, ?, ?)");
          $insert_seller->execute([$id, $name, $email, $cpass, $rename]);
          move_uploaded_file($image_tmp_name, $image_folder);
          $success_msg[] = 'new user registreted! please login now';
        }
      }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Sky Summer - user registration page</title>
    <link rel="stylesheet" type="text/css" href="css/user_style.css">
    <!------- font awesome cdn link -------->
    <!--------- box icon cdn link ---------->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>
<body>
    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>register</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis <br> culpa autem reprehenderit, excepturi tempore debitis in quos fugiat, fuga explicabo repellendus, nisi modi itaque?</p>
            <span><a href="home.php">home</a><i class="bx bx-right-arrow-alt"></i>register</span>
        </div>
    </div>
    <div class="form-container">
    <form action="" method="post" enctype="multipart/form-data" class="register">
      <h3>register now</h3>
      <div class="flex">
        <div class="col">
          <div class="input-field">
            <p>your name <span>*</span></p>
            <input type="text" name="name" placeholder="enter your name" maxlength="50" required class="box">
          </div>
          <div class="input-field">
            <p>your email <span>*</span></p>
            <input type="email" name="email" placeholder="enter your email" maxlength="50" required class="box">
          </div>
        </div>

        <div class="col">
          <div class="input-field">
            <p>your password <span>*</span></p>
            <input type="password" name="pass" placeholder="enter your password" maxlength="50" required class="box">
          </div>
          <div class="input-field">
            <p>confirm password <span>*</span></p>
            <input type="password" name="cpass" placeholder="confirm your password" maxlength="50" required class="box">
          </div>
        </div>

      </div>
      <div class="input-field">
        <p>your profile <span>*</span></p>
        <input type="file" name="image" accept="image/*" required class="box">
      </div>
      <p class="link">alredy have an account? <a href="login.php">login now</a> </p>
      <input type="submit" name="submit" value="register now" class="btn">

    </form>
  </div>

  <?php include 'components/footer.php'; ?>
  <!-- sweetalert cdn link -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"> </script>
  
  <!-- custom js link -->
  <script src="js/user_script.js"></script>

  <?php include 'components/alert.php'; ?>
</body>
</html>