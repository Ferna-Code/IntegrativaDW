<head>
    <link rel="stylesheet" href="../../../../public/css/recepcion.css">
    <title>Recepci&oacute;n</title>
</head>
    <div class="contenedor-principal-servicios">
        <h2 class="titulo-recep">PREGUNTAS FRECUENTES</h2>
            <div class="pregunta">
            <a class="a-pregunta"href="#"onclick="respuesta(this)">¿Cuál es el horario de atención?</a>
            <p class="p-respuesta"id="resp" style="display:none;">Nuestro nuevo horario de atención es de lunes a viernes de 08:00 a 18:00 horas continuado.</p>
            </div>
            <div class="pregunta">
            <a class="a-pregunta" href="#"onclick="respuesta(this)">¿Qué tipo de servicios realizan?</a>
            <p class="p-respuesta" id="resp" style="display:none;">Biopsia, Papanicolaou y VPH</p>
            </div>
            <div class="pregunta">
            <a class="a-pregunta" href="#"onclick="respuesta(this)">¿Realizan toma de muestra?</a>
            <p class="p-respuesta" id="resp" style="display:none;">Nuestro laboratorio no realiza toma de muestra de ningún tipo, sólo procesamiento y diagnóstico de éstas.</p>
            </div>
            <div class="pregunta">
            <a class="a-pregunta" href="#"onclick="respuesta(this)">¿Tengo que tener algún cuidado con mi Biopsia, citología o Pap?</a>
            <p class="p-respuesta" id="resp" style="display:none;">Si su muestra viene en un contenedor, procure que este se 
            encuentre bien cerrado y deposítelo sobre una bolsa plástica y luego ciérrela bien, asegurándose que en caso de
             derrame, el líquido no salga de la bolsa.
            Esta muestra debe traerla de inmediato a nuestro laboratorio, si esto no es factible, manténgala en lugar seguro 
            a temperatura ambiente hasta que pueda traerla.
            Si su muestra viene en un vidrio dentro de un cartón, procure no apretarla o aplastarla sobre todo dentro
             de la cartera, ya que el vidrio es un material frágil que puede ser quebrado fácilmente.</p>
            </div>
            <div class="pregunta">
            <a class="a-pregunta" href="#"onclick="respuesta(this)">¿Qué es una biopsia?</a>
            <p class="p-respuesta" id="resp" style="display:none;">Procedimiento de análisis de laboratorio que estudia un
             tejido, una parte o un órgano completo, para establecer un diagnóstico. También se denomina estudio o diagnóstico
              histopatológico.</p>
            </div>
            <div class="pregunta">
            <a class="a-pregunta" href="#"onclick="respuesta(this)">¿Qué tengo que llevar para entregar mi examen?</a>
            <p class="p-respuesta" id="resp" style="display:none;">Para entregar su examen de Biopsia se requier su carnet de 
            identidad si usted es el paciente.</p>
            </div>
            <div class="pregunta">
            <a class="a-pregunta" href="#"onclick="respuesta(this)">¿Pueden desde el centro de toma de muestras ver mi diagnostico?</a>
            <p class="p-respuesta" id="resp" style="display:none;">Si, siempre y cuando el centro de toma de muestras tenga usuarios
            registrados en nuestro sistema</p>
            </div>
        </div>
        
    </div>
    <script>
        function respuesta(elemento){
            var respuesta = elemento.nextElementSibling;
            respuesta.style.display=(respuesta.style.display==='none' || respuesta.style.display === '')? 'block' : 'none';
        }
        
    </script>
</html>