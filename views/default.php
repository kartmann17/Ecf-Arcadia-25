<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
  <?php echo $link ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
  <link rel="icon" type="image/png" href="../asset/Icones/favicon.ico">
  <link rel="stylesheet" href="../css/accueil.css">
  <link rel="stylesheet" href="../css/footer.css">
  <?php echo $script?>
  <title><?= $title ?></title>
</head>

<body>
  <header>
    <div id="mainNavigation">
      <nav role="navigation">
        <div class="py-1 text-center border-bottom">
          <img class="logoA" src="../asset/Icones/sans fond 2.svg" alt="logo principal">
        </div>
      </nav>
      <div class="navbar-expand-md">
        <div class="navbar-dark text-center my-2 ">
          <button class="navbar-toggler w-75  " type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span> <span class="align-middle z-1">Menu</span>
          </button>
        </div>
        <div class="text-center mt-3 collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav mx-auto ">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="accueil.php">ARCADIA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.php">Nos Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="avis.php">Avis</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="animaux.php">Nos Animaux</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="habitats.php">Nos Univers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <?php if (isset($_SESSION['id_utilisateur'])): ?>
              <li class="nav-item">
                <a class="nav-link" href="deconnexion.php">Déonnexion</a>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="nav-link" href="connexion.php">connexion</a>
              </li>
            <?php endif; ?>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dashbord
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="addAnimaux.php">Ajout d'animaux</a></li>
                  <li><a class="dropdown-item" href="addUser.php">Ajout d'utilisateur</a></li>
                </ul>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>

  </header>



  <footer class="py-1 my-2">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2">Arcadia</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2">About</a></li>
      </ul>
    </footer>
    <div class="footer">
      <p class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
          class="bi bi-c-circle " viewBox="0 0 16 16">
          <path
            d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512" />
        </svg> Copyright 2024 Arcadia</p>
    </div>
    <?php echo $script?>
</body>
</html>