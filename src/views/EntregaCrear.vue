<template>
    <div>
        
        <div id="content" class="p-4 p-md-5 pt-5">
      <h5 style="margin-left: 15px;" class="mb-4">Crear entrega</h5>

      
      <div class="col-lg-6" style="float:left;" >
        <div class="card">
            <div class="card-header">
                <strong>Datos</strong> 
            </div>

            <div class="card-body card-block">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                  <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="multiple-select" class=" form-control-label">Nombre de la familia</label>
                    </div>
                    <div class="col col-md-9">
                        <select name="multiple-select" id="multiple-select" multiple="" class="form-control">
                            <option value="1">Alva Acosta</option>
                            <option value="2">Valdivia Salas</option>
                            <option value="3">Silva Rojas</option>
                            <option value="4">Ramos Acosta</option>
                            <option value="5">Perez Juarez</option>
                        </select>
                    </div>


                  </div>


                  <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Cantidad de canastas</label>
                    </div>
                    <div class="col col-md-9">
                        <div class="form-check-inline form-check">
                            <label for="inline-radio1" class="form-check-label ">
                                <input type="radio" id="inline-radio1" name="inline-radios" value="option1" class="form-check-input">1  
                            </label>
                            <label for="inline-radio2" class="form-check-label ">
                                <input type="radio" id="inline-radio2" name="inline-radios" value="option2" class="form-check-input">2
                            </label>
                            <label for="inline-radio3" class="form-check-label ">
                                <input type="radio" id="inline-radio3" name="inline-radios" value="option3" class="form-check-input">3
                            </label>
                            <label for="inline-radio4" class="form-check-label ">
                                <input type="radio" id="inline-radio3" name="inline-radios" value="option4" class="form-check-input">4
                            </label>
                            <label for="inline-radio5" class="form-check-label ">
                                <input type="radio" id="inline-radio3" name="inline-radios" value="option5" class="form-check-input">5
                            </label>
                          </div>
                      </div>
                  </div>

                  <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Cantidad de kits médicos</label>
                    </div>
                    <div class="col col-md-9">
                        <div class="form-check-inline form-check">
                            <label for="inline-radio1" class="form-check-label ">
                                <input type="radio" id="inline-radio1" name="inline-radios2" value="option1" class="form-check-input">1  
                            </label>
                            <label for="inline-radio2" class="form-check-label ">
                                <input type="radio" id="inline-radio2" name="inline-radios2" value="option2" class="form-check-input">2
                            </label>
                            <label for="inline-radio3" class="form-check-label ">
                                <input type="radio" id="inline-radio3" name="inline-radios2" value="option3" class="form-check-input">3
                            </label>
                            <label for="inline-radio4" class="form-check-label ">
                                <input type="radio" id="inline-radio3" name="inline-radios2" value="option4" class="form-check-input">4
                            </label>
                            <label for="inline-radio5" class="form-check-label ">
                              <input type="radio" id="inline-radio3" name="inline-radios2" value="option5" class="form-check-input">5
                          </label>
                        </div>
                      </div>
                  </div>

                </form>
            </div>


            <div class="card-footer" style="text-align: center;">
                <modalGuardar />
                <modalCancelar />
            </div>


        </div>

    <br />
      </div>

  
      <div class="col-lg-6" style="float:left;" >
        <div class="card">
            <div class="card-header">
                <strong>Integrantes</strong> 
            </div>

            <div class="card-body card-block">
                
              <div class="container">

                <div th:if="${!list.isEmpty()}">
                  <h2></h2>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>DNI</th>
                        <th>Nombre Completo</th>
                        <th>Edad</th>
                        <th>Estado</th>
                        <th>Detalle</th>
                      </tr>
                    </thead>
        
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>76349867</td>
                        <td>Jesus Alva Salas</td>
                        <td>52</td>
                        <td>Negativo</td>
                        <td>-</td>
                      </tr>

                      <tr>
                        <td>2</td>
                        <td>76349867</td>
                        <td>Luciana Acosta Torres</td>
                        <td>52</td>
                        <td>Positivo</td>
                        <td>-</td>
                      </tr>

                      <tr>
                        <td>3</td>
                        <td>76349867</td>
                        <td>Luis Alva Acosta</td>
                        <td>52</td>
                        <td>Positivo</td>
                        <td>-</td>
                      </tr>

                      
        
                    </tbody>
                  </table>
                </div>
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