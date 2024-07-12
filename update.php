<?php  
    include 'components/connect.php';

    if(isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE['user_id'];
    }else{
        $user_id = '';
    }
    
    if(isset($_POST['submit'])){
        $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
        $select_user->execute([$user_id]);
        $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);
    
        $prev_pass = $fetch_user['password'];
        $prev_image = $fetch_user['image'];
    
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
    
        //update name
        if(!empty($name)){
            $update_name = $conn->prepare("UPDATE `users` SET name = ? WHERE id = ?");
            $update_name->execute([$name, $user_id]);
            $success_msg[] = 'username updated successfully';
        }
    
        //update email
        if(!empty($email)){
            $select_email = $conn->prepare("SELECT * FROM `users` WHERE id = ? AND email = ?");
            $select_email->execute([$user_id, $email]);
    
            if($select_email->rowCount() > 0) {
                $warning_msg[] = 'email alredy exist';
            }else{
                $update_email = $conn->prepare("UPDATE `users` SET email = ? WHERE id = ?");
                $update_email->execute([$email, $user_id]);
                $success_msg[] = 'email updated successfully';
            }
        }
    
        //update image
        $image = htmlspecialchars($_FILES['image']['name']);
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $rename = unique_id().'.'.$ext;
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'uploaded_files/'.$rename;
    
        if(!empty($image)){
            if($image_size > 2000000){
                $warning_msg[] = 'image size is too large';
            }else{
                $update_image = $conn->prepare("UPDATE `users` SET `image` = ? WHERE id = ?");
                $update_image->execute([$rename, $user_id]);
                move_uploaded_file($image_tmp_name, $image_folder);
    
                if($prev_image !='' AND $prev_image != $rename){
                    unlink('uploaded_files/'.$prev_image);
                }
                $success_msg[] = 'image updated successfully';
            }
        }
    
        //update password
        $empty_pass = '00jj86kl56dsnmcxzjqert0123hhfdslayrn';
        
        $old_pass = sha1($_POST['old_pass']);
        $old_pass = htmlspecialchars($old_pass);
    
        $new_pass = sha1($_POST['new_pass']);
        $new_pass = htmlspecialchars($new_pass);
    
        $cpass = sha1($_POST['cpass']);
        $cpass = htmlspecialchars($cpass);
    
        if($old_pass != $empty_pass){
            if($old_pass != $prev_pass) {
                $warning_msg[] = 'old password not matched';
            }elseif($new_pass != $cpass){
                $warning_msg[] = 'pasword not matched';
            }else{
                if($new_pass != $empty_pass){
                    $update_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
                    $update_pass->execute([$cpass, $user_id]);
                    $success_msg[] = 'password updated successfully!';
                }else{
                    $warning_msg[] = 'please enter a new password!';
                }
            }
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Sky Summer - update profile login page</title>
    <link rel="stylesheet" type="text/css" href="css/user_style.css">
    <!------- font awesome cdn link -------->
    <!--------- box icon cdn link ---------->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>
<body>
    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>update profile</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis <br> culpa autem reprehenderit, excepturi tempore debitis in quos fugiat, fuga explicabo repellendus, nisi modi itaque?</p>
            <span><a href="home.php">home</a><i class="bx bx-right-arrow-alt"></i>update profile</span>
        </div>
    </div>
    <section class="form-container">
            <div class="heading">
                <h1>update profile details</h1>
                <img src="image/separator-img.png">
            </div>
            <form action="" method="post" enctype="multipart/form-data" class="register">
                <div class="img-box">
                    <img src="uploaded_files/<?= $fetch_profile['image']; ?>">
                    <div class="flex">
                        <div class="col">
                            <div class="input-field">
                                <p>your name <span>*</span> </p>
                                <input type="text" name="name" placeholder="<?= $fetch_profile['name']; ?>" class="box">
                            </div>
                            <div class="input-field">
                                <p>your email <span>*</span> </p>
                                <input type="email" name="email" placeholder="<?= $fetch_profile['email']; ?>" class="box">
                            </div>
                            <div class="input-field">
                                <p>select pic <span>*</span> </p>
                                <input type="file" name="image" accept="image/*" class="box">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-field">
                                <p>old password <span>*</span> </p>
                                <input type="password" name="old_pass" placeholder="enter your old password" class="box">
                            </div>
                            <div class="input-field">
                                <p>new password <span>*</span> </p>
                                <input type="password" name="new_pass" placeholder="enter your new password" class="box">
                            </div>
                            <div class="input-field">
                                <p>confirm password <span>*</span> </p>
                                <input type="password" name="cpass" placeholder="confirm your password" class="box">
                            </div>
                        </div>
                        
                    </div>
                </div>
                <input type="submit" name="submit" value="update profile" class="btn">

            </form>
            
            
        </section>

  <?php include 'components/footer.php'; ?>
  <!-- sweetalert cdn link -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"> </script>
  
  <!-- custom js link -->
  <script src="js/user_script.js"></script>

  <?php include 'components/alert.php'; ?>
</body>
</html>