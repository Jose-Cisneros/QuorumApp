<!DOCTYPE html>
  <head>

  <link rel="stylesheet" type="text/css" href="stylesheet.css" />
  <script type="text/javascript" src="js/jquery-3.2.1.js"> </script>
  <script type="text/javascript">
    $(document).ready(function() {

        function contarPresentes(){

            $.ajax({
                type: "POST",
                url: "actualizar.php",
                success: function(data) {
                    $('#pres').text(data);
                }
            })



            var total = 92;
            var presentes= $('#pres').text();
            var ausentes= total - presentes;

            $('#aus').text(ausentes);

            if (presentes < 0){
              presentes=0;
            }

            if (presentes >= Math.trunc((total/2)+1) ){

              $('#qu').text('QUORUM');
              $('#qu').css({'color':'yellow', 'font-size':'3.8em'});
              $('#quorum').css({'border-color':'yellow'})

            } else {

              $('#qu').text('NO HAY QUORUM');
              $('#qu').css({'color':'red', 'font-size':'2.5em'});
              $('#quorum').css({'border-color':'red'})

            }
        }

        setInterval(contarPresentes, 3000);
        setInterval(hora, 3000);
    });

        function hora(){

          var tiempo = new Date();
          var hora = tiempo.getHours();
          var minuto = tiempo.getMinutes();


          minuto = minuto.toString();

          if (minuto.length == 1){

            minuto = ('0'+ minuto ) }



          $('#h').text(hora + ":" + minuto);



        }
  </script>

  </head>
  <body>

    <div id="contenido">
      <div id="fh">
        <div id="fecha"> <h1 id="f"> 8/7/2017 </h1>
        </div>
        <div id="hora">  <h1 id="h"> 12:14 </h1>
        </div>
      </div>
      <div id="quorum">

        <span id="qu"> QUORUM </span>

      </div>

      <div id="titulo">
        <h2>  Texto1 </h2>
        <h2> - Texto2 - </h2>
        <h2> - Texto3 - </h2>

      </div>

      <div id="presentes">
        <div id="pr"> <h3> Presentes: <h3> </div> <div id="pn"> <h3 id="pres"> 0 </h3> </div>
        <div id="au"> <h3> Ausentes: <h3> </div> <div id="an"> <h3 id="aus"> 0 </h3> </div>

      </div>

      <div id="logo">  </div>
      <h1 id="soft"> - QuorumApp por José Cisneros - </h1>
    </div>

  </body>
</html>
