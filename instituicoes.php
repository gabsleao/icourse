<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

  <!-- cada coluna -->
  <div class="col">
    <div class="card shadow-sm" onClick="openInstituicao(1);" style="cursor: pointer;">


      <img width="100%" height="125px" src="./assets/escolas/escola1.png">
      <div class="card-body">
        <div class="card-title" id="nomeColegio"><b>Nome do Colégio 1</b></div>
        <div class="card-text more">Nosso compromisso é contribuir para o fortalecimento intelectual e emocional dos nossos alunos, tornando extremamente simples a comunicação deles com pessoas de todas as partes do mundo, através do ensino efetivo original e inovador, capaz de fazer do aprendizado uma experiência única e prazerosa.</div>
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


  <div class="col">
    <div class="card shadow-sm" onClick="location.href='./instituicao_info.php';" style="cursor: pointer;">
      <img width="100%" height="125px" src="./assets/escolas/escola2.jpg">

      <div class="card-body">
        <p class="card-title"><b>Nome do Colégio 2</b></p>
        <p class="card-text more">Nosso compromisso é contribuir para o fortalecimento intelectual e emocional dos nossos alunos, tornando extremamente simples a comunicação deles com pessoas de todas as partes do mundo, através do ensino efetivo original e inovador, capaz de fazer do aprendizado uma experiência única e prazerosa.</p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-secondary">+ Informações</button>
            <!-- apenas quem tiver permissão (admin ou revisor) -->
            <button type="button" class="btn btn-sm btn-outline-secondary">Editar</button>
          </div>
          <!-- distancia (IMPORTANTE) -->
          <small class="text-muted">1.5km</small>
        </div>
      </div>
    </div>
  </div>


  <div class="col">
    <div class="card shadow-sm" onClick="location.href='./instituicao_info.php';" style="cursor: pointer;">
      <img width="100%" height="125px" src="./assets/escolas/escola3.jpg">

      <div class="card-body">
        <p class="card-title"><b>Nome do Colégio 3</b></p>
        <p class="card-text more">Nosso compromisso é contribuir para o fortalecimento intelectual e emocional dos nossos alunos, tornando extremamente simples a comunicação deles com pessoas de todas as partes do mundo, através do ensino efetivo original e inovador, capaz de fazer do aprendizado uma experiência única e prazerosa.</p>
        <div class="d-flex justify-content-between align-items-center">
          <div class="btn-group">
            <button type="button" class="btn btn-sm btn-outline-secondary">+ Informações</button>
            <!-- apenas quem tiver permissão (admin ou revisor) -->
            <button type="button" class="btn btn-sm btn-outline-secondary">Editar</button>
          </div>
          <!-- distancia (IMPORTANTE) -->
          <small class="text-muted">3.5km</small>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- TO-DO: melhorar esse botão e add função -->
<div class="centralizado">
  <button type="button" label="Ver mais">Ver mais</button>
</div>