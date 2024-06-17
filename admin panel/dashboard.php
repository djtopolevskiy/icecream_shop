<?php
include '../components/connect.php';

if(isset($_COOKIE['seller_id'])) {
    $seller_id = $_COOKIE['seller_id'];
}else{
    $seller_id = '';
    header('location:loging.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<link>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blue Sky Summer - seller registeration page</title>
<link rel="stylesheet" type="text/css" href="../css/admin_style.css">
<!--------- font awesome cdn link ---------->
<!--------- box icon cdn link ---------->
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>

<body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>
        <section class="dashboard">
            <div class="heading">
                <h1>dashboard</h1>
                <img src="../image/separator-img.png">
            </div>
            <div class="box-container">
                <div class="box">
                    <h3>welcome !</h3>
                    <p><?= $fetch_profile['name']; ?></p>
                    <a href="update.php" class="btn">update profile</a>
                </div>
                <div class="box">
                    <?php
                        $select_massage = $conn->prepare("SELECT * FROM `message` ");
                        $select_massage->execute();
                        $number_of_msg = $select_massage->rowCount();
                    ?>
                    <h3><?= $number_of_msg; ?></h3>
                    <p>unread message</p>
                    <a href="admin_message.php" class="btn">see message</a>
                </div>
                <div class="box">
                    <?php
                        $select_products = $conn->prepare("SELECT * FROM `products` WHERE seller_id = ? ");
                        $select_products->execute([$seller_id]);
                        $number_of_products = $select_products->rowCount();
                    ?>
                    <h3><?= $number_of_products; ?></h3>
                    <p>products added</p>
                    <a href="add_product.php" class="btn">add_product</a>
                </div>
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