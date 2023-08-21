<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto ProjetoPRO_MOV</title>
    
    <!-- Main CSS -->
    <link rel="stylesheet" href="main.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Swiper CSS and JavaScript -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Fancybox CSS and JavaScript -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    <!-- Main JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.2/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

<header class="container-fluid custom-header-width custom-header">
    <div class="row">
    <div class="col-md-4 bg-light rounded-left d-flex align-items-end">
    <a href="index.php">
        <img src="images/logo.png" alt="Logo Promov" class="img-fluid custom-logo">
    </a>
</div>
        <div class="col-md-4 bg-light"></div>
        <div class="col-md-4 bg-light rounded-right d-flex align-items-center justify-content-end">
            
            <span class="powered-by-text">Powered by</span><img src="images/logosap.png" alt="Logo SAP" class="logosap-img">
        </div>
    </div>
</header>




<nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <a class="navbar-brand" href="login.php">Login</a>
        <a class="navbar-brand" href="logout.php">Logout</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="laboratorios.php">Laboratórios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cursos.php">Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="turmas.php">Turmas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cronograma.php">Cronograma</a>
                </li>
            </ul>
        </div>
    </nav>

    <script>
    // Get the current page's filename
    var currentPage = window.location.pathname.split('/').pop();

    // Check if the current page is the index page or the page file name is blank
    if (currentPage === "index.php" || currentPage === "") {
        // Hide the navbar on the index page or when the page file name is blank
        document.addEventListener('DOMContentLoaded', function () {
            var navbar = document.querySelector('.navbar');
            navbar.style.display = 'none';
        });
    }
</script>
</body>
</html>
