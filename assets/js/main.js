//https://opencagedata.com/api
const API_KEY = "pegar no openCage";
const LOCATION_ICON_HTML = "<i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i> ";

function openInstituicao(idDoColegio) {
    //abrir a página com get
    URL = encodeURI("./instituicao_info.php?id=" + idDoColegio);
    window.open(URL, "_self");
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