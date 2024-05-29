<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Incluir el script de PayPal con tus credenciales -->
    <script src="https://sandbox.paypal.com/sdk/js?client-id=AbWoyox2kzpSNwZm-EQwbL6nY5c-lOKN9FxWFTvwO1iNgGCfjpiEeMFclPZE8ChNiqAprJhmqvfepOOy"></script>
</head>
<body>
    <!-- Agregar un contenedor para el botón de PayPal -->
    <div id="paypal-button-container"></div>

    <!-- Script para renderizar el botón de PayPal -->
    <script>
        paypal.Buttons({
            style:{
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
            createOrder: function(data, actions){
                return actions.order.create({
                    purchase_units: [{  // Corregido aquí, reemplazando paréntesis con corchetes
                        amount: {
                            value: '100'
                        }
                    }]
                });
            },
            onApprove: function(data, actions){
                actions.order.capture().then(function(detalles){
                    window.location.href="completado.html"
                });
            },
            onCancel: function(data){
                alert("Pago Cancelado")
                console.log(data)
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>
