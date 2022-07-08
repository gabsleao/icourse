<?php
include_once __DIR__ . '/config/header.php';

if (!isset($_GET['id']) || strlen($_GET['id']) == 0 || !is_numeric($_GET['id'])) {
    include_once __DIR__ . '/not_found.html';
    exit;
}

$IDColegio = $_GET['id'];
$Instituicao = new Instituiçao($IDColegio);
?>
<div class="container">

    <div class="jumbotron">
        <img width="100%" height="200px" src="./assets/escolas/escola1.png">

        <div class="banner-content">
            <img class="rounded-circle banner-logo" alt="100x100" src="./assets/escolas/escola1.png">
            <div class="banner-title"><?php echo $Instituicao->Nome; ?></div>
        </div>

        <div class="input-group search-box ">
            <input type="text" id="search" class="form-control" placeholder="Busque por cursos">
            <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
        </div>
    </div>

    <!-- <div class="containerLinha">
        <div class="linha"></div>
    </div> -->

    <h2>Cursos</h2>
    <?php include_once __DIR__ . '/cursos_instituicao.php'; ?>

</div>