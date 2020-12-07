<template>

    <div>

        <div id="content" class="p-4 p-md-5 pt-5">
          <div class="container-fluid">
            <h5 style="margin-left: 15px;" class="mb-4">Crear grupo</h5>
            
            <div class="card">
              <div class="card-header">
                  <strong>Datos</strong> 
              </div>

              <div class="card-body card-block">
                  
                
                  <div class="form-group row" >
                    <label class="col-form-label text-right col-lg-2 col-sm-12">Nombre</label>
                    <div class=" col-lg-5 col-md-9 col-sm-12">
                    
                      <input type="text" name="nombredelacaja">
                    
                    </div>
                  </div>
                  <div class="form-group row" >
                    <label class="col-form-label text-right col-lg-2 col-sm-12">Filtrar por</label>
                    <div class=" col-lg-5 col-md-9 col-sm-12">
                    <select class="form-control select2" id="kt_select2_1" name="param">
                      <option value="dist">Todos</option>
                      <option value="dist">Conductor</option>
                      <option value="dist">Empleado</option>
                      
                    </select>
                    </div>
                  </div>

                <div th:if="${!list.isEmpty()}" style="position:relative; height:300px; overflow:auto; display:block;">
                  <h2></h2>
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
                      <td>
                          <span class="custom-checkbox">
                              <input type="checkbox" id="checkbox" name="options[]" value="1">
                          </span>

                      </td>
                        <td>1</td>
                        <td>Alva Ramirez</td>
                        <td>Empleado</td>
                        
                        
                      </tr>
        
                      <tr>
                      <td><span class="custom-checkbox">
                          <input type="checkbox" id="checkbox" name="options[]" value="1">
                      </span></td>
                        <td>2</td>
                        <td>Lulu Martinez</td>
                        <td>Conductor</td>
                        
                      </tr>
        
                      <tr>
                          <td><span class="custom-checkbox">
                              <input type="checkbox" id="checkbox" name="options[]" value="1">
                          </span></td>
                        <td>3</td>
                        <td>Juarez Perez</td>
                        <td>Empleado</td>
                        
                      </tr>

                      <tr>
                          <td><span class="custom-checkbox">
                              <input type="checkbox" id="checkbox" name="options[]" value="1">
                          </span></td>
                        <td>4</td>
                        <td>Claudia Perez</td>
                        <td>Empleado</td>
                        
                      </tr>

                      <tr>
                          <td><span class="custom-checkbox">
                              <input type="checkbox" id="checkbox" name="options[]" value="1">
                          </span></td>
                        <td>5</td>
                        <td>Sonia Sanchez</td>
                        <td>Conductor</td>
                        
                      </tr>


                      <tr>
                          <td><span class="custom-checkbox">
                              <input type="checkbox" id="checkbox" name="options[]" value="1">
                          </span></td>
                        <td>6</td>
                        <td>Rosita Suarez</td>
                        <td>Empleado</td>
                        
                      </tr>
                      <tr>
                        <td><span class="custom-checkbox">
                            <input type="checkbox" id="checkbox" name="options[]" value="1">
                        </span></td>
                      <td>7</td>
                      <td>Roger Perez</td>
                      <td>Empleado</td>
                      
                    </tr>
                    <tr>
                      <td><span class="custom-checkbox">
                          <input type="checkbox" id="checkbox" name="options[]" value="1">
                      </span></td>
                    <td>8</td>
                    <td>Teresa Mesa</td>
                    <td>Empleado</td>
                    
                  </tr>
                  <tr>
                    <td><span class="custom-checkbox">
                        <input type="checkbox" id="checkbox" name="options[]" value="1">
                    </span></td>
                  <td>9</td>
                  <td>Edgar Pino</td>
                  <td>Empleado</td>
                  
                </tr>
                <tr>
                  <td><span class="custom-checkbox">
                      <input type="checkbox" id="checkbox" name="options[]" value="1">
                  </span></td>
                <td>10</td>
                <td>Miguel Suarez</td>
                <td>Empleado</td>
                
              </tr>
        
                    </tbody>
      
                  </table>
      
                </div>
              
              
          </div>
          <div  class="card-footer" style="text-align: center;">
                <modalCancelar/>
                <modalGuardar/>
                

            </div>
            
        
        </div>

  
      </div> 
      </div> </div>
      
		
</template>

<script>
// @ is an alias to /src

import modalGuardar from '@/components/modalGuardar.vue'
import modalCancelar from '@/components/modalCancelar.vue'
export default {
  name: 'grupoCrear',
  components: {
    modalGuardar,
    modalCancelar
  }
}
</script>