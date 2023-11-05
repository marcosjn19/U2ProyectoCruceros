window.paypal
  .Buttons({
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{"description":"LA DESCRIPCION DE TU PRODUCTO","amount":{"currency_code":"USD","value":13}}]
      });
    },

    onApprove: function(data, actions) {
      return actions.order.capture().then(function(orderData) {
        
        // Full available details
        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

actions.redirect('https://atlanticruiser.website/index.php');
        
      });
    },

    onError: function(err) {
      console.log(err);
    }
  }).render('#paypal-button-container');

initPayPalButton();
