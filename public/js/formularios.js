function mostrarFormulario(formularioId) {
    var formularios = document.querySelectorAll('.formulario');
    formularios.forEach(function (formulario) {
        formulario.style.display = 'none';
    });
    var formulario = document.getElementById(formularioId);
    formulario.style.display = 'inline-block';
}
