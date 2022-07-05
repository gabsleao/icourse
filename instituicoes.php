<?php

$InstituicaoClass = new Instituiçao();

if (is_null($InstituicaoClass)) {
  include_once __DIR__ . '/not_found.html';
  exit;
}

$Filtro = ['ativo' => 1];
$Instituicoes = $InstituicaoClass->getInstituicoes($Filtro);

echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
if (count($Instituicoes) > 0) {
  foreach ($Instituicoes as $Instituicao) { ?>
    <!-- cada coluna -->
    <div class="col">
      <div class="card shadow-sm" onClick="openInstituicao(this);" style="cursor: pointer;">

        <img width="100%" height="125px" src="./assets/escolas/escola1.png">
        <div class="card-body">
          <div class="card-title" id="nomeColegio"><b><?php echo $Instituicao['nome']; ?></b></div>
          <div class="card-text more"><?php echo $Instituicao['descricao']; ?></div>
          <div class="d-flex justify-content-between align-items-center">
            <?php
            if (isset($_SESSION['iduser'])) {
            ?>
              <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">+ Informações</button>
                <!-- apenas quem tiver permissão (admin ou revisor) -->
                <button type="button" class="btn btn-sm btn-outline-secondary">Editar</button>
              </div>
            <?php
            }
            ?>
            <!-- distancia (IMPORTANTE) -->
            <small class="text-muted"><?php echo 0 //$Instituicao->Distancia; ?>m</small>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
} else { ?>
  <div class="col">
    <div class="card shadow-sm">

      <img width="100%" height="125px" src="./assets/imagens/criarInstituicao.jpg">
      <div class="card-body">
        <div class="card-title" id="nomeColegio"><b>Whoops! Parece que não temos instituições para mostrar aqui... por enquanto (:</b></div>
        <?php
        if (isset($_SESSION['iduser'])) {
        ?>
          <div class="card-text more">O que acha de adicionar alguma?</div><br>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <button type="button" data-toggle="modal" data-target="#modalCriarInstituicao" class="btn btn-sm btn-outline-secondary">+ Adicionar Instituição</button>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
<?php }

echo '</div>';

require_once __DIR__ . '/modal_instituicao.php';
