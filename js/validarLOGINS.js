const form = document.querySelector("#form");
const nameInput = document.querySelector("#nome");
const senhaInput = document.querySelector("#senha");

form.addEventListener("submit", (event) =>{
  event.preventDefault();

    if(nameInput.value === ""){
      alert("Preencha o seu nome.");
      return;
    }

    if (!validaSenha(senhaInput.value, 6)){
      alert("Sua senha precisa ter no mínimo 6 dígitos.");
      return;
    }
    form.submit();
});

function validaSenha(senha, minDigits){
  if(senha.length >= minDigits){
     return true;
  }
 
  return false;
 }

function validacnpj(cnpj, minDigits){
  if(cnpj.length === minDigits){
     return true;
  }
 
  return false;
 }