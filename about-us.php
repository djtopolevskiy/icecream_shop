<?php  
    include 'components/connect.php';

    if(isset($_COOKIE['user_id'])){
        $user_id = $_COOKIE['user_id'];
    }else{
        $user_id = '';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blue Sky Summer - about us page</title>
    <link rel="stylesheet" type="text/css" href="css/user_style.css">
    <!------- font awesome cdn link -------->
    <!--------- box icon cdn link ---------->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
</head>
<body>
    <?php include 'components/user_header.php'; ?>
    <div class="banner">
        <div class="detail">
            <h1>about us</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis <br> culpa autem reprehenderit, excepturi tempore debitis in quos fugiat, fuga explicabo repellendus, nisi modi itaque?</p>
            <span><a href="index.php">home</a><i class="bx bx-right-arrow-alt"></i>about us</span>
        </div>
    </div>
    <div class="chef">
        <div class="box-container">
            <div class="box">
                <div class="heading">
                    <span>Alex Doe</span>
                    <h1>Masterchef</h1>
                    <img src="image/separator-img.png">
                </div>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam nam deleniti consequuntur laudantium beatae quaerat adipisci odio cumque laborum expedita quos corporis, ex quisquam repellendus architecto ad blanditiis harum dolore.</p>
                <div class="flex-btn">
                    <a href="" class="btn">explore our menu</a>
                    <a href="menu.php" class="btn">visit our shop</a>
                </div>
            </div>
            <div class="box">
                <img src="image/ceaf.png" class="img">
            </div>
        </div>
    </div>
    <!--------- chef section end ---------->
    <!--------- story section start ---------->
    <div class="story">
        <div class="heading">
            <h1>our story</h1>
            <img src="image/separator-img.png">
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br> Cum at inventore facilis nisi, sint tempore deleniti earum corrupti minus alias <br> asperiores aliquam dolor rem laudantium a molestiae. Nam officiis, odit optio <br> sequi soluta accusantium tenetur ad enim, <br>explicabo asperiores cumque!</p>
        <a href="menu.php" class="btn">our services</a>
    </div>
    <div class="container">
        <div class="box-container">
            <div class="img-box">
                <img src="image/about.png">
            </div>
            <div class="box">
                <div class="heading">
                    <h1>Taking Ice Cream To New Heights</h1>
                    <img src="image/separator-img.png">
                </div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, nemo voluptatibus quo exercitationem, veniam praesentium quam libero ea harum est molestias minima omnis! Laudantium amet quibusdam corporis vel, aliquam nobis!</p>
                <a href="" class="btn">learn more</a>
            </div>
        </div>
    </div>
    <!--------- story section end ---------->
    <!--------- team section start ---------->
    <div class="team">
        <div class="heading">
            <span>our team</span>
            <h1>Quality & passion with out services</h1>
            <img src="image/separator-img.png">
        </div>
        <div class="box-container">
            <div class="box">
                <img src="image/team-1.jpg" class="img">
                <div class="content">
                    <img src="image/shape-19.png" alt="" class="shap">
                    <h2>Ralf Johnson</h2>
                    <p>Coffe Chef</p>
                </div>
            </div>
            <div class="box">
                <img src="image/team-2.jpg" class="img">
                <div class="content">
                    <img src="image/shape-19.png" alt="" class="shap">
                    <h2>Fiona Johnson</h2>
                    <p>Pastry Chef</p>
                </div>
            </div>
            <div class="box">
                <img src="image/team-3.jpg" class="img">
                <div class="content">
                    <img src="image/shape-19.png" alt="" class="shap">
                    <h2>Tom Knelltons</h2>
                    <p>Coffe Chef</p>
                </div>
            </div>
        </div>
    </div>
    <!--------- team section end ---------->

    <!--------- standers section start ---------->
    <div class="standers">
        <div class="detail">
            <div class="heading">
                <h1>our standerts</h1>
                <img src="image/separator-img.png">
            </div>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam, dicta!</p>
            <i class="bx bxs-heart"></i>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam, dicta!</p>
            <i class="bx bxs-heart"></i>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam, dicta!</p>
            <i class="bx bxs-heart"></i>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam, dicta!</p>
            <i class="bx bxs-heart"></i>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam, dicta!</p>
            <i class="bx bxs-heart"></i>
        </div>
    </div>
    <!--------- standers section end ---------->
    <!--------- testimonial section start ---------->
    <div class="testimonial">
        <div class="heading">
            <h1>testimonial</h1>
            <img src="image/separator-img.png">
        </div>
        <div class="testimonial-container">
            <div class="slide-row" id="slide">
                <div class="slide-col">
                    <div class="user-text">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex natus totam quas? Veritatis, necessitatibus consequatur.</p>
                        <h2>Zen</h2>
                        <p>Autor</p>
                    </div>
                    <div class="user-img">
                        <img src="image/testimonial (1).jpg">
                    </div>
                </div>
                <div class="slide-col">
                    <div class="user-text">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex natus totam quas? Veritatis, necessitatibus consequatur.</p>
                        <h2>Zen</h2>
                        <p>Autor</p>
                    </div>
                    <div class="user-img">
                        <img src="image/testimonial (2).jpg">
                    </div>
                </div>
                <div class="slide-col">
                    <div class="user-text">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex natus totam quas? Veritatis, necessitatibus consequatur.</p>
                        <h2>Zen</h2>
                        <p>Autor</p>
                    </div>
                    <div class="user-img">
                        <img src="image/testimonial (3).jpg">
                    </div>
                </div>
                <div class="slide-col">
                    <div class="user-text">
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex natus totam quas? Veritatis, necessitatibus consequatur.</p>
                        <h2>Zen</h2>
                        <p>Autor</p>
                    </div>
                    <div class="user-img">
                        <img src="image/testimonial (4).jpg">
                    </div>
                </div>
            </div>
        </div>
        <div class="indicator">
            <span class="btn1 active"></span>
            <span class="btn1"></span>
            <span class="btn1"></span>
            <span class="btn1"></span>
        </div>
    </div>
    <!--------- testimonial section end ---------->
    <!--------- mission section start ---------->
    <div class="mission">
        <div class="box-container">
            <div class="box">
                <div class="heading">
                    <h1>our mission</h1>
                    <img src="image/separator-img.png">
                </div>
                <div class="detail">
                        <div class="img-box">
                            <img src="image/mission.webp">
                        </div>
                    <div>
                        <h2>mexicon chocolate</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel eveniet modi hic perspiciatis quaerat nisi omnis perferendis obcaecati quasi? Magnam.</p>
                    </div>
                </div>
                <div class="detail">
                    <div class="img-box">
                        <img src="image/mission1.webp">
                    </div>
                    <div>
                        <h2>vanila with honey</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel eveniet modi hic perspiciatis quaerat nisi omnis perferendis obcaecati quasi? Magnam.</p>
                    </div>
                </div>
                <div class="detail">
                    <div class="img-box">
                        <img src="image/mission0.jpg">
                    </div>
                    <div>
                        <h2>pappermint chip</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel eveniet modi hic perspiciatis quaerat nisi omnis perferendis obcaecati quasi? Magnam.</p>
                    </div>
                </div>
                <div class="detail">
                    <div class="img-box">
                        <img src="image/mission2.webp">
                    </div>
                    <div>
                        <h2>raspberry sorbat</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel eveniet modi hic perspiciatis quaerat nisi omnis perferendis obcaecati quasi? Magnam.</p>
                    </div>
                </div>
            </div>
            <div class="box">
                <img src="image/form.png" alt="" class="img">
            </div>
        </div>
    </div>
    <!--------- mission section end ---------->



    <?php include 'components/footer.php'; ?>
  <!-- sweetalert cdn link -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"> </script>
  
  <!-- custom js link -->
  <script src="js/user_script.js"></script>
  <script src="js/user_script_test.js"></script>

  <?php include 'components/alert.php'; ?>
</body>
</html>