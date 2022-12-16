<?php
    include('./vars.php');
?>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

:root {
    --bg-color: <?= $bgColor ?> ;
    --fg-color: <?= $fgColor ?>;
    --padding-vert: 20px;
    --padding-hori: 10px;
}

body {
    background-color: var(--bg-color);
}

h1, h2, h3, h4, h5, h6 {
    margin: 10px 0;
}

.main {
    width: 650px;
    height: 300px;
    padding: var(--padding-vert) var(--padding-hori);
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    margin: 0 auto;
    background-color: var(--fg-color);
    color: var(--bg-color);
    border-radius: 10px;
}

.footer {
    position: absolute;
    bottom: var(--padding-vert);
}

.link {
    color: var(--bg-color);
    text-decoration: none;
}

.current {
    border-bottom: 2px solid var(--bg-color);
}