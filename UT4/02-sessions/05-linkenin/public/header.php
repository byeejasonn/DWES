<header class="header">
    <div class="header__logo">
        Linkenin
    </div>
    <nav class="header__nav">
        <a href="listado.php" class="header__link">Inicio</a>
        
        <div class="header__dropdown">
            <?php if(isset($_SESSION['usuario'])) : ?>
                <a href="edit.php" class="header__link"><i class="bi bi-person-circle"></i> <?= substr(ucfirst($_SESSION['usuario']), 0, 10) ?></a>
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