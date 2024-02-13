## Uso de Git y Rebase con la rama develop

Al trabajar con Git y necesitar hacer un rebase con la rama `develop`, sigue estos pasos:

**Hacer commit push desde su rama:**

1. **Ver los cambios realizados:**

   ```bash
   git status
   ```

2. **Agregar los cambios locales::**

   ```bash
   #Para agregar todos los archivos
   git add .

   #Para agregar un solo archivo
   git add <ruta del archivo>
   ```

3. **Crear el commit con los cambios locales::**

   ```bash
   git commit -m '<aqui su mensaje>'
   ```

4. **Enviar los cambios con push::**

   ```bash
   git push
   ```


**Actualizar la rama develop y la rama de trabajo:**

1. **Actualizar la rama develop:**

   ```bash
   git checkout develop
   git pull
   git checkout feature/<nombre_de_tu_rama>
   ```

2. **Verificar cambios pendientes::**

   ```bash
   git status
   ```

3. **Realizar el rebase con develop::**

   ```bash
   git rebase develop
   ```

4. **Hacer push forzado si no hay conflictos::**

   ```bash
   git push -f origin feature/<nombre_de_tu_rama>
   ```

5. **Resolver conflictos::**
   ```bash
   Si encuentras conflictos, contacta a un colaborador para ayudarte a resolverlos.
   ```

**Estructura:**
   ```bash
   /htdocs
      /App
         /Controllers
         /DAO
         /Models
         /Router
         /Views
      /public
         /css
         /img
         /js
   ```


### Controllers

<hr>

- AccesoClienteController.php
- AdminController.php
- DiagnosticoController.php
- Error.php
- HomeController.php
- PreguntasController.php
- RecepcionController.php
- ServiciosController.php
- TincionController.php

<hr>

### DAO

<hr>

- Administracion
- Diagnostico
- Recepcion
- Tincion
- User

<hr>

### Models

<hr>

- Access_model_.php
- Admin_model_.php
- CentroDeTomas_model_.php
- Error_model.php
- Examen_model_.php
- Insert_model_.php
- Paciente_model_.php
- Tincion_model_.php
- Usuario_model_.php

<hr>

### Views

<hr>

- AccesoCliente
- Admin
- Diagnostico
- Error
- Home
- Layout
- PreguntasFrecuentes
- Recepcion
- Servicios
- Tincion

<hr>
