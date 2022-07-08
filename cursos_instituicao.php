<?php

$Cursos = $Instituicao->getCursosInstituicao();

echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
if (count($Cursos) > 0) {
  foreach ($Cursos as $Curso) { ?>
    <!-- cada coluna -->
    <div class="col">
      <div class="card shadow-sm">
        <img width="100%" height="125px" src="./assets/escolas/curso1.jpeg">
        <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="125" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->

        <div class="card-body">
          <p class="card-title"><b><?php echo $Curso['nome']; ?></b></p>
          <p class="card-text more"><?php echo $Curso['descricao']; ?></p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <button type="button" class="btn btn-sm btn-outline-secondary">+ Informações</button>
              <!-- apenas quem tiver permissão (admin ou revisor) -->
              <button type="button" class="btn btn-sm btn-outline-secondary">Editar</button>
            </div>
            <!-- distancia (IMPORTANTE) -->
            <small class="text-muted">750m</small>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
} else { ?>
  <div class="col">
    <div class="card shadow-sm">
      <img width="100%" height="125px" src="./assets/escolas/curso3.png">
      <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="125" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->

      <div class="card-body">
        <p class="card-title"><b>Whoops! Parece que não temos cursos para mostrar aqui... por enquanto (:</b></p>
        <?php
        if (isset($_SESSION['iduser']) && $_SESSION['tipo'] == 'ADMIN') {
        ?>
          <div class="card-text more">O que acha de adicionar algum?</div><br>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <button type="button" data-toggle="modal" data-target="#modalCriarCurso" class="btn btn-sm btn-outline-secondary">+ Adicionar Curso</button>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
<?php }

if (count($Cursos) > 0 && isset($_SESSION['iduser']) && $_SESSION['tipo'] == 'ADMIN') {
?>

  <div class="col">
    <div class="card shadow-sm">

      <img width="100%" height="125px" src="./assets/imagens/criarInstituicao.jpg">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button type="button" data-toggle="modal" data-target="#modalCriarInstituicao" class="btn btn-sm btn-outline-secondary">+ Adicionar Instituição</button>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

</div>