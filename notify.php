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
                    <!--    ***    Primer Test Titulo Random ***    -->
                    <!-- 
                    <?php //$id_titulo = mt_rand(1, 15); ?>
                    <h3><?php //echo "$id_titulo"; ?></h3> -->
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
    <section id="features">
        <div class="container">
            <div class="row">
                <div class="col-xs-12  col-md-4 features-item">
                    <i class="fa fa-gear" aria-hidden="true"></i>
                    <h3>Editable Theme</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suspendisse fringilla fringilla.</p>
                </div>
                <div class="col-xs-12  col-md-4 features-item">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <h3>Flat Design</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suspendisse fringilla fringilla.</p>
                </div>
                <div class="col-xs-12  col-md-4 features-item">
                    <i class="fa fa-globe" aria-hidden="true"></i>
                    <h3>Reach Your Audience</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suspendisse fringilla fringilla.</p>
                </div>
            </div>
        </div>
    </section>
    <!--End Features-->


    <!-- Start Get notified -->
    <!-- id, titulo_n   texto_n     video_n  -->
    <section id="notified">
        <div class="container">
            <div class="row">
                <div class="col-xs-12  col-md-6">
                   <div class="updates">
                         <h3>Get Notified Of Any Updates!</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suspendisse fringilla fringilla nisi congue congue. Maecenas nec condimtum libero, at elementum mauris. Phasellus eget nisi dapibus, ultrices nisi at, hendrerit risusuis ornare luctus id sollicitudin ante lobortis at.</p>
                        <form>
                            <div class="input-group newsletter">
                                <input type="email" class="form-control" placeholder="Email Address">
                                <span class="input-group-btn"><button class="btn btn-default" type="submit">Notify</button></span>
                            </div>
                        </form>
                    </div>
                </div>
            <div class="video-container">
            <iframe src="https://player.vimeo.com/video/12199910?autoplay=1&muted=1&loop=1" width="560" height="315" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
            </div>
        </div>
    </section>
    <!-- End Get notified -->

    <!-- Start Testimonials -->
    <!-- id, nombre_t   texto_t imagen_t -->
    <section id="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                    <!-- Start Carousel Slides / Quotes -->
                        <div class="carousel-inner text-center">
                        <!-- Quote 1 -->
                        <!-- Stat Whyle, cicle -->
                            <div class="item active">
                             <blockquote>
                                <div class="row">
                                    <div class="col-sm-10 col-sm-offset-1">
                                        <cite>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur."</cite>
                                        <small>Angie</small>
                                    </div>
                                </div>
                            </blockquote>
                        </div>                      
                    </div>
                    <!-- End Carousel Slides / Quotes -->                    
                    <!-- Bottom Carousel Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#quote-carousel" data-slide-to="0" class="active"><img class="img-responsive" src="images/person1.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="1"><img class="img-responsive" src="images/person2.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="2"><img class="img-responsive" src="images/person3.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="3"><img class="img-responsive" src="images/person4.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="4"><img class="img-responsive" src="images/person5.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="5"><img class="img-responsive" src="images/person6.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="6"><img class="img-responsive" src="images/person7.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="7"><img class="img-responsive" src="images/person8.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="8"><img class="img-responsive" src="images/person9.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="9"><img class="img-responsive" src="images/person10.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="10"><img class="img-responsive" src="images/person11.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="11"><img class="img-responsive" src="images/person12.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="12"><img class="img-responsive" src="images/person13.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="13"><img class="img-responsive" src="images/person14.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="14"><img class="img-responsive" src="images/person15.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="15"><img class="img-responsive" src="images/person16.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="16"><img class="img-responsive" src="images/person17.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="17"><img class="img-responsive" src="images/person18.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="18"><img class="img-responsive" src="images/person19.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="19"><img class="img-responsive" src="images/person20.jpg" alt="">
                        </li>
                        <li data-target="#quote-carousel" data-slide-to="20"><img class="img-responsive" src="images/person21.jpg" alt="">
                        </li>
                    </ol>


                     <div class="social text-center">
                         <h3>Say Hi & Get in Touch</h3>
                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suspendisse.</p>
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
