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
      <input type="text" class="form-control" name="cardNumber" id="form-checkout__cardNumber" />
      <input type="text" class="form-control" name="cardExpirationMonth" id="form-checkout__cardExpirationMonth" />
      <input type="text" class="form-control" name="cardExpirationYear" id="form-checkout__cardExpirationYear" />
      <input type="text" class="form-control" name="cardholderName" id="form-checkout__cardholderName"/>
      <input type="email" class="form-control" name="cardholderEmail" id="form-checkout__cardholderEmail"/>
      <input type="text" class="form-control" name="securityCode" id="form-checkout__securityCode" />
      <select name="issuer" class="custom-select" id="form-checkout__issuer"></select>
      <select name="identificationType" class="custom-select" id="form-checkout__identificationType"></select>
      <input type="text" class="form-control" name="identificationNumber" id="form-checkout__identificationNumber"/>
      <select class="custom-select" name="installments" id="form-checkout__installments"></select>
      <div class="d-flex" style="width: 400px">
      <button type="submit" class="btn btn-success" id="form-checkout__submit">Pagar</button>
      </div>
      <progress value="0" class="progress-bar">Cargando...</progress>
      
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
       const mp = new MercadoPago('TEST-5c464343-5ec0-42c5-8c93-9d9111f2cd1d');
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
              });
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