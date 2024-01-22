const tag_total = document.getElementById("total");
const total = tag_total.textContent;

const tag_id = document.getElementById("id");
const id = tag_id.textContent;

const tag_cant = document.getElementById("cant");
const cant = tag_cant.textContent;

paypal.Buttons({
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units : [{
                amount: {
                    'value': total,
                    'currency': 'MXN'
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            console.log(details)
            window.location.replace("http://localhost:3000/confirmar_pedido.php?payed="+"1"+"&id="+id+"&cant="+cant)
        })
    },
    onCancel: function (data) {
        window.location.replace("http://localhost:3000/confirmar_pedido.php?payed="+"2"+"&id="+id+"&cant="+cant)
    }
}).render('#paypal-payment-button');