
const paymentForm = document.getElementById('paymentForm');
document.getElementById("btnpay").addEventListener("click", function() {
  payWithPaystack(this.getAttribute("data-charge"));
  // Assuming payWithPaystack triggers payment processing
});

// paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(charge) {
  console.log('payWithPaystack function executed with amount:', charge);
  // e.preventDefault();

  let handler = PaystackPop.setup({
    key: 'pk_test_32dae90eb11a74e658d23dac87baea8d23065f87',
    email: document.getElementById("email-address").value,
    amount: charge = document.getElementById("charge").value * 100,
    currency: 'NGN',
    ref: '' + Math.floor((Math.random() * 1000000000) + 1),
    
    onClose: function(){
      alert('Payment canceled by user.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
    }

  });

  handler.openIframe();

  handler.callback = function(response) {
    insertPaymentDetails(charge, response.reference); // Pass charge and payment reference to the function
  };

}

function insertPaymentDetails(charge, reference) {
  var xhr = new XMLHttpRequest();
  var url = "process_payment.php"; // Your PHP script to handle insertion

  // Prepare the data to be sent
  var data = new FormData();
  data.append('charge', charge);
  data.append('payment_reference', reference);

  // Set up the AJAX request
  xhr.open("POST", url, true);
  xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
          // Request successful, handle response if needed
          console.log(xhr.responseText);
      }
  };

  // Send the request
  xhr.send(data);
}


// function payWithPaystack(charge) {
//   // Retrieve necessary information
//   const email = document.getElementById("email-address").value;
//   const therapist = document.getElementById("therapist").value;

//   // Generate a unique reference
//   const reference = '' + Math.floor((Math.random() * 1000000000) + 1);

//   // Make an asynchronous call to the process_payment.php script
//   fetch('process_payment.php', {
//     method: 'POST',
//     headers: {
//       'Content-Type': 'application/x-www-form-urlencoded',
//     },
//     body: `payment_reference=${reference}&therapist=${therapist}&patients_email=${email}&charge=${charge}`,
//   })
//   .then(response => response.text())
//   .then(data => {
//     console.log(data); // Log the response from the server
//     // Continue with Paystack integration
//     let handler = PaystackPop.setup({
//       key: 'pk_test_32dae90eb11a74e658d23dac87baea8d23065f87',
//       email: email,
//       amount: charge * 100,
//       currency: 'NGN',
//       ref: reference,
//       onClose: function(){
//         alert('Payment canceled by user.');
//       },
//       callback: function(response){
//         let message = 'Payment complete! Reference: ' + response.reference;
//         alert(message);
//       }
//     });

//     handler.openIframe();
//   })
//   .catch(error => {
//     console.error('Error:', error);
//     alert('Error processing payment. Please try again.');
//   });
// }




