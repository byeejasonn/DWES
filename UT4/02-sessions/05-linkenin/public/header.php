<header class="header">
    <div class="header__logo">
        Linkenin
    </div>
    <nav class="header__nav">
        <a href="listado.php" class="header__link">Inicio</a>
        <?php if(isset($_SESSION['user'])) : ?>
            <!-- <a href="logout.php" class="header__link">Cerrar sesión</a> -->
        <?php else : ?>
            <!-- <a href="login.php" class="header__link">Iniciar sesión</a>
            <a href="registro.php" class="header__link">Registrarse</a> -->
        <?php endif; ?>
        <div class="header__dropdown">
            <?php if(isset($_SESSION['user'])) : ?>
                <a href="edit.php" class="header__link"><i class="bi bi-person-circle"></i> <?= $_SESSION['user'] ?></a>
                <div class="header__dropdown-items">
                    <a href="logout.php" class="header__link header__dropdown-item">Cerrar sesión</a>
                </div>
            <?php else : ?>
                <a href="login.php" class="header__link"><i class="bi bi-person-circle"></i> Invitado</a>
                <div class="header__dropdown-items">
                    <a href="login.php" class="header__link header__dropdown-item">Iniciar sesión</a>
                    <a href="registro.php" class="header__link header__dropdown-item">Registrarse</a>
                </div>
            <?php endif; ?>
            
        </div>
    </nav>
</header>