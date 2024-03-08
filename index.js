
function logar(){
   var login = document.getElementById('login').value;
   var senha = document.getElementById('senha').value;

   if(login == "admin" && senha== "123"){
      
      location.href = "index.html";
      return false;

   }else{
      alert("Usuario ou senha incorretos");
   }

}


function mascara(i,t) {
   var v = i.value ;//valor atual do campo de entrada t é o seletor ex:cep
   
   if (isNaN (v[v.length-1])) {

       i.value = v.substring(0,v.length-1);

       return;        
   } 
   if(t== "cpf"){
       i.setAttribute("maxlength", "14" );

       if (v.length==3 || v.length==7) i.value += "." ;
       if(v.length == 11) i.value += "-";
      }
   if(t=="cep"){
      
       i.setAttribute("maxLength", "10" );

       if(v.length==2 ) i.value += "." ;
       if(v.length == 6) i.value += "-";
   }
   if(t=="telefone"){
      i.setAttribute("maxLength", "15" );

   if(v.length==1 ) i.value = "(" + i.value;
   if(v.length==3 ) i.value += ")" ;
   if (v.length==5) i.value += "." ;
   if (v.length==10) i.value += "-" ;
   }
}

//campos obrigatorios formulari cadastro_clientes
function campObrigatorio() {

   var cpf = document.forms["formClientes"]["cpf"].value;
   var nome = document.forms["formClientes"]["nome"].value;
   var telefone = document.forms["formClientes"]["telefone"].value;

   if(cpf == null || cpf ==""){
      alert("ops CPF precisa ser informado!");
      return false;
   }
   
   if(nome == null || nome ==""){
      alert("ops Nome precisa ser informado!");
      return false;
   }

   if(telefone == null || telefone == ""){
      alert("ops Telefone precisa ser Informado!")
      return false;
   }
   
}

