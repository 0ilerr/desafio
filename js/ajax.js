/**
  * Variáveis
  */
  var produtos=[];
  var resultados = [];
  var resultados2 = [];
  var table = "<table border='1'> <thead> <tr> <th>Código</th> <th>Descrição</th> <th>Preço</th> </tr> </thead> <tbody> <tr>"
  var total = 0;
  var idDoc = 0;

  /**
  * Função para criar um objeto XMLHTTPRequest
  */
  function CriaRequest() {
   try{
     request = new XMLHttpRequest();        
   }catch (IEAtual){

     try{
       request = new ActiveXObject("Msxml2.XMLHTTP");       
     }catch(IEAntigo){

       try{
         request = new ActiveXObject("Microsoft.XMLHTTP");          
       }catch(falha){
         request = false;
       }
     }
   }

   if (!request) 
     alert("Seu Navegador não suporta Ajax!");
   else
     return request;
 }

/**
  * Função para criar tabela e incrementa-la
  */
  function getDados() {

   var codigo   = document.getElementById("codigo").value;
   var result = document.getElementById("Resultado");
   var xmlreq = CriaRequest();

     // Iniciar uma requisição
     xmlreq.open("GET", "_class/buscar.php?codigo=" + codigo, true);

     // Atribui uma função para ser executada sempre que houver uma mudança de ado
     xmlreq.onreadystatechange = function(){

         // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
         if (xmlreq.readyState == 4) {

             // Verifica se o arquivo foi encontrado com sucesso

             if (xmlreq.status == 200) {
              if (xmlreq.responseText=="Produto não cadastrado.") {
                result.innerHTML = "<a>Produto não cadastrado.</a></br>"+table;
              }else {
                produtos.push(xmlreq.responseText);
                resultados = [];
                if (produtos.length!=0) {
                  for (var i = 0; i < produtos.length; i++) {

                    resultados.push(produtos[i].split('-',3));

                  }
                  if (resultados!=0) {
                    total = 0;
                    table = "<table class= 'table'><thead class= 'thead-dark'><tr><th scope= col >Código</th><th scope= col>Descrição</th><th scope= col>Preço</th></tr></thead><tbody><tr>";
                    for (var i = 0; i < resultados.length; i++) {
                      table += "<tr>";
                      var novo = (resultados[i]);

                      for (var j = 0; j < novo.length; j++) {
                        total += parseFloat(novo[2]);
                        table += "<td>"+
                        novo[0] + "</td><td>"+
                        novo[1] + "</td><td>"+
                        novo[2] + "</td>";
                        break;
                      }

                    }
                    table += "</tr> <h2 class='mt-4' >Venda atual: R$ "  +
                    total
                    + "</h2>"
                    result.innerHTML = table;
                  }
                }

              }

            }else{
             result.innerHTML = "Erro: " + xmlreq.statusText;
           }
         }
       };
       xmlreq.send(null);
     }

/**
  * Função para confirmar Venda
  */
  function confirmar() {
    if (produtos.length!=0) {
      for (var i = 0; i < produtos.length; i++) {

        resultados2.push(produtos[i].split('-'));
        for (var i = 0; i < resultados2.length; i++) {
          var novo = resultados2[i];
          idDoc = novo[3];
        }

      }

    }
    var xmlreq = CriaRequest();

     // Iniciar uma requisição
     xmlreq.open("GET", "_class/confirmar.php?codigo=" + idDoc+"-"+total, true);

     xmlreq.onreadystatechange = function(){

       if (xmlreq.readyState == 4) {

         if (xmlreq.status == 200) {
          xmlreq.responseText;
          document.location.reload(true);
        }
      }
    };
    xmlreq.send(null);
  }

/**
  * Função para cancelar Venda
  */
  function cancelar() {
    if (produtos.length!=0) {
      for (var i = 0; i < produtos.length; i++) {

        resultados2.push(produtos[i].split('-'));
        for (var i = 0; i < resultados2.length; i++) {
          var novo = resultados2[i];
          idDoc = novo[3];
        }

      }

    }
    var xmlreq = CriaRequest();

     // Iniciar uma requisição
     xmlreq.open("GET", "_class/cancelar.php?codigo=" + idDoc+"-"+total, true);

     xmlreq.onreadystatechange = function(){
       if (xmlreq.readyState == 4) {

         if (xmlreq.status == 200) {
          xmlreq.responseText;
          document.location.reload(true);
        }
      }
    };
    xmlreq.send(null);
  }
