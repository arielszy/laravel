//activa o desactiva el campo email en base al chechbox
//call: onclick="EnableDisableTextBox(this)"
function EnableDisableTextBox(chk) {
    var email = document.getElementById("email");
    email.disabled = chk.checked ? true : false;     
    email.value='no';

    if (!email.disabled) {
        email.focus();
        email.value='';
    }
}
//Re-enable all input elements on submit so they are all posted, even if currently disabled.
//call: onsubmit="enable(this);"
function enable(input) {
    input.querySelectorAll('input').forEach(i => i.disabled = false)

}

//pone el DNI en foco y lo selecciona
var dni =document.getElementById("dni");
if (dni) {
    dni.focus();
    dni.select();
}
//calcula los puntos ganados segun el importe ingresado
function calculaPoints(valor) {
    var Puntos=document.getElementById('Puntos');
    var Importe =document.getElementById('Importe');
    Puntos.value=Math.floor(Importe.value/valor);
}
