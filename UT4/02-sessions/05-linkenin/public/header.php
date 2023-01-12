<header class="header">
    <div class="header__logo">
        Linkenin
    </div>
    <nav class="header__nav">
        <a href="listado.php" class="header__link">Inicio</a>
        <?php if(isset($_SESSION['user'])) : ?>
            <a href="logout.php" class="header__link">Cerrar Sesión</a>
        <?php else : ?>
            <a href="login.php" class="header__link">Iniciar Sesión</a>
            <a href="registro.php" class="header__link">Registrarse</a>
        <?php endif; ?>
        <?php if(isset($_SESSION['user'])) : ?>
            <a href="edit.php" class="header__link"><i class="bi bi-person-circle"></i> <?= $_SESSION['user'] ?></a>
        <?php else : ?>
            <a href="login.php" class="header__link"><i class="bi bi-person-circle"></i> Invitado</a>
        <?php endif; ?>
    </nav>
</header>