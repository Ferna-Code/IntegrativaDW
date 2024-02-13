<form method="POST" id="formExamen" class="formulario" >
    <h3>Registro de examen</h3>
    <div class="contenedor-divi">
        <div class="izquierda">
            <div class="campo">
                <label class="label-form">Fecha</label>
                <input class="input-form" class="element-especial" type="date" name="fecha" id="fecha" required>
            </div>

            <div class="campo">
                <label class="label-form">Nombre</label>
                <input class="input-form" type="text" name="nombre" id="nombre" required>
            </div>

            <div class="campo">
                <label class="label-form">Apellido Materno</label>
                <input class="input-form" type="text" name="apMat" id="apMat" required>

            </div>
            <div class="campo">
                <label class="label-form">Email</label>
                <input class="input-form" type="text" name="mail" id="mail" required>
            </div>
        </div>
        <div class="derecha">

            <div class="campo">
                <label class="label-form">RUT</label>
                <select class="input-form" name="rut" id="rut"></select>
            </div>
            <div class="campo">
                <label class="label-form">Apellido Paterno</label>
                <input class="input-form" type="text" name="apPat" id="apPat" required>
            </div>
            <div class="campo">
                <label class="label-form">Telefono</label>
                <input class="input-form" type="mail" name="telefono" id="telefono" required>
            </div>
            <div class="campo">
                <label class="label-form">Centro de toma de muestra</label>
                <select class="select-form" id="opciones" name="opciones">
                    <option value="MM">MM</option>
                    <option value="UM">UM</option>
                    <option value="US">US</option>
                </select>
            </div>
            
        </div>
    </div>
    <div class="dato-adi">
        <div class="campo-domicilio">
            <label class="label-form">Direccion de domicilio</label>
            <input class="input-form" type="text" name="direccion" id="direccion" required>
        </div>
        <div class="contenedor-boton">
            <div class="boton-form">
                <input class="boton-enviar" type="submit" value="Registrar examen">
                <input type="reset" class="boton-enviar" value="Borrar formulario">
            </div>
        </div>
    </div>
</form>