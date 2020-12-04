<!DOCTYPE html>
<html lang="en">
<?php 
  session_start();
  if(!isset($_SESSION['datos_instructor'])){
    header("Location: ../index.php");
  }
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Menú</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/LogoSena.png" rel="icon">
  <link href="../assets/img/LogoSena.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="../assets/img/logoSena.png" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light">Asistencia</h1>
        <div class="social-links mt-3 text-center">
          <a href="https://twitter.com/SENAComunica" target="_blanck" class="twitter" id="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="https://www.facebook.com/SENA" target="_blanck" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="https://www.instagram.com/senacomunica/channel/" target="_blanck" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="https://www.sena.edu.co/es-co/Paginas/default.aspx" target="_blanck" class="home"><i class="bx bx-home-alt"></i></a>
        </div>
      </div>

      <nav class="nav-menu">
        <ul>
          <li class="#"><a href="menu.php"><i class="bx bx-home"></i><span>Inicio</span></a></li>
          <li><a href="Miperfil/perfil.php"><i class="bx bx-user-pin"></i> <span>Mi perfil</span></a></li>
          <li><a href="Fichas/Inicio.php"><i class="bx bx-list-check"></i> <span>Asistencia</span></a></li>
          <li><a href="Reportes/menu_reportes.php"><i class="bx bxs-file-pdf"></i>Reportes</a></li><br><br><br>
          <li><a href="../procesos/cerrar_sesion.php"><i class="bx bx-log-out-circle"></i>Cerrar Sesión</a></li>
        </ul>
      </nav><!-- .nav-menu -->
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>SENA</h1>
      <p> <span class="typed" data-typed-items="Es Educación íntegra., Es família., Es Colombia., Somos todos."></span></p>
    </div>
  </section><!-- End Hero -->

  <main id="main">


    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="../assets/vendor/counterup/counterup.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/venobox/venobox.min.js"></script>
    <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../assets/vendor/typed.js/typed.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>

</main><!-- End #main -->

</body>

</html>