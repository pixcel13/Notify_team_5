<?php require_once("includes/con_db.php");   ?>
<!DOCTYPE html>
<html lang= "es-MX">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <title></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <!-- My Styles -->
    <link href="css/styles.css" rel="stylesheet">

</head>

<body>
<div class="contenedor">
    <!-- Start Header -->
    <header id="home">
        <div class="container  vertical-align">
            <div class="row">
                <div class="col-md-6 col-md-offset-1">
                    <img src="images/logo.png" alt="logotipo notify" class="img-responsive">
                    <?php 
                        $c_header = "SELECT * FROM header WHERE id_h = 10";
                        $r_header = mysqli_query($mysqli, $c_header);
                        while($f_header = mysqli_fetch_array($r_header)){
                            ?>
                            <h3> <?php echo $f_header['texto_h'];?> </h3>
                            <?php 
                        }
                        ?>
                    <ul>
                        <li><a href="#"><i class="fa fa-apple"></i></a></li>
                        <li><a href="#"><i class="fa fa-android"></i></a></li>
                        <li><a href="#"><i class="fa fa-windows"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--End Header-->
    <!-- Start Features -->
    <?php 
                    $fa = array("gear", "star", "globe");
                    $i=0;
                    $c_features = "SELECT * FROM features LIMIT 3 OFFSET 3";
                    $r_features = mysqli_query($mysqli, $c_features); 
    ?>
    <section id="features">
        <div class="container">
            <div class="row">
                <?php
                    while($f_features = mysqli_fetch_array($r_features)){
                    ?>
                <div class="col-xs-12  col-md-4 features-item">
                    <i class="fa fa-<?php echo $fa[$i]; ?>" aria-hidden="true"></i>
                    <h3> <?php echo $f_features['titulo_f']; ?> </h3>
                    <p> <?php echo $f_features['texto_f']; ?></p>
                    
                </div>
                <?php $i++;} ?>
            </div>
        </div>
    </section>
    <!--End Features-->
    <!-- Start Get notified -->
     <?php 
        $c_notified = "SELECT * FROM notified LIMIT 1 OFFSET 3";
        $r_notified = mysqli_query($mysqli, $c_notified); 
    ?>
    <section id="notified">
        <div class="container">
            <div class="row">
                <?php while($f_notified = mysqli_fetch_array($r_notified)){ 
                    ?>
                <div class="col-xs-12  col-md-6">
                   <div class="updates">
                        <?php $url = $f_notified['url_not'];?>
                         <h3> <?php echo $f_notified['titulo_not']; ?> </h3>
                        <p><?php echo $f_notified['texto_not']; ?></p>
                        <form>
                            <div class="input-group newsletter">
                                <input type="email" class="form-control" placeholder="Email Address">
                                <span class="input-group-btn"><button class="btn btn-default" type="submit">Notify</button></span>
                            </div>
                        <?php  } ?>
                        </form>
                    </div>
                </div>

            <div class="video-container">
            <iframe src="https://player.vimeo.com/<?php echo $url?>" width="560" height="315" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
            </div>
        </div>
    </section>
    <!-- End Get notified -->
    
    <!-- Start Testimonials -->
    <!-- id, nombre_t   texto_t imagen_t -->
 
     <!-- Start Testimonials -->
    <?php  
            $c_testimonials = "SELECT * FROM testimonials";
            $r_testimonials = mysqli_query($mysqli, $c_testimonials);
          ?> 
    <section id="testimonials">
        <div class="container">
            <div class="row">
                <?php while($f_testimonials = mysqli_fetch_array($r_testimonials)){ ?>   
                <div class="col-md-12">
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                    <!-- Carousel Slides / Quotes -->
                        <div class="carousel-inner text-center">
          <!-- Quote n --> 
                            <div class="item active">
                             <blockquote>
                                <div class="row">
                                    <!-- Quote 1 -->
                                    <div class="col-sm-10 col-sm-offset-1">    
                                        <cite>" <?php echo $f_testimonials['mensaje_tes']; ?>"</cite>
                                        <small><?php echo $f_testimonials['nombre_tes']; ?></small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                        </div>                
                        <!-- Stat Whyle, cicle -->
                           
                    <!-- End Carousel Slides / Quotes -->                    
                    <!-- Bottom Carousel Indicators -->
                    <ol class="carousel-indicators">

                        <?php 
                        $car=0;
                        $c_testimonials = "SELECT * FROM testimonials ";
                        $r_testimonials = mysqli_query($mysqli, $c_testimonials);
                        while($f_testimonials = mysqli_fetch_array($r_testimonials)) 
                        {  ?>   
                                <li data-target="#quote-carousel" data-slide-to="$car"><img class="img-responsive" src="<?php echo $f_testimonials['foto_tes']; ?>" alt=""></li>
                                <?php $car++;
                    } ?>  
                    </ol>
                    <?php 
                        $c_testimonials = "SELECT * FROM testimonials ";
                        $r_testimonials = mysqli_query($mysqli, $c_testimonials);
                        while($f_testimonials = mysqli_fetch_array($r_testimonials)) 
                        {  ?>   
                     <div class="social text-center">
                         <h3><?php echo $f_testimonials['text1_tes']; ?></h3>
                         <p><?php echo $f_testimonials['text2_tes']; ?></p>
                     <?php } ?>  
                         <ul>
                             <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                             <li><a href="https://es-la.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                             <li><a href="https://www.pinterest.com.mx/"><i class="fa fa-pinterest"></i></a></li>
                             <li><a href="https://plus.google.com/?hl=e"><i class="fa fa-google-plus-circle"></i></a></li>
                             <li><a href="https://mx.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                             <li><a href="https://www.youtube.com/?hl=es-419&gl=MX"><i class="fa fa-youtube"></i></a></li>
                         </ul>
                     </div>
                </div>
            </div>
            <?php } ?>  
        </div>
    </div>
</section>
<!-- End Testimonials-->



    <!-- Start Footer -->
    <footer id="footer">
        <div class="container">
            <ul>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Download</a></li>
                <li><a href="#">Press</a></li>
                <li><a href="#">Email</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="./usuarios.php">Backend</a></li>
            </ul>
        </div>
    </footer>
    <!-- End Footer -->

</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>