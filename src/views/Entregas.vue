<template>

    <div id="app">
    <v-app>
      <v-main>
            <div id="content" class="p-4 p-md-5 pt-5">
              <h2 class="mb-4" align="center">Entregas</h2>
            
              <div class="container-fluid">
                <div>
    
                  <!-- FILTROS  -->
                  <div class="btn-group" data-toggle="buttons" style="float: left;">
                    <label class="btn btn-info">
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
    
                  <!-- BOTON  -->
                  <v-btn style="float:right; text-decoration:none" to="/EntregaCrear">Crear Entrega</v-btn>
              </div>
            
                <div id="dataset_entrega"  style="position:relative; height:270px; width: 100%; overflow:auto; display:block; text-align: center;">
                  <h2></h2>
            
                   
                    <!--<thead>
                      <tr class="bg-primary text-light">
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Grupo</th>
                        <th>Vehículo</th>
                        <th>Zona</th>
                        <th>Estado</th>
                        <th>Editar</th>
                        <th>Detalles</th>
                      </tr>
                    </thead>
    
                    <tbody>
                      <tr v-for="row in allData">
                        <td>{{row.id_ruta}}</td>
                        <td>{{row.fecha}}</td>
                        <td>{{row.hora}}</td>
                        <td>{{row.desc_grupo}}</td>
                        <th>{{row.placa}}</th>
                        <th>{{row.zonaRuta}}</th>
                        <th>{{row.desc_estado_ruta }}</th>
                        <td><button><router-link to="./rutaEditar"><img src="../../public/imagenes/editar.svg" width="25px"></router-link></button></td>
                        <td><button><router-link to="./rutaDetalles"><img src="../../public/imagenes/mas.png" width="25px"></router-link></button></td>
                      </tr>
                      <tr v-if="nodata">
                        <td colspan="2" align="center">
                          No Data Found
                        </td>
                      </tr>
                    </tbody>-->
                    <v-simple-table class="mt-5">
                      <template v-slot:default>
                        <thead>
                          <tr class="light-blue darken-2">
                            <th class="white--text" style="align-items: center; text-align: center;">
                              Id
                            </th>
                            <th class="white--text" style="align-items: center; text-align: center;">
                              Familia
                            </th>
                            <th class="white--text" style="align-items: center; text-align: center;">
                              # Canastas
                            </th>
                            <th class="white--text" style="align-items: center; text-align: center;">
                              # Kits Médicos
                            </th>
                            <th class="white--text" style="align-items: center; text-align: center;">
                              Estado
                            </th>
                            <th class="white--text" style="align-items: center; text-align: center;">
                              Acciones
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                        <tr v-for="ent in entrega" :key="ent.id_entrega">
                          <td>{{ent.id_entrega}}</td>
                          <td>{{ent.id_familia}}</td>
                          <td>{{ent.cantC}}</td>
                          <td>{{ent.cantK}}</td>
                          <td>{{ent.estado}}</td>
                          <td>
                            <v-btn>Editar</v-btn>
                            <v-btn>Eliminar</v-btn>
                          </td>
                        </tr>
                      </tbody>
                      </template>
                    </v-simple-table>
    
                  
                </div>
              </div>
    
            </div>
        
      </v-main>
    </v-app>
    
  </div>

</template>

<script>
// @ is an alias to /src



import axios from 'axios'
import VueAxios from 'vue-axios'
var urlPHP="http://localhost/php/crudEntregas.php";
export default {

      data(){
        return{
                entrega:[],
                ent: {
                  id_entrega:null,
                  id_familia:null,
                  cantC: null,
                  cantK:null,
                  estado:'',
                }
              }
      },
      created(){
          this.mostrar()
      },
      methods:{
          mostrar(){
            axios.post(urlPHP, {opcion:'4'})
            .then(response => {
                this.entrega = response.data;
                console.log(this.entrega);
            })
          }
      }
}
</script>