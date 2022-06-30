function registrarUsuario(data){
    if(data == 'undefined')
        return alert ("Whoops! Algo deu errado.");
    
    var nome = data.nome.value;
    var email = data.email.value;
    var senha1 = data.senha1.value;
    var senha2 = data.senha2.value;
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
        return alert("Whoops! Algo deu errado [1].");
    }

    $.ajax({
        type : "POST",
        url  : "./classes/mapping.php",
        data : { nome : nome, email : email, senha1 : senha1, operacao : operacao },
        success: function(response){
                console.log(1);
                console.log(response);
                var jsonResponse = JSON.parse(response).response;
                console.log(jsonResponse);
                alert(jsonResponse.message);

                if(jsonResponse.status == 200)
                    window.location.replace("./index.php");
                
                if(jsonResponse.status == 500)
                    return alert("Por favor, verifique seu nome de usuário e senha.");
        },
        error: function(response){
            var jsonResponse = JSON.parse(response).response;
            console.log(jsonResponse);
            
            alert(jsonRespons.message);
        }
    });
    

}