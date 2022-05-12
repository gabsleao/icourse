function openInstituicao() {
    var nomeColegio = $("#nomeColegio").text();
    url = "./instituicao_info.php";
    // var idDoColegio = $("#idDoColegio").val();
    // console.log(idDoColégio);

    $.ajax({
        type : "POST",
        url  : url,
        data : { nomeColegio : nomeColegio, idDoColegio : 'idDoColegio' },
        success: function(response){
                console.log(response);
                window.location = url;
                // var jsonResponse = JSON.parse(response).response;
                // console.log(jsonResponse);
        },
        error: function(){
            alert("Whoops! Algo deu errado.");
        }
    });
}


