<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="./">eValy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'index.php' ? 'active' : null ?>" aria-current="page" href="./">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'shop.php' ? 'active' : null ?>" href="./shop.php">Shop</a>
                </li>
                <?php if (!isset($_SESSION['name'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'signin.php' ? 'active' : null ?>" href="./signin.php">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $page == 'signup.php' ? 'active' : null ?>" href="./signup.php">Sign Up</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src='./images/<?= $_SESSION['img'] ?? "profile.png " ?>' alt="" class="img-fluid rounded-circle" style="height: 20px;">
                            <?= explode(" ", $_SESSION['name'])[0]  ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./profile-update.php">Profile Update</a></li>
                            <li><a class="dropdown-item" href="./change-password.php">Change Password</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                            <?php
                            if ($_SESSION['role'] === 'admin') {
                            ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="./admin">Admin Panel</a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="./orders.php" class="nav-link <?= $page == 'orders.php' ? 'active' : null ?>">My Orders</a>
                    </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link position-relative me-5" href="./cart.php">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="position-absolute top-50 start-100 translate-middle-y badge rounded-pill bg-danger" id="cartnav">
                            0
                        </span>
                    </a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>