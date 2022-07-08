<?php
$CursoClass = new Curso();

if (is_null($CursoClass)) {
  include_once __DIR__ . '/not_found.html';
  exit;
}

$Filtro = ['ativo' => 1];
$Cursos = $CursoClass->getCursos($Filtro);

echo '<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';

if (count($Cursos) > 0) {
  foreach ($Cursos as $Curso) {
?>
    <!-- cada coluna -->
    <div class="col">
      <div class="card shadow-sm">
        <img width="100%" height="125px" src="./assets/escolas/curso1.jpeg">
        <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="125" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->

        <div class="card-body">
          <p class="card-title"><b>Nome do Curso 1</b></p>
          <p class="card-text more">Quem é profissional de RH sabe que a entrevista em um processo seletivo merece atenção especial. Afinal, ela identificará o candidato certo para determinada vaga e, a escolha na abordagem, nesse momento, é essencial. Desta forma, é possível contar com vários tipos de testes para aplicar em entrevistas que tornam o processo de recrutamento e seleção mais dinâmico e eficiente. O tipo de entrevista que o profissional de RH deve aplicar em sua empresa variará de acordo com alguns fatores como, por exemplo, a cultura da empresa, ou seja, sua política, suas crenças, valores e hábitos. É preciso também definir o perfil comportamental ideal, de acordo com as necessidades do cargo. Por isso, com o objetivo de facilitar na escolha do melhor tipo de entrevista para a sua organização, apresentaremos neste conteúdo alguns tipos de entrevistas mais utilizados por recrutadores, suas características, e como e quando elas devem ser aplicadas. </p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <button type="button" class="btn btn-sm btn-outline-secondary">+ Informações</button>
              <?php
              if (isset($_SESSION['iduser']) && $_SESSION['tipo'] == 'ADMIN') { ?>
                <button type="button" class="btn btn-sm btn-outline-secondary">Editar</button>
              <?php
              }
              ?>
            </div>
            <!-- distancia (IMPORTANTE) -->
            <small class="text-muted">750m</small>
          </div>
        </div>
      </div>
    </div>
  <?php
  }
} else {
  ?>
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

<?php
}
echo '</div>';
