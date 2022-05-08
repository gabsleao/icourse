<html lang="en">

<?php include_once __DIR__ . '/config/header.php'; ?>

<style>
.morecontent span {
    display: none;
}
</style>

<body>
    <div class="container">
    <!-- dinamizar com PHP a partir daqui -->

      <!-- div responsável por dividir os elementos em 3 colunas por linha -->
      <h1>Escolas</h1>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <!-- cada coluna -->
        <div class="col">
          <div class="card shadow-sm">
            <img width="100%" height="125px"  src="./assets/escolas/escola1.png">
            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="125" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->

            <div class="card-body">
              <p class="card-title"><b>Nome do Colégio 1</b></p>
              <p class="card-text more">Nosso compromisso é contribuir para o fortalecimento intelectual e emocional dos nossos alunos, tornando extremamente simples a comunicação deles com pessoas de todas as partes do mundo, através do ensino efetivo original e inovador, capaz de fazer do aprendizado uma experiência única e prazerosa.</p>
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
          <div class="card shadow-sm">
          <img width="100%" height="125px" src="./assets/escolas/escola2.jpg">
            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="125" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->

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
          <div class="card shadow-sm">
          <img width="100%" height="125px" src="./assets/escolas/escola3.jpg">
            <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="125" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->

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
      
    </div>
</body>

</html>

<script>
function AddReadMore() {
    var maxChars = 160;  // numero maximo de chars pra mostrar texto
    

    $('.more').each(function() {
        var texto = $(this).html();
 
        if(texto.length > maxChars) {
            var mostrar = texto.substr(0, maxChars);
            var h = texto.substr(maxChars, texto.length - maxChars);
 
            var html = mostrar + '... <span class="morecontent"><span>' + h + '</span><a href="" class="morelink">ler mais</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html("ler mais");
        } else {
            $(this).addClass("less");
            $(this).html(" ler menos");
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
}

$(function() {
    //Calling function after Page Load
    AddReadMore();
});
</script>