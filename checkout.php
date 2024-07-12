<?php  
    include 'components/connect.php';

    if(isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE['user_id'];
    }else{
        $user_id = '';
        header('location:login.php');
    }

    if(isset($_POST['place_order'])){

        $name = htmlspecialchars($_POST['name']);
        $number = htmlspecialchars($_POST['number']);
        $email = htmlspecialchars($_POST['email']);
        $adress = htmlspecialchars($_POST['flat'].', '.$_POST['street'].', '.$_POST['city'].', '.$_POST['country'].', '.$_POST['pin']);
        $adress_type = htmlspecialchars($_POST['adress_type']);
        $method = $_POST['method'];

        $verify_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
        $verify_cart->execute([$user_id]);

        if(isset($_GET['get_id'])){
            $get_product = $conn->prepare("SELECT * FROM `products` WHERE ID = ? LIMIT 1");
            $get_product->execute([$_GET['get_id']]);

            if($get_product->rowCount() > 0){
                while($fetch_p = $get_product->fetch(PDO::FETCH_ASSOC)){
                    $seller_id = $fetch_p['seller_id'];

                    $insert_order = $conn->prepare("INSERT INTO `orders`(id, user_id, seller_id, name, number, email, adress, adress_type, method, product_id, price, qty) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
                    $insert_order->execute([uniqid(), $user_id, $seller_id, $name, $number, $email, $adress, $adress_type, $method, $fetch_p['id'], $fetch_p['price'], 1]);

                    header('location:order.php');
                }
            }else{
                $warning_msg[] = 'somthing went wrong';
            }
        }elseif($verify_cart->rowCount() > 0){
            while($f_cart = $verify_cart->fetch(PDO::FETCH_ASSOC)){
                $s_products = $conn->prepare("SELECT * FROM `products` WHERE id = ? LIMIT 1");
                $s_products->execute([$f_cart['product_id']]);
                $f_product = $s_products->fetch(PDO::FETCH_ASSOC);

                $seller_id = $f_product['seller_id'];

                $insert_order = $conn->prepare("INSERT INTO `orders`(id, user_id, seller_id, name, number, email, adress, adress_type, method, product_id, price, qty) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
                $insert_order->execute([uniqid(), $user_id, $seller_id, $name, $number, $email, $adress, $adress_type, $method, $f_cart['product_id'], $f_cart['price'], $f_cart['qty']]);
            }
            if($insert_order){
                $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
                $delete_cart->execute(['user_id']);
                header('location:order.php');
            }
        }else{
            $warning_msg[] = 'something went wrong';
        }

    }
    
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Sky Summer - checkout page</title>
    <link rel="stylesheet" type="text/css" href="css/user_style.css">
    <!------- font awesome cdn link -------->
    <!--------- box icon cdn link ---------->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>
<body>
    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>checkout</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis <br> culpa autem reprehenderit, excepturi tempore debitis in quos fugiat, fuga explicabo repellendus, nisi modi itaque?</p>
            <span><a href="home.php">home</a><i class="bx bx-right-arrow-alt"></i>checkout</span>
        </div>
    </div>
    <div class="checkout">
        <div class="heading">
            <h1>checkout summary</h1>
            <img src="image/separator-img.png">
        </div>
        <div class="row">
            <form action="" method="post" class="register">
                <input type="hidden" name="p_id" value="<?= $get_id; ?>">
                <h3>billing detail</h3>
                <div class="flex">
                    <div class="box">
                        <div class="input-field">
                            <p>your name <span>*</span></p>
                            <input type="text" name="name" require maxlength="50" placeholder="Enter your name" class="input">
                        </div>
                        <div class="input-field">
                            <p>your number <span>*</span></p>
                            <input type="number" name="number" require maxlength="10" placeholder="Enter your number" class="input">
                        </div>
                        <div class="input-field">
                            <p>your email <span>*</span></p>
                            <input type="email" name="email" require maxlength="10" placeholder="Enter your email" class="input">
                        </div>
                        <div class="input-field">
                            <p>payment method <span>*</span></p>
                            <select name="method" class="input">
                                <option value="cash on delivery">cash on delivery</option>
                                <option value="credit or debit cart">credit or debit cart</option>
                                <option value="net banking">net banking</option>
                                <option value="UPI or RuPay">UPI or RuPay</option>
                                <option value="paytm">paytm</option>
                            </select>
                        </div>
                        <div class="input-field">
                            <p>adress type <span>*</span></p>
                            <select name="adress_type" class="input">
                                <option value="home">Home</option>
                                <option value="ofice">Ofice</option>
                            </select>
                        </div>
                    </div>
                    <div class="box">
                        <div class="input-field">
                            <p>adress line 01 <span>*</span></p>
                            <input type="text" name="flat" require maxlength="50" placeholder="e.g flat or building name" class="input">
                        </div>
                        <div class="input-field">
                            <p>adress line 02 <span>*</span></p>
                            <input type="text" name="street" require maxlength="50" placeholder="e.g street name" class="input">
                        </div>
                        <div class="input-field">
                            <p>city name <span>*</span></p>
                            <input type="text" name="city" require maxlength="50" placeholder="e.g city name" class="input">
                        </div>
                        <div class="input-field">
                            <p>country name <span>*</span></p>
                            <input type="text" name="country" require maxlength="50" placeholder="e.g country name" class="input">
                        </div>
                        <div class="input-field">
                            <p>pincode <span>*</span></p>
                            <input type="number" name="pin" require maxlength="6" min="0" placeholder="e.g 110011" class="input">
                        </div>
                    </div>
                </div>
                <button type="submit" name="place_order" class="btn">place order</button>
            </form>

            <div class="summary">
                <h3>my bag</h3>
                <div class="box-container">
                    <?php  
                        $grand_total = 0;
                        if(isset($_GET['get_id'])){

                            $select_get = $conn->prepare("SELECT * FROM `products` WHERE ID = ?");
                            $select_get->execute([$_GET['get_id']]);

                            while($fetch_get = $select_get->fetch(PDO::FETCH_ASSOC)){
                                $sub_total = $fetch_get['price'];
                                $grand_total += $sub_total;
                    ?>
                    <div class="flex">
                        <img src="uploaded_files/<?= $fetch_get['image']; ?>" class="image">
                        <div>
                            <h3 class="name"><?= $fetch_get['name']; ?></h3>
                            <p class="price">$<?= $fetch_get['price']; ?>/-</p>
                        </div>
                    </div>

                    <?php
                            }
                        }else{
                            $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
                            $select_cart->execute([$user_id]);

                            if($select_cart->rowCount() > 0){
                                while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
                                    $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
                                    $select_products->execute([$fetch_cart['product_id']]);

                                    $fetch_products = $select_products->fetch(PDO::FETCH_ASSOC);
                                    $sub_total = ($fetch_cart['qty'] * $fetch_products['price']);
                                    $grand_total += $sub_total;
                    ?>
                    <div class="flex">
                        <img src="uploaded_files/<?= $fetch_products['image']; ?>" class="image">
                        <div>
                            <h3 class="name"><?= $fetch_products['name']; ?></h3>
                            <p class="price">$<?= $fetch_products['price']; ?> X <?= $fetch_cart['qty']; ?></p>
                        </div>
                    </div>

                    <?php
                                }
                            }else{
                                echo '<p class="empty">your cart is empty</p>';
                            }
                        }
                    
                    ?>
                </div>
                <div class="grand-total">
                    <span>total amount payable:</span>
                    <p>$<?= $grand_total; ?>/-</p>
                </div>
            </div>
        </div>
    </div>
    

  <?php include 'components/footer.php'; ?>
  <!-- sweetalert cdn link -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"> </script>
  
  <!-- custom js link -->
  <script src="js/user_script.js"></script>

  <?php include 'components/alert.php'; ?>
</body>
</html>