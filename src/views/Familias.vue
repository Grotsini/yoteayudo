<template>

    <div>
        
        <div id="content" class="p-4 p-md-5 pt-5">
          <h2 class="mb-4" align="center">Familias</h2>
        
          <div class="container">

            <div th:if="${!list.isEmpty()}" style="position:relative; height:320px; width: 100%; overflow:auto; display:block; text-align: center;">
              <h2></h2>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                    <th>Zona</th>
                    <th># Integrantes</th>
                    <th># Contagiados</th>
                    <th></th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Jesus Alva Ramirez</td>
                    <td>Av Los Cedros</td>
                    <td>007</td>
                    <td>5</td>
                    <td>1</td>
                   
               <!--     <td><a class="btn btn-danger">Detalles</a></td>
                    <td><a href="" class="btn btn-info">Detalles</a></td>  -->
                    <td><router-link to="./detalles"><img src="../../public/imagenes/mas.png" width="25px"></router-link></td>
                  </tr>

                  <tr>
                    <td>2</td>
                    <td>Maria Quezada Ovedo</td>
                    <td>Av Brasil 257</td>
                    <td>002</td>
                    <td>6</td>
                    <td>1</td>
                    <td><router-link to="./Detalles.vue"><img src="../../public/imagenes/mas.png" width="25px"></router-link></td>
                  </tr>

                  <tr>
                    <td>3</td>
                    <td>Maria Quezada Ovedo</td>
                    <td>Av Brasil 257</td>
                    <td>004</td>
                    <td>6</td>
                    <td>1</td>
                    <td><router-link to="./Detalles.vue"><img src="../../public/imagenes/mas.png" width="25px"></router-link></td>
                  </tr>

                  <tr>
                    <td>4</td>
                    <td>Martina Rojas Tineo</td>
                    <td>Jr Huaylas 286</td>
                    <td>001</td>
                    <td>4</td>
                    <td>0</td>
                    <td><router-link to="./Detalles.vue"><img src="../../public/imagenes/mas.png" width="25px"></router-link></td>
                  </tr>

                  <tr>
                    <td>4</td>
                    <td>Martina Rojas Tineo</td>
                    <td>Jr Huaylas 286</td>
                    <td>006</td>
                    <td>4</td>
                    <td>0</td>
                    <td><router-link to="./Detalles.vue"><img src="../../public/imagenes/mas.png" width="25px"></router-link></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Martina Rojas Tineo</td>
                    <td>Jr Huaylas 286</td>
                    <td>Comas</td>
                    <td>4</td>
                    <td>0</td>
                    <td><router-link to="./Detalles.vue"><img src="../../public/imagenes/mas.png" width="25px"></router-link></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Martina Rojas Tineo</td>
                    <td>Jr Huaylas 286</td>
                    <td>Comas</td>
                    <td>4</td>
                    <td>0</td>
                    <td><router-link to="./Detalles.vue"><img src="../../public/imagenes/mas.png" width="25px"></router-link></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Martina Rojas Tineo</td>
                    <td>Jr Huaylas 286</td>
                    <td>Comas</td>
                    <td>4</td>
                    <td>0</td>
                    <td><router-link to="./Detalles.vue"><img src="../../public/imagenes/mas.png" width="25px"></router-link></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Martina Rojas Tineo</td>
                    <td>Jr Huaylas 286</td>
                    <td>Comas</td>
                    <td>4</td>
                    <td>0</td>
                    <td><router-link to="./Detalles.vue"><img src="../../public/imagenes/mas.png" width="25px"></router-link></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Martina Rojas Tineo</td>
                    <td>Jr Huaylas 286</td>
                    <td>Comas</td>
                    <td>4</td>
                    <td>0</td>
                    <td><router-link to="./Detalles.vue"><img src="../../public/imagenes/mas.png" width="25px"></router-link></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Martina Rojas Tineo</td>
                    <td>Jr Huaylas 286</td>
                    <td>Comas</td>
                    <td>4</td>
                    <td>0</td>
                    <td><router-link to="./Detalles.vue"><img src="../../public/imagenes/mas.png" width="25px"></router-link></td>
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