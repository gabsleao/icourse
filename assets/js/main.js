function openInstituicao(idDoColegio) {
    //abrir a página com get
    URL = encodeURI("./instituicao_info.php?id=" + idDoColegio);
    window.open(URL, "_self");
}


