<template>
    <div>

        <div id="content" class="p-4 p-md-5 pt-5" style="height: 570px;">
      <h5 class="mb-4" style="margin-left: 15px;">Grupo Cobra Kai</h5>


      <div class="col-lg-6" style="float:left;" >
        <div class="card">
            <div class="card-header">
                <strong>Datos</strong> 
            </div>

            <div class="card-body card-block">
                
                  <!-- DATOS -->


                  <!-- TABLA 1 -->
                  <div th:if="${!list.isEmpty()}" style="position:relative; float: left;"> <!--  height:200px; overflow:auto; display:block; -->
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Nombre</th>
                          <th>Tipo</th>
                          <th></th> <!-- eliminar -->
                        </tr>
                      </thead>
          
                      <tbody>

                        <tr>
                          <td>1</td>
                          <td>Carlos Alva</td>
                          <td>Conductor</td>
                          <!-- <td><a href="#myModal2" data-toggle="modal"><img src="../../public/imagenes/menos.png" width="25px"></a></td> -->
                          <td>  <div style="text-align: center;"> <modalRetirar/> </div> </td>

                        </tr>
          
                        <tr>
                          <td>2</td>
                          <td>Renzo Ramirez</td>
                          <td>Empleado</td>
                          <td style="text-align: center;"><modalRetirar/></td>
                        </tr>
          
                        <tr>
                          <td>3</td>
                          <td>Claudia Perez</td>
                          <td>Empleado</td>
                          <td style="text-align: center;"><modalRetirar/></td>
                        </tr>

                        <tr>
                          <td>4</td>
                          <td>Paolo Juarez</td>
                          <td>Empleado</td>
                          <td style="text-align: center;"><modalRetirar/></td>
                        </tr>

                        <tr>
                          <td>5</td>
                          <td>Piero Juarez</td>
                          <td>Empleado</td>
                          <td style="text-align: center;"><modalRetirar/></td>
                        </tr>

                  
                      </tbody>
        
                    </table>

                    <div style="text-align: center;">
                      <modalAgregar/>
                    </div>
        
                  </div>

                  

                  <!-- TABLA 2 -->
                  <div th:if="${!list.isEmpty()}" style="position:relative; height:300px; overflow:auto; display:block; float: right;">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Rutas asignadas</th>
                        </tr>
                      </thead>
          
                      <tbody>
                        <tr> <td><span class="custom-checkbox">
                          <input type="checkbox" id="checkbox" name="options[]" value="1">
                      </span></td> <td>Margarita</td> </tr>
                        <tr> <td><span class="custom-checkbox">
                          <input type="checkbox" id="checkbox" name="options[]" value="1">
                      </span></td> <td>Palmeras</td> </tr>
                        <tr> <td><span class="custom-checkbox">
                          <input type="checkbox" id="checkbox" name="options[]" value="1">
                      </span></td> <td>Girasoles</td> </tr>
                      </tbody>
                    </table>


                    <div style="text-align: center;">
                    <button class="fill" style="border-radius:7px;"><router-link to="./Grupos">Volver</router-link></button>
                  </div>
                  

                  </div>


                  


            </div>



            
        </div>
      </div>

    

      
      <div class="col-lg-6" style="float:left" >
        <div class="card">

            <div class="card-header">
                <strong>Mapa</strong> 
            </div>

            <div class="card-body card-block">
              <div class="container">
                <!-- MAPA -->
                <img src="../../public/imagenes/maps.png"  style="position: center; width: 570px; height: 350px;">

              </div>
            </div>

        </div>
      </div>
      


     






      
        

    </div>







    </div>
</template>

<script>
// @ is an alias to /src

import modalAgregar from '@/components/modalAgregar.vue'
import modalRetirar from '@/components/modalRetirar.vue'

export default {
  name: 'rutaCrear',
  components: {
    modalAgregar,
    modalRetirar
  }
}
</script>

<style>
    
</style>