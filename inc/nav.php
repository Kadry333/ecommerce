<!-- Start Top Nav -->
<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between">
            <div class="user-nav">
                <?php if(isset($_SESSION['login']) && $_SESSION['login'] != "not"): ?>
                    <i class="fa fa-user mx-2 icon"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href=""><?php echo htmlspecialchars($_SESSION['login']); ?></a>
                    <i class="fa fa-fw fa-sign-out-alt mx-2 icon"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="<?php echo url('logout'); ?>">Logout</a>
                <?php else: ?>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="<?php echo url('register'); ?>">Register</a>
                    <i class="fa fa-user-plus mx-1 icon"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="<?php echo url('login'); ?>">LogIn</a>
                    <i class="fa fa-user mx-1 icon"></i>
                <?php endif; ?>
            </div>
            <div>
                <a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
            </div>
        </div>
    </div>
</nav>
<!-- Close Top Nav -->

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="<?php echo url('home'); ?>">
            Zay
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo url('home'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo url('about'); ?>">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo url('shop'); ?>">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo url('contact'); ?>">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">
                <!-- Search Form -->
                <form method="GET" action="../views/search.php" id="searchForm">
                    <div class="input-group">
                        <input type="text" name="query" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                <i class="fa fa-fw fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <a class="nav-icon d-none d-lg-inline" href="#" onclick="document.getElementById('searchForm').submit();">
                    <i class="fa fa-fw fa-search text-dark mr-2"></i>
                </a>

                <a class="nav-icon position-relative text-decoration-none" href="<?php echo url('card'); ?>">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <?php $sess = (get_session('card')); $count = $sess ? count($sess) : 0; ?>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"><?php echo $count; ?></span>
                </a>

                <?php if (!get_session('auth')): ?>
                    <a class="nav-icon position-relative text-decoration-none" href="<?php echo url('login'); ?>">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                    </a>
                <?php else: ?>
                    <a class="nav-icon position-relative text-decoration-none" href="<?php echo url('orders'); ?>">
                        <i class="fa fa-fw fa-box text-dark mr-3"></i>
                    </a>
                <?php endif; ?>
            </div>
        </div>

    </div>
</nav>
