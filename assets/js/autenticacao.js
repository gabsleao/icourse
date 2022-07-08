function registrarUsuario(data){
    if(data == 'undefined')
        return alert ("Whoops! Algo deu errado.");
    
    var nome = data.nome_aluno.value;
    var email = data.email_aluno.value;
    var senha1 = data.senha_aluno.value;
    var senha2 = data.senha_aluno_confirmacao.value;
    var operacao = data.operacao.value;

    if(nome == 'undefined'){
        return alert("Whoops! Nome não setado.");
    }

    if(email == 'undefined'){
        return alert("Whoops! E-mail não setado.");
    }

    if(senha1 == 'undefined'){
        return alert("Whoops! Senha não setado.");
    }

    if(senha2 == 'undefined'){
        return alert("Whoops! Repita a segunda senha.");
    }

    if(senha1 !== senha2){
        return alert("Whoops! As senhas não são iguais.");
    }

    if(operacao == 'undefined'){
        return alert("Whoops! Algo deu errado.");
    }

    $.ajax({
        type : "POST",
        url  : "./classes/mapping.php",
        data : { nome : nome, email : email, senha1 : senha1, operacao : operacao },
        success: function(response){
            var jsonResponse = JSON.parse(response);
            var Resposta = jsonResponse.resposta;

            if(Resposta != "undefined"){
                alert(Resposta);
            }
            console.log(Resposta);
            
            window.location.replace("./index.php");
        },
        error: function(response){
            var jsonResponse = JSON.parse(response);
            var Resposta = jsonResponse.resposta;
            
            if(Resposta != "undefined"){
                alert(console.log(jsonResponse.resposta));
            }

            window.location.replace("./index.php");
        }
    });
}

function logarUsuario(data){
    console.log(1);
    if(data == 'undefined')
        return alert ("Whoops! Algo deu errado.");
    
    var email = data.email_aluno.value;
    var senha = data.senha_aluno.value;
    var operacao = data.operacao.value;

    if(email == 'undefined'){
        return alert("Whoops! E-mail não setado.");
    }

    if(senha == 'undefined'){
        return alert("Whoops! Senha não setado.");
    }

    if(operacao == 'undefined'){
        return alert("Whoops! Algo deu errado.");
    }

    $.ajax({
        type : "POST",
        url  : "./classes/mapping.php",
        data : { email : email, senha : senha, operacao : operacao },
        success: function(response){
            var jsonResponse = JSON.parse(response);
            var Resposta = jsonResponse.resposta;

            if(Resposta != "undefined"){
                alert(Resposta);
            }
            console.log(Resposta);
            
            window.location.replace("./index.php");
        },
        error: function(response){
            var jsonResponse = JSON.parse(response);
            var Resposta = jsonResponse.resposta;
            
            if(Resposta != "undefined"){
                alert(console.log(jsonResponse.resposta));
            }

            window.location.replace("./index.php");
        }
    });
    

}