<form method="POST" id="formRegistro">
    <h3>Registrar Paciente</h3>
    <div class="contenedor-divi">
        <div class="izquierda">
            <div class="campo">
                <label for="nombre">Nombre completo</label>
                <input type="text" name="nombre" id="nombre1" placeholder="Nombre">
            </div>

            <div class="campo">
                <label for="apPat">Apellido paterno</label>
                <input type="text" name="apPat" id="apPat1" placeholder="Apellido paterno">
            </div>

            <div class="campo">
                <label for="apMat">Apellido materno</label>
                <input type="text" name="apMat" id="apMat1" placeholder="Apellido materno">
            </div>

            <div class="campo">
                <label for="rut">RUT (<em>Sin puntos y con gui&oacute;n</em>)</label>
                <input type="text" name="rut" id="rut1" placeholder="">
            </div>
        </div>
        <div class="derecha">

            <div class="campo">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" id="telefono1" placeholder="Telefono">
            </div>

            <div class="campo">
                <label for="mail">Correo electronico</label>
                <input type="email" name="mail" id="mail1" placeholder="Correo electronico">
            </div>

            <div class="campo">
                <label for="Fnac">Fecha de nacimiento</label>
                <input type="date" name="Fnac" id="Fnac1" placeholder="Fecha de nacimiento">
            </div>

            <div class="campo">
                <label for="genero">Genero</label>
                <select  id="genero1" name="genero">
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otros">Otros</option>
                </select>
            </div>
        </div>
        

        <div class="dato-adi">
            <div class="campo-domicilio">
                <div class="campo">
                    <label for="direccion">Direcci&oacute;n</label>
                    <input type="text" name="direccion" id="direccion1" placeholder="Direcci&oacute;n">
                </div>
            </div>
            <div class="contenedor-boton">
                <div class="boton-form">
                    <input class="registrar" type="submit" value="Registrar" />
                    <input type="reset" value="Borrar formulario">
                </div>
            </div>
        </div>
</form>