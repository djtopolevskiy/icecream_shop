<?php
include '../components/connect.php';

if(isset($_COOKIE['seller_id'])) {
    $seller_id = $_COOKIE['seller_id'];
}else{
    $seller_id = '';
    header('location:loging.php');
}

//update order from database
if(isset($_POST['update_order'])){

    $order_id = htmlspecialchars($_POST['order_id']);
    $update_payment = htmlspecialchars($_POST['update_payment']);

    $update_pay = $conn->prepare('UPDATE `orders` SET payment_status = ? WHERE id = ?');
    $update_pay->execute([$update_payment, $order_id]);
    $success_msg[] = 'order payment status updated';
}

//delete order
if(isset($_POST['delete_order'])){
    $delete_id = htmlspecialchars($_POST['order_id']);

    $verify_delete = $conn->prepare('SELECT * FROM `orders` WHERE id = ?');
    $verify_delete->execute([$delete_id]);

    if($verify_delete->rowCount() > 0){
        $delelte_order = $conn->prepare('DELETE FROM `orders` WHERE id = ?');
        $delelte_order->execute([$delete_id]);

        $success_msg[] = 'order deleted';
    }else{
        $warning_msg[] = 'order already deleted';
    }
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
        <section class="order-container">
            <div class="heading">
                <h1>total orders placed</h1>
                <img src="../image/separator-img.png">
            </div>
            <div class="box-container">
                <?php  
                    $select_order = $conn->prepare('SELECT * FROM `orders` WHERE seller_id = ?');
                    $select_order->execute([$seller_id]);

                    if($select_order->rowCount() > 0){
                        while($fetch_order = $select_order->fetch(PDO::FETCH_ASSOC)){
                ?>

                <div class="box">
                    <div class="status" style="color: <?php if($fetch_order['status'] == 'in progress'){echo 'limegreen';}else{echo 'red';} ?> "><?= $fetch_order['status']; ?></div>
                    <div class="details">
                        <p>user name : <span><?= $fetch_order['name']; ?></span> </p>
                        <p>user id : <span><?= $fetch_order['user_id']; ?></span> </p>
                        <p>placed on : <span><?= $fetch_order['data']; ?></span> </p>
                        <p>user email : <span><?= $fetch_order['email']; ?></span> </p>
                        <p>total price : <span><?= $fetch_order['price']; ?></span> </p>
                        <p>payment method : <span><?= $fetch_order['method']; ?></span> </p>
                        <p>user adress : <span><?= $fetch_order['adress']; ?></span> </p>
                    </div>
                    <form accept="" method="post">
                        <input type="hidden" name="order-id" value="<?= $fetch_order['id']; ?>">
                        <select name="uodate_payment" class="box" style="width: 90%S;">
                            <option disabled selected><?= $fetch_order['payment_dtatus']; ?></option>
                            <option value="panding">panding</option>
                            <option value="order deliverd">order deliverd</option>
                        </select>
                        <div class="flex-btn">
                            <input type="submit" name="update_order" value="update payment" class="btn">
                            <input type="submit" name="delete_order" value="delete order" class="btn" onclick="return confirm('delelte this order');">
                        </div>
                    </form>
                    
                </div>

                <?php

                        }
                    }else{
                        echo '
                        <div class="empty">
                            <p>no order placed</p>
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