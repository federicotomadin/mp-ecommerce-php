<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.mercadopago.com/v2/security.js" view="home"></script>

    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

    <title>Notificacion pago extitoso</title>
</head>
<body>

    <div class="container">
     
        <h3 id="webhook"></h3><br>     
   
 </div>

       <script>    

          <?php
         
         if (http_response_code() == 200) {

            $data = json_decode(file_get_contents('php://input'), true);

         }
         ?>

            var statusCode = "<?php echo http_response_code()?>";
            var id = "<?php echo  $data["id"]?>";
            var user_id = "<?php echo  $data["user_id"]?>";
            var application_id = "<?php echo  $data["application_id"]?>";
            var id = "<?php echo  $data["id"]?>";
            var live_mode = "<?php echo  $data["live_mode"]?>";
            var type = "<?php echo  $data["type"]?>";
            var api_version = "<?php echo  $data["api_version"]?>";
            var action = "<?php echo  $data["action"]?>";
            var date_created = "<?php echo  $data["date_created"]?>";
            var payment_id = "<?php echo  $data["data"]["id"]?>";
            payment_id = '999999999'

            var urlEnviar = 'https://api.mercadopago.com/v1/payments/' + payment_id + '?access_token=APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398'

            $.ajax({
                type: 'GET',
                dataType: 'json',
                data:  JSON.stringify({"STATUS": 200}), 
                url: urlEnviar,
                beforeSend: function (xhrObj) {
                    xhrObj.setRequestHeader("x-integrator-id","dev_24c65fb163bf11ea96500242ac130004");
                    xhrObj.setRequestHeader("Accept","*/*");
                    xhrObj.setRequestHeader("Content-type","application/json");                       
                },
                success:  function (response) {     
                   localStorage.setItem('aviso pago webhook', date_created);                        
                },
                error: function( jqXHR, textStatus, errorThrown) {
                    localStorage.setItem('Error en webhook', date_created); }
            });


    </script>

    
</body>
</html>