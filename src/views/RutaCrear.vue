<template>
    <div>

        <div id="content" class="p-4 p-md-5 pt-5">
      <h5 class="mb-4" style="margin-left: 15px;">Crear ruta</h5>



      <div class="col-lg-6" style="float:left;" >
        <div class="card">
            <div class="card-header">
                <strong>Datos</strong> 
            </div>

            <div class="card-body card-block">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                  <!-- DATOS -->

                  <!-- aqui copiar campos de formulario -->


                  <div class="form-group row" >
                    <label class="col-form-label text-right col-lg-2 col-sm-12">Zona</label>
                    <div class=" col-lg-5 col-md-9 col-sm-12">
                     <select class="form-control" name="zona" id="zona" v-model="zona">
                    <option v-for="zona of zonas" v-bind:key="zona.id">{{zona.id_zona}}</option>
                  </select>
                    </div>
                   </div>

                   
                   <div class="form-group row" >
                     <label class="col-form-label text-right col-lg-2 col-sm-12" for="start">Fecha</label>
                     <div class=" col-lg-4 col-md-9 col-sm-12">
                     <input type="date" id="start" name="trip-start"
                     value="02-10-20" placeholder="dd/mm/yyyy"
                     min="01-10-20" max="01-10-21">
                   </div>

                   <label class="col-form-label text-right col-lg-2 col-sm-12" for="appt">Hora</label>
                     <div class=" col-lg-4 col-md-9 col-sm-12">
                     <input type="time" id="appt" name="appt"
                     min="09:00" max="18:00" required>
                    </div>

                  </div>
                    
                   
                    <div class="form-group row">
                     <label class="col-form-label text-right col-lg-2 col-sm-12">Grupo</label>
                     <div class=" col-lg-4 col-md-9 col-sm-12">
                      <select class="form-control select2" id="kt_select2_1" name="param">
                       <option value="dist">x</option>
                       <option value="dist">y</option>
                       <option value="dist">z</option>
                       
                      </select>
                     </div>

                     <label class="col-form-label text-right col-lg-2 col-sm-12">Vehículo</label>
                     <div class=" col-lg-4 col-md-9 col-sm-12">
                      <select class="form-control select2" id="kt_select2_1" name="param">
                       <option value="dist">a</option>
                       <option value="dist">b</option>
                       <option value="dist">c</option>
                       <option value="dist">d</option>
                       <option value="dist">e</option>
                       
                      </select>
                     </div>


                    </div> 
                    
                    <br>

                  






                
                  <!-- TABLA -->

                  <div th:if="${!list.isEmpty()}" style="position:relative; height:200px; overflow:auto; display:block;">
                    <h2></h2>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                        <th></th>
                          <th>Id</th>
                          <th>Familia</th>
                          <th># Canastas</th>
                          <th># Kits Médicos</th>
                          <th>Dirección</th>
                          
                        </tr>
                      </thead>
          
                      <tbody>
                        <tr>
                        <td>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="checkbox" name="options[]" value="1">
                            </span>

                        </td>
                          <td>1</td>
                          <td>Alva Ramirez</td>
                          <td>2</td>
                          <td>1</td>
                          <td>Av Los Cedros</td>
                          
                        </tr>
          
                        <tr>
                        <td><span class="custom-checkbox">
                            <input type="checkbox" id="checkbox" name="options[]" value="1">
                        </span></td>
                          <td>2</td>
                          <td>Quezada Ovedo</td>
                          <td>1</td>
                          <td>3</td>
                          <td>Av Brasil 257</td>
                        </tr>
          
                        <tr>
                            <td><span class="custom-checkbox">
                                <input type="checkbox" id="checkbox" name="options[]" value="1">
                            </span></td>
                          <td>3</td>
                          <td>Juarez Perez</td>
                          <td>2</td>
                          <td>4</td>
                          <td>Jr Huaylas 286</td>
                        </tr>

                        <tr>
                            <td><span class="custom-checkbox">
                                <input type="checkbox" id="checkbox" name="options[]" value="1">
                            </span></td>
                          <td>3</td>
                          <td>Juarez Perez</td>
                          <td>2</td>
                          <td>4</td>
                          <td>Jr Huaylas 286</td>
                        </tr>

                        <tr>
                            <td><span class="custom-checkbox">
                                <input type="checkbox" id="checkbox" name="options[]" value="1">
                            </span></td>
                          <td>3</td>
                          <td>Juarez Perez</td>
                          <td>2</td>
                          <td>4</td>
                          <td>Jr Huaylas 286</td>
                        </tr>


                        <tr>
                            <td><span class="custom-checkbox">
                                <input type="checkbox" id="checkbox" name="options[]" value="1">
                            </span></td>
                          <td>3</td>
                          <td>Juarez Perez</td>
                          <td>2</td>
                          <td>4</td>
                          <td>Jr Huaylas 286</td>
                        </tr>
          
                      </tbody>
        
                    </table>
        
                  </div>

                </form>
            </div>

            <div  class="card-footer" style="text-align: center;">
                <modalCancelar/>
                <modalGuardar/>
                

            </div>
            
        
        </div>

  
      </div>

      
      <div class="col-lg-6" style="float:left;" >
        <div class="card">
            <div class="card-header">
                <strong>Mapa</strong> 
            </div>

            <div class="card-body card-block">
                
              <div class="container">

                <!-- MAPA -->
                <router-link to="./detalles" ><img src="../../public/imagenes/maps.png"  style="position: center; width: 630px;" ></router-link>

              </div>




            </div>


            


        </div>
        </div>
        </div>
    </div>
</template>

<script>
// @ is an alias to /src


import modalGuardar from '@/components/modalGuardar.vue'
import modalCancelar from '@/components/modalCancelar.vue'

export default {
  name: 'App',
  components: {
    modalGuardar,
    modalCancelar
  }
}
</script>

<style>
    
</style>