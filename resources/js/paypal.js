paypal.Buttons({
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '10.00'
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
            alert('Gracias por tu compra, ' + details.payer.name.given_name);
            //window.location.href = route("home"); // Redirige a otra página
            console.log(details);
            const url = route("pago-store");
            let data = {};
            data.id_transaccion = details.id;
            data.monto_pago = details.purchase_units[0].amount.value;
            data.concepto_pago = "Pago de Certificación";
            data.cursos_id = 1;
            data.metodo_pago = "PayPal";
            data.nombre_comprador = details.payer.name.given_name + " " + details.payer.name.surname;   
            data.email_comprador = details.payer.email_address;
            data.status = details.status;

            
            const requestOptions = {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: JSON.stringify(data),
            };
        
            fetch(url, requestOptions)
                .then((response) => response.json())
                .then((data) => {
                    console.log(data);
                });
          
        });
    }
}).render('#paypal-button-container');
