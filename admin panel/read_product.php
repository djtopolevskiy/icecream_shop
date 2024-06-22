<?php
include '../components/connect.php';

if(isset($_COOKIE['seller_id'])) {
    $seller_id = $_COOKIE['seller_id'];
}else{
    $seller_id = '';
    header('location:loging.php');
}

//delete product
if(isset($_POST['delete'])){
    $p_id = htmlspecialchars($_POST['product_id']);

    $delete_product = $conn->prepare("DELETE FROM `products` WHERE id = ?");
    $delete_product->execute([$p_id]);

    $success_msg[] = 'product delete successfully';
}

?>

<!DOCTYPE html>
<html lang="en">

<link>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blue Sky Summer - Show Products page</title>
<link rel="stylesheet" type="text/css" href="../css/admin_style.css">
<!--------- font awesome cdn link ---------->
<!--------- box icon cdn link ---------->
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>

<body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>
        <section class="read-post">
            <div class="heading">
                <h1>product detail</h1>
                <img src="../image/separator-img.png">
            </div>
            <div class="box-container">
                

            </div>
            
        </section>
    </div>
    <div class="empty">
        

    </div>
    



  <!-- sweetalert cdn link -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"> </script>
  
  <!-- custom js link -->
  <script src="../js/admin_script.js"></script>

  <?php include '../components/alert.php'; ?>

</body>

</html>