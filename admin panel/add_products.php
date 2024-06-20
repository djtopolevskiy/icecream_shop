<?php
include '../components/connect.php';

if(isset($_COOKIE['seller_id'])) {
    $seller_id = $_COOKIE['seller_id'];
}else{
    $seller_id = '';
    header('location:loging.php');
}

//add product in database
if(isset($_POST['publish'])) {

    $id = unique_id();
    $name = htmlspecialchars($_POST['name']);
    // $name = filter_var($name, FILTER_SANITIZE_STRING);

    $price = htmlspecialchars($_POST['price']);

    $description = htmlspecialchars($_POST['description']);
}

?>

<!DOCTYPE html>
<html lang="en">

<link>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blue Sky Summer - seller registeration page</title>
<link rel="stylesheet" type="text/css" href="../css/admin_style.css">
<!------- font awesome cdn link -------->
<!--------- box icon cdn link ---------->
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>

<body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>
        <section class="post-editor">
            <div class="heading">
                <h1>add product</h1>
                <img src="../image/separator-img.png">
            </div>
            <div class="form-container">
                <form action="" method="post" enctype="multipart/form-data" class="register">
                    <div class="input-field">
                        <p>product name <span>*</span> </p>
                        <input type="text" name="name" maxlength="100" placeholder="add product name" required class="box">
                    </div>
                    <div class="input-field">
                        <p>product price <span>*</span> </p>
                        <input type="number" name="price" maxlength="100" placeholder="add product price" required class="box">
                    </div>
                    <div class="input-field">
                        <p>product detail <span>*</span> </p>
                        <textarea name="description" required maxlength="1000" placeholder="add product detail" class="box"></textarea>
                    </div>
                    <div class="input-field">
                        <p>product stock <span>*</span> </p>
                        <input type="number" name="stock" maxlength="10" min="0" max="99999999" placeholder="add product stock" required class="box">
                    </div>
                    <div class="input-field">
                        <p>product image <span>*</span> </p>
                        <input type="file" name="image" accept="image/*" required class="box">
                    </div>
                    <div class="flex-btn">
                        <input type="submit" name="publish" value="add product" class="btn">
                        <input type="submit" name="draft" value="save as draft" class="btn">
                    </div>

                </form>

            </div>
            
        </section>
    </div>
    



  <!-- sweetalert cdn link -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"> </script>
  
  <!-- custom js link -->
  <script src="../js/admin_script.js"></script>

  <?php include '../components/alert.php'; ?>

</body>

</html>