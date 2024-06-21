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
<title>Blue Sky Summer - Show Products page</title>
<link rel="stylesheet" type="text/css" href="../css/admin_style.css">
<!--------- font awesome cdn link ---------->
<!--------- box icon cdn link ---------->
<link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>

<body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>
        <section class="show-post">
            <div class="heading">
                <h1>your products</h1>
                <img src="../image/separator-img.png">
            </div>
            <div class="box-container">
                <?php 
                    $select_products = $conn->prepare("SELECT * FROM `products` WHERE seller_id = ?");
                    $select_products->execute([$seller_id]);
                    if($select_products->rowCount() > 0) {
                        while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
                            
                ?>
                <form action="" method="post" class="box">
                    <input type="hidden" name="product_id" value="<?= $fetch_products['id'] ?>">
                    <?php if($fetch_products['image'] != ''){ ?>
                        <img src="../uploaded_files/<?= $fetch_products['image']; ?>">
                    <?php } ?>
                </form>
                <?php
                        }
                    }else{
                        echo '
                            <p>no products added yet! <br><a href="add_products.php" class="btn" style="margin-top: 1.5rem;">add products</a> </p>;
                            
                        ';
                    }
                
                ?>

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