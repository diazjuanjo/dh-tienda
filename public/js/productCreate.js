var form = document.querySelector('#formProductCreate');
var select = document.querySelector('#selectCategory');
console.log("select", select)
// console.log("form", form)

form.onsubmit = (e) => {
    if(select.options[select.selectedIndex].value == 0){
        alert('Debes elegir una Categoría')
        e.preventDefault();
    }
   // e.preventDefault();
   console.log('form enviado');
}

