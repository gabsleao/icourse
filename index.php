<html lang="en">

<?php include_once __DIR__ . '/config/header.php'; ?>

<style>
    .morecontent span {
        display: none;
    }
</style>

<body>
    <div class="container">

        <h1>Instituições</h1>
        <?php include_once __DIR__ . '/instituicoes.php'; ?>

        <div class="containerLinha">
            <div class="linha"></div>
            <div class="linhaIcon"><i class="material-icons">school</i></div>
            <div class="linha"></div>
        </div>

        <h1>Cursos</h1>
        <?php include_once __DIR__ . '/cursos.php'; ?>



    </div>
</body>

</html>

<script>
    function AddReadMore() {
        var maxChars = 160; // numero maximo de chars pra mostrar texto

        $('.more').each(function() {
            var texto = $(this).html();

            if (texto.length > maxChars) {
                var mostrar = texto.substr(0, maxChars);
                var h = texto.substr(maxChars, texto.length - maxChars);

                var html = mostrar + '... <span class="morecontent"><span>' + h + '</span><a href="" class="morelink">ler mais</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink").click(function() {
            if ($(this).hasClass("less")) {
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
        //chama ao carregar a page
        AddReadMore();
    });
</script>