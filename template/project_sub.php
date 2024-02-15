<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> <?= $title ?> </title>
        <meta name="title" content="<?= $titleMeta ?>"><!-- optional -->
        <meta name="description" content="<?= $descriptionMeta ?>">
        <meta name="keywords" content="<?= $keyWords ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/<?= $nameFolder ?>/<?= $newNameMeta ?>">
        <!-- Place favicon.ico in the root directory -->
        
		<!-- CSS here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/swiper-bundle.min.css"> 
        <link rel="stylesheet" href="assets/css/intlTelInput.min.css"> 
        <link rel="stylesheet" href="assets/css/fontawesome.min.css">  
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
    </head>
    <body>

       
    <!-- header-area START -->
    <div class="header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-6">
                    <div class="logo-area">
                        <a href="index.html"><img src="assets/img/logos/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-8 d-none d-lg-block text-right">
                    <div class="menu-area">
                        <nav>
                            <ul id="nav">
                                <li><a href="index.php" >Inicio</a></li>
                                <li><a href="nosotros.php" >Nosotros</a></li> 
                                <li><a href="product.php" class="active">Productos</a></li> 
                                <li><a href="projects.php">Proyectos </a></li>
                                <li>
                                    <div class="header_right">
                                        <a href="#" class="thm_btn trigger">Contáctanos</a>
                                    </div>
                                </li>   
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-6 d-block d-lg-none text-center">
                    <div class="bar">
                        <a class="bar-icon siteBar-btn" href="#">
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- mobile-menu START -->
        <div class="mobile-menu">
            <a href="#" class="bars siteBar-btn"><svg class="bi bi-x" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
            </svg></a> 
            <nav> 
                <ul><li><a href="index.html" >Inicio</a></li>
                    <li><a href="nosotros.html" >Nosotros</a></li> 
                    <li><a href="product.html" class="active">Productos</a></li> 
                    <li><a href="proyectos.html">Proyectos </a></li>   
                </ul>
            </nav> 
        </div> 

    
        <div class="contact_modal">
            <div class="contact_modal-content">
                <div class="modal_img">
                    <i>
                        <img src="assets/img/mdc.jpg" alt="">
                    </i>
                </div>
                
                <div class="modal-contact_box contact_form">
                    <span class="close-button">×</span>
                    <h1>Hola</h1>
                    <h2>¿Te gustaría solicitar una escultura personalizada?</h2>
                    <p>Solicita información para pedidos al por mayor, reporta un problema o solicita la ayuda que necesites.</p>
                    <form action="">
                        <div class="thr_input">
                            <input type="text" class="name_in" placeholder="Nombres y Apellidos">
                            <input type="text" id="mobile_code" >
                            <input type="text" class="numbar_in" placeholder="Celular">
                        </div>
                        <input type="text" class="corr_e" placeholder="Correo Electrónico">
                        <textarea name="" placeholder="Qué información necesitas..."></textarea>
                        <a href="#" class="thm_btn">Contactar</a>
                    </form>
                </div>
            </div>
        </div>
    <!-- header-area END -->

    <main>

        <section class="qe_area">
            <div class="container container_slider">
                <div class="row">
                    <div class="col-lg-">
                        <div class="qe_slider swiper ">
                            <div class="swiper-wrapper">
                                <?= $cadenaStyleImages ?>
                            </div>
                            
                            <div class="swiper-pagination qe_pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="qe_text">
                            <h1 class="sec_title">
                            <?= $nameProject ?>
                            </h1>
                            <p>
                            <?= $descriptionProject ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    
    </main>
    


    <footer class="footer_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-xl-4 col-md-12">
                    <div class="footer-logo">
                        <a href="#"><img src="assets/img/f-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9 col-xl-8 col-md-12">
                    <div class="footer_nav">
                        <ul>
                            <li><a href="#">Inicio</a></li>
                            <li><a href="#">Nosotros</a></li>
                            <li><a href="#">Galería</a></li>
                            <li><a href="#">Contáctanos</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Enlaces de Ayuda</a></li>
                            <li><a href="#"><p>Políticas de Privacidad</p></a></li>
                            <li><a href="#"><p>Términos y condiciones</p></a></li>
                            <li><a href="#"><p>Libro de Reclamaciones</p></a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Contacto</a></li>
                            <li><a href="#"><p>artespizarro@gmail.com</p></a></li>
                            <li><a href="#"><p>(+51) 954 451 251</p></a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Síguenos</a></li>
                            <li>
                                <div class="social-link">
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-behance"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer_btm">
                        <p>Ubícanos en: Av. Piedrita de Huamanga 564, Ayacucho-Perú</p>
                        <p>Copyright © Artes Pizarro 2023 - Todos los derechos reservados</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    
		<!-- JS here --> 
        <script src="assets/js/jquery-3.4.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/swiper-bundle.min.js"></script> 
        <script src="assets/js/intlTelInput.min.js"></script> 
        <script src="assets/js/main.js"></script>
    </body>
</html>