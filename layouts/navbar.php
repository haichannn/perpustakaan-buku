<nav class="navbar navbar-expand-md" style="background-color:#508bfc;">
    <div class="container-fluid">
        <a class="navbar-brand fs-4" href="index.php">STIMK Komputama</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbarNav">
            <ul class="navbar-nav">
                <?php if (isset($_SESSION["logged_in"])) : ?>
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="tambah.php">Tambah</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link text-secondary-emphasis" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary-emphasis" href="login.php">Login</a>
                    </li>
                <?php endif ?>
            </ul>
            <ul class="navbar-nav">
                <?php if (isset($_SESSION["logged_in"])) : ?>

                    <li class="nav-item">
                        <div class="d-flex g-1 align-items-center">
                            <div>
                                <img src="././assets/images/image-userAvatar.png" alt="user image" width="15" class="img-fluid">
                            </div>
                            <div>
                                <span class="nav-link">
                                    <?= $_SESSION["username"] ?>
                                </span>
                            </div>
                        </div>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>