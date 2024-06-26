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
<title>Blue Sky Summer - Dashboard page</title>
<link rel="stylesheet" type="text/css" href="../css/admin_style.css">
<!--------- font awesome cdn link ---------->
<!--------- box icon cdn link ---------->
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>

<body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>
        <section class="post_editor">
            <div class="heading">
                <h1>edit product</h1>
                <img src="../image/separator-img.png">
            </div>
            <div class="box-container">
                <?php  
                    $Product_id = $_GET['id'];
                    $select_product = $conn->prepare("SELECT * FROM `products` WHERE id = ?AND seller_id = ?");
                    $select_product->execute([$Product_id, $seller_id]);
                    if($select_product->rowCount() > 0) {
                        while($fetch_product = $select_product->fetch(PDO::FETCH_ASSOC)){

                        

                ?>
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="old_image" value="<?= $fetch_product['image']; ?>">
                        <input type="hidden" name="product_id" value="<?= $fetch_product['id']; ?>">
                        <div class="input-field">
                            <p>status<span>*</span></p>
                            <select name="status">
                                
                            </select>
                        </div>
                    </form>
                </div>
                <?php  
                        }
                    }else{
                        echo '
                            <div class="empty">
                                <p> no products added yet! </p>;
                            </div>
                        ';
                    }                        
                    
                ?>
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