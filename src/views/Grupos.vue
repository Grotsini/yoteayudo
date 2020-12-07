<template>

    <div>

        <div id="content" class="p-4 p-md-5 pt-5">
          <h2 class="mb-4" align="center">Grupos de Asistencia</h2>
          
        
          <div class="container-fluid">
            <div><v-btn style="float:right; text-decoration:none" to="/grupoCrear">Crear Grupo</v-btn></div>
            <div th:if="${!list.isEmpty()}" style="position:relative; height:320px; width: 100%; overflow:auto; display:block; text-align: center;">
              <h2></h2>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th># Integrantes</th>
                    <th>Rutas asignadas</th>
                    <th></th>  <!--Detalle-->
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Cobra Kai</td>
                    <td>3</td>
                    <td>Margarita, Palmeras</td>
                    <td><router-link to="./GrupoDetalles"><img src="../../public/imagenes/mas.png" width="25px"></router-link></td>
                  </tr>

                  <tr>
                    <td>2</td>
                    <td>Grupo 2</td>
                    <td>4</td>
                    <td>Girasoles, España</td>
                    <td><router-link to="./GrupoDetalles"><img src="../../public/imagenes/mas.png" width="25px"></router-link></td>
                  </tr>

                  <tr>
                    <td>3</td>
                    <td>Grupo 3</td>
                    <td>5</td>
                    <td>San Felipe</td>
                    <td><router-link to="./GrupoDetalles"><img src="../../public/imagenes/mas.png" width="25px"></router-link></td>
                  </tr>

                  <tr>
                    <td>4</td>
                    <td>Grupo 4</td>
                    <td>5</td>
                    <td>Mexico, Carabayllo</td>
                    <td><router-link to="./GrupoDetalles"><img src="../../public/imagenes/mas.png" width="25px"></router-link></td>
                  </tr>


                </tbody>


              </table>

            </div>
          </div>
          
        </div>
     









    </div>

</template>

<script>
// @ is an alias to /src

</script>