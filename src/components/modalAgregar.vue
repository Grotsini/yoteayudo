<template>

    <div>
        <div v-if="showModal">
        <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
            <div class="modal-dialog modal2-confirm" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    
                    				
                    <h4 class="modal-title w-100">Agregar integrante</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" @click="showModal = false">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- 
                    <p v-if="path==='/rutaCrear' || path==='/rutaEditar'" class="text-center">Filtrar por:</p>
                    <p v-else class="text-center">Filtrar por:</p>
                    -->

                    <div class="form-group row" >
                            <label class="col-form-label text-right col-lg-3 col-sm-12" style="margin-left: 90px;">Filtrar por:</label>
                            <div class=" col-lg-5 col-md-9 col-sm-12">
                             <select class="form-control select2" id="kt_select2_1" name="param">
                              <option value="dist">Todos</option>
                              <option value="dist">Conductor</option>
                              <option value="dist">Empleado</option>
                             </select>
                            </div>
                           </div>    

                    <!-- tabla de integrantes -->

                    <table class="table table-hover">
                            <thead>
                              <tr>
                                <th></th>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Tipo</th>
                              </tr>
                            </thead>
                
                            <tbody>
      
                              <tr>
                                <td><span class="custom-checkbox">
                                  <input type="checkbox" id="checkbox" name="options[]" value="1">
                              </span></td>
                                <td>1</td>
                                <td>Carlos Alva</td>
                                <td>Conductor</td>
                                </tr>
                
                              <tr>
                                <td><span class="custom-checkbox">
                                  <input type="checkbox" id="checkbox" name="options[]" value="1">
                              </span></td>
                                <td>2</td>
                                <td>Renzo Ramirez</td>
                                <td>Empleado</td>
                                </tr>
                
                              <tr>
                                <td><span class="custom-checkbox">
                                  <input type="checkbox" id="checkbox" name="options[]" value="1">
                              </span></td>
                                <td>3</td>
                                <td>Claudia Perez</td>
                                <td>Empleado</td>
                                </tr>
      
                              <tr>
                                <td><span class="custom-checkbox">
                                  <input type="checkbox" id="checkbox" name="options[]" value="1">
                              </span></td>
                                <td>4</td>
                                <td>Paolo Juarez</td>
                                <td>Empleado</td>
                                </tr>
      
                              <tr>
                                <td><span class="custom-checkbox">
                                  <input type="checkbox" id="checkbox" name="options[]" value="1">
                              </span></td>
                                <td>5</td>
                                <td>Piero Juarez</td>
                                <td>Empleado</td>
                                </tr>
      
                        
                            </tbody>
              
                          </table>


                </div>
            
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" @click="showModal = false">No</button>
                    <button type="button" class="btn btn-success"><router-link to="./grupos">Sí</router-link> </button>
                </div>


                </div>
            </div>
            </div>
        </div>
        </transition>
    </div>
    
    <button @click="showModal = true"><img src="../../public/imagenes/mas.png" width="25px"></button>






    </div>
</template>


<script>
export default {
    data () {
        return {
            showModal: false,
            path: location.pathname
        }
    }
}
</script>