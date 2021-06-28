<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{asset('js/app.js')}}"></script>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>API MercadoPago humilde </title>
</head>

<body>
   @include('layouts.headerVisitante')   
   <!-- Step #2 -->
   <div class="container">
     <form id="form-checkout" class="d-flex" method="POST">
      @csrf
      <input type="text" value = "5031755734530604" class="form-control" name="cardNumber" id="form-checkout__cardNumber" />
      <input type="text" value ="11" class="form-control" name="cardExpirationMonth" id="form-checkout__cardExpirationMonth" />
      <input type="text" value = "25" class="form-control" name="cardExpirationYear" id="form-checkout__cardExpirationYear" />
      <input type="text" value = "Prueba" class="form-control" name="cardholderName" id="form-checkout__cardholderName"/>
      <input type="email" value = "test_user_32127025@testuser.com" class="form-control" name="cardholderEmail" id="form-checkout__cardholderEmail"/>
      <input type="text" class="form-control" value = "123" name="securityCode" id="form-checkout__securityCode" />
      <select name="issuer" class="custom-select" id="form-checkout__issuer"></select>
      <select name="identificationType" class="custom-select" id="form-checkout__identificationType"></select>
      <input type="text" value = "11111111" class="form-control" name="identificationNumber" id="form-checkout__identificationNumber"/>
      <select class="custom-select" name="installments" id="form-checkout__installments"></select>
      <div class="d-flex" style="width: 400px">
      <button type="submit" class="btn btn-success" id="form-checkout__submit">Pagar</button>
      </div>
      <progress value="0" class="progress-bar">Cargando...</progress>
      <p><b>Estado: </b><span id="payment-status"></span></p>
      <p><b>Detalle: </b><span id="payment-detail"></span></p>
      
      <input type="hidden" name="total" id="total" value = "{{$total}}" />   
      
    </form>
  <div>

  <style type="text/css">
    input, select, progress{     
      margin: 0.8em;
      min-width:100px;
      width: 400px;

    }

    #form-checkout{
      flex-direction: column;
      align-items: center;
    }

  </style>

<script>    
       var total = document.getElementById('total').value;
       const mp = new MercadoPago('TEST-a2ac55fc-ea02-4a16-8106-a2d56b0c7386');
       const cardForm = mp.cardForm({
          amount: total,
          autoMount: true,
          form: {           
            id: "form-checkout",
            cardholderName: {
              id: "form-checkout__cardholderName",
              placeholder: "Titular de la tarjeta",
            },
            cardholderEmail: {
              id: "form-checkout__cardholderEmail",
              placeholder: "E-mail",
            },
            cardNumber: {
              id: "form-checkout__cardNumber",
              placeholder: "Número de la tarjeta",
            },
            cardExpirationMonth: {
              id: "form-checkout__cardExpirationMonth",
              placeholder: "Mes de vencimiento",
            },
            cardExpirationYear: {
              id: "form-checkout__cardExpirationYear",
              placeholder: "Año de vencimiento",
            },
            securityCode: {
              id: "form-checkout__securityCode",
              placeholder: "Código de seguridad",
            },
            installments: {
              id: "form-checkout__installments",
              placeholder: "Cuotas",
            },
            identificationType: {
              id: "form-checkout__identificationType",
              placeholder: "Tipo de documento",
            },
            identificationNumber: {
              id: "form-checkout__identificationNumber",
              placeholder: "Número de documento",
            },
            issuer: {
              id: "form-checkout__issuer",
              placeholder: "Banco emisor",
            },
          },
          callbacks: {
            onFormMounted: error => {
              if (error) return console.warn("Form Mounted handling error: ", error);
              if (error) return alert(error);
              console.log("Form mounted");
            },
            onSubmit: event => {
              event.preventDefault();
              const {
                paymentMethodId: payment_method_id,
                issuerId: issuer_id,
                cardholderEmail: email,
                amount,
                token,
                installments,
                identificationNumber,
                identificationType,
              } = cardForm.getCardFormData();
              fetch("process_payment", {
                method: "POST",
                headers: {
                  "Content-Type": "application/json",                  
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                body: JSON.stringify({
                  token,
                  issuer_id,
                  payment_method_id,
                  transaction_amount: Number(amount),
                  installments: Number(installments),
                  description: "Descripción del producto",
                  payer: {
                    email,
                    identification: {
                      type: identificationType,
                      number: identificationNumber,
                    },
                  },
                }),
              })
              .then(response => {
                    return response.json();
                })
              .then(result => {
                    if(result.status === "approved" && result.status_detail === "accredited"){
                      document.getElementById("payment-status").innerText = "aprobado";
                      document.getElementById("payment-detail").innerText = "acreditado";
                    }else{
                      document.getElementById("payment-status").innerText = "error";
                      document.getElementById("payment-detail").innerText = "error"
                    }  
                                    
                    $('.container__payment').fadeOut(500);
                    setTimeout(() => { $('.container__result').show(500).fadeIn(); }, 500);
                })
                .catch(error => {
                    alert("Unexpected error\n"+JSON.stringify(error));
                });;
            },
            onFetching: (resource) => {
              console.log("Fetching resource: ", resource);
              // Animate progress bar
              const progressBar = document.querySelector(".progress-bar");
              progressBar.removeAttribute("value");
              return () => {
                progressBar.setAttribute("value", "0");
              };
            },
          },
        });

   </script>
</body>



</html>

