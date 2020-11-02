<template>

    <div>
        
        <div id="content" class="p-4 p-md-5 pt-5">
          <h2 class="mb-4" align="center">Entregas</h2>
        <br />
   
          <div class="container">

            <div class="btn-group" data-toggle="buttons" style="float: left;">
              <label class="btn btn-info active">
                  <input type="radio" name="status" value="all" checked="checked"> Todas
              </label>
              <label class="btn btn-success">
                  <input type="radio" name="status" value="active"> Completa
              </label>
              <label class="btn btn-warning">
                  <input type="radio" name="status" value="inactive"> Pendiente
              </label>
              <label class="btn btn-danger">
                  <input type="radio" name="status" value="expired"> Incompleta
              </label>			
              
              
          </div>

          <div style="text-align: right;margin-right: 0px;float:right">
            <button class="up" style="border-radius: 7px;" ><router-link to="./entregaCrear">Crear Entrega</router-link></button>
          </div>

            <div th:if="${!list.isEmpty()}" style="position:relative; height:270px; width: 100%; overflow:auto; display:block; text-align: center;">
              <h2></h2>
              
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Familia</th>
                    <th># Canastas</th>       
                    <th># Kits Médicos</th>
                    <th>Estado</th>
                    <th></th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>1</td>
                    <td>A</td>
                    <td>5</td>
                    <td>2</td>
                    <th>-</th>
                    <td><router-link to="./entregaEditar"><img src="../../public/imagenes/editar.svg" width="25px"></router-link></td>
                  </tr>

                  <tr>
                    <td>2</td>
                    <td>B</td>
                    <td>3</td>
                    <td>2</td>
                    <th>-</th>
                    <td><router-link to="./entregaEditar"><img src="../../public/imagenes/editar.svg" width="25px"></router-link></td>
                  </tr>

                  <tr>
                    <td>3</td>
                    <td>C</td>
                    <td>3</td>
                    <td>3</td>
                    <th>-</th>
                    <td><router-link to="./entregaEditar"><img src="../../public/imagenes/editar.svg" width="25px"></router-link></td>
                  </tr>

                  <tr>
                    <td>4</td>
                    <td>D</td>
                    <td>4</td>
                    <td>2</td>
                    <th>-</th>
                    <td><router-link to="./entregaEditar"><img src="../../public/imagenes/editar.svg" width="25px"></router-link>
                    
                    </td>
                  </tr>

                  <tr>
                    <td>4</td>
                    <td>D</td>
                    <td>4</td>
                    <td>2</td>
                    <th>-</th>
                    <td><router-link to="./entregaEditar"><img src="../../public/imagenes/editar.svg" width="25px"></router-link>
                    
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>D</td>
                    <td>4</td>
                    <td>2</td>
                    <th>-</th>
                    <td><router-link to="./entregaEditar"><img src="../../public/imagenes/editar.svg" width="25px"></router-link>
                    
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>D</td>
                    <td>4</td>
                    <td>2</td>
                    <th>-</th>
                    <td><router-link to="./entregaEditar"><img src="../../public/imagenes/editar.svg" width="25px"></router-link>
                    
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>D</td>
                    <td>4</td>
                    <td>2</td>
                    <th>-</th>
                    <td><router-link to="./entregaEditar"><img src="../../public/imagenes/editar.svg" width="25px"></router-link>
                    
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>D</td>
                    <td>4</td>
                    <td>2</td>
                    <th>-</th>
                    <td><router-link to="./entregaEditar"><img src="../../public/imagenes/editar.svg" width="25px"></router-link>
                    
                    </td>
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