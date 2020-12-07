<template>

    <div id="app">
            <v-app>
                <v-main>
                    <div id="content" class="p-4 p-md-5 pt-5">
                        <h2 class="mb-4" align="center">Familias</h2>
                    
                        <div class="container-fluid">
                        
                            <div id="dataset_familias"  style="position:relative; height:270px; width: 100%; overflow:auto; display:block; text-align: center;">
                                <h2></h2>
                              <v-simple-table class="mt-5">
                                    <template v-slot:default>
                                    <table class="table table-hover">
                                    <thead>
                                      <tr class="light-blue darken-2">
                                        <th class="white--text" style="align-items: center; text-align: center;">Código de Familia</th>
                                        <th class="white--text" style="align-items: center; text-align: center;">Nombre/Titular</th>
                                        <th class="white--text" style="align-items: center; text-align: center;">Apellidos</th>
                                        <th class="white--text" style="align-items: center; text-align: center;">Direccion</th>
                                        <th class="white--text" style="align-items: center; text-align: center;">Distrito</th>
                                        <th class="white--text" style="align-items: center; text-align: center;"># Integrantes</th>
                                        <th class="white--text" style="align-items: center; text-align: center;"># Contagiados</th>
                                        <th class="white--text" style="align-items: center; text-align: center;">
                                        Acciones
                                      </th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr v-for="familia in familias" :key="familia.id_familia">
                                        <td>{{familia.id_familia}}</td>
                                        <td>{{familia.nomb_titular}}</td>
                                        <td>{{familia.apellidos}}</td>
                                        <td>{{familia.direccion}}</td>
                                        <td>{{familia.distrito}}</td>
                                        <td>{{familia.numIntegrantes}}</td>
                                        <td>{{familia.numContagiados}}</td>
                                        <td>
                                          <v-btn style="text-decoration:none" to="/detalles">Detalles</v-btn><Detalles id_familia="num_id_familia"></Detalles>
                                        </td>
                                      </tr>
                                    </tbody>
                                    </table>
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
import { mapState } from 'vuex'
import VueAxios from 'vue-axios'
import Detalles from './Detalles.vue'
var urlPHP="http://localhost/php/crudDetalles.php";
export default {
  name:'Familia',
  data(){
        return{
          familias:[],
          familia: {
            id_familia:null,
            nomb_titular:'',
            apellidos: '',
            direccion:'',
            distrito:'',
            numIntegrantes:'',
            numContagiados:''
          },
          num_id_familia:0
        }
      },
      created(){
          this.mostrar()
          
      },
      methods:{
          mostrar:function(){
            axios.post(urlPHP, {opcion:'4'})
            .then(response => {
                this.familias = response.data;
                console.log(this.familias);
            })
          },
          send:function(id){
            this.num_id_familia=id;
            console.log(this.num_id_familia);
          }
          
      }
}
</script>