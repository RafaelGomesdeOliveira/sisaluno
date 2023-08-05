// function verificarMinimoCaracteres() {
//   var input = document.getElementById("meuInput");
//   var valor = input.value;
//   if (valor == 'AP' || valor == 'ap' || valor == 'rp' || valor == 'RP') {
//       return true;
//   }
//   else {
//       // alert("Digite AP: Aprovado ou RP: Reprovado");
//       alert("teste");
//       return false;
//   }
//   return true;
// }

function validarInput(input) {
  var valor = input.value.toUpperCase(); // Converter o valor para letras maiúsculas
  
  if (valor !== "AP" && valor !== "RP") {
    input.setCustomValidity("Digite apenas 'AP' ou 'RP'."); // Definir uma mensagem de erro personalizada
  } else {
    input.setCustomValidity(""); // Limpar a mensagem de erro
  }
}

function mascara(i) {

  var v = i.value;

  if (isNaN(v[v.length - 1])) { // impede entrar outro caractere que não seja número
    i.value = v.substring(0, v.length - 1);
    return;
  }

  i.setAttribute("maxlength", "14");
  if (v.length == 3 || v.length == 7) i.value += ".";
  if (v.length == 11) i.value += "-";

}

function toggleCheckboxes(checkboxNumber) {
  // Desmarca todos os checkboxes exceto o que foi clicado
  for (let i = 1; i <= 2; i++) {
    if (i !== checkboxNumber) {
      document.getElementById(`checkbox${i}`).checked = false;
    }
  }
}
