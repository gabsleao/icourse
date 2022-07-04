//https://opencagedata.com/api
const API_KEY = "pegar no openCage";
const LOCATION_ICON_HTML = "<i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i>";

function openInstituicao(idDoColegio) {
    //abrir a página com get
    URL = encodeURI("./instituicao_info.php?id=" + idDoColegio);
    window.open(URL, "_self");
}

function novaInstituicao(data){
    if(data == 'undefined'){
        return alert("Whoops! Algo deu errado, tente novamente.");
    }
    var nome = data.nome_instituicao.value;
    var descricao = data.descricao_instituicao.value;
    var tags = data.tags_instituicao.value;
    var endereco = data.endereco_instituicao.value;
    var cep = data.cep.value;
    var estado = data.estado_instituicao.value;
    var cidade = data.cidade_instituicao.value;
    var operacao = data.operacao.value;

    if(nome == 'undefined'){
        return alert("Whoops! Nome não setado.");
    }

    if(descricao == 'undefined'){
        return alert("Whoops! Descricao não setado.");
    }

    if(tags == 'undefined'){
        return alert("Whoops! Tags não setada.");
    }

    if(endereco == 'undefined'){
        return alert("Whoops! Endereco não setado.");
    }

    if(cep == 'undefined'){
        return alert("Whoops! CEP não setado.");
    }

    if(estado == 'undefined'){
        return alert("Whoops! Estado não setado.");
    }

    if(cidade == 'undefined'){
        return alert("Whoops! Cidade não setada.");
    }

    $.ajax({
        type : "POST",
        url  : "./classes/mapping.php",
        data : {    nome : nome, 
                    descricao : descricao, 
                    tags : tags, 
                    endereco : endereco, 
                    cep: cep, 
                    estado : estado, 
                    cidade : cidade, 
                    operacao : operacao },
        success: function(response){
            console.log(response);
            // alert("YAY! Instituição " + nome + " adicionada.");
            window.location.replace("./index.php");
        },
        error: function(response){
            var jsonResponse = JSON.parse(response).response;
            console.log(jsonResponse);
            alert("Whoops! Algo deu errado.");
        }
    });

}

// pegar location via Browser (com consentimento!)
function getLocation() {
    if (window.navigator.geolocation) {
        window.navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        alert("O navegador não suporta Geolocalização ):");
    }
}


function showPosition(position) {
    var div = $("#endereco");

    //Latitude: -22.9650331 | Longitude: -47.104547
    fetch(`https://api.opencagedata.com/geocode/v1/json?q=${position.coords.latitude}+${position.coords.longitude}&key=${API_KEY}`)
        .then(response => response.json())
        .then(function (response) {
            if (response['status'].code != 200) {
                return div.html(LOCATION_ICON_HTML + "Não foi possível pegar a sua localização ):");
            }

            var components = response['results'][0]['components'];

            var cidade = components['city'];
            var estado = components['state'];
            var adicional = components['county'];

            //Campinas, São Paulo - Região Metropolitana de Campinas
            div.html(LOCATION_ICON_HTML + cidade + ', ' + estado + ' - ' + adicional);
            div.css("cursor", "");
            return div;
        })
}

function showError(error) {
    if (error.PERMISSION_DENIED) {
        alert("Sem problemas! Não iremos coletar a sua localização.");
    }
}