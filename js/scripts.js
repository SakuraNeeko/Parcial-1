document.getElementById('calcularTotal').addEventListener('click', function() {
    var total = 0;
    var cantidades = document.getElementsByClassName('cantidad');
    var precios = document.getElementsByClassName('precio');
    
    for (var i = 0; i < cantidades.length; i++) {
        var cantidad = parseInt(cantidades[i].value);
        var precio = parseFloat(precios[i].dataset.precio);
        
        if (!isNaN(cantidad) && cantidad > 0) {
            total += cantidad * precio;
        }
    }
    
    document.getElementById('total').value = total.toFixed(2);
});

