//Para btn "Comprar"
const compraButtons = document.querySelectorAll('.compra-btn');
const compraCodigo = document.querySelector('#compra-codigo');
const compraNombre = document.querySelector('#compra-nombre');
const compraPrecio = document.querySelector('#compra-precio');
const compraExistencias = document.querySelector('#compra-existencias');
const inputCantidad = document.querySelector('#cantidad');

compraButtons.forEach(button => {
    button.addEventListener('click', () => {
        compraNombre.textContent = button.getAttribute('data-nombre');
        compraPrecio.textContent = button.getAttribute('data-precio');
        compraExistencias.textContent = "/"+button.getAttribute('data-existencias');
        compraCodigo.value = button.getAttribute('data-codigo');
        inputCantidad.max = button.getAttribute('data-existencias');
    });
});