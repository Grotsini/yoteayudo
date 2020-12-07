<template>
    <div id="app">

            <v-app>
                <v-main>
                    <div id="content" class="p-4 p-md-5 pt-5">
                        <h2 class="mb-4" align="center">Detalles de Familias</h2>
                    
                        <div class="container-fluid">
                        
                            <div id="dataset_rutas"  style="position:relative; height:270px; width: 100%; overflow:auto; display:block; text-align: center;">
                                <h2></h2>
                             <v-simple-table class="mt-5">
                                    <template v-slot:default>
                                    <table class="table table-hover">
                                    <thead>
                                      <tr class="light-blue darken-2">
                                        <th class="white--text" style="align-items: center; text-align: center;">DNI</th>
                                        <th class="white--text" style="align-items: center; text-align: center;">Nombre</th>
                                        <th class="white--text" style="align-items: center; text-align: center;">Apellido Paterno</th>
                                        <th class="white--text" style="align-items: center; text-align: center;">Apellido Materno</th>
                                        <th class="white--text" style="align-items: center; text-align: center;">Edad</th>
                                        <th class="white--text" style="align-items: center; text-align: center;">Estado de la persona</th>
                                        <th class="white--text" style="align-items: center; text-align: center;">Criticidad</th>
                                        
                              
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr v-for="persona in personas" :key="persona.id_persona">
                                        <td>{{persona.dni}}</td>
                                        <td>{{persona.nombre}}</td>
                                        <td>{{persona.apellido_pat}}</td>
                                        <td>{{persona.apellido_mat}}</td>
                                        <td>{{persona.edad}}</td>
                                        <td>{{persona.desc_ep}}</td>
                                        <td>{{persona.desc_detalle}}</td>
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
import axios from 'axios'
import VueAxios from 'vue-axios'
import Familia from './Familias.vue'

var urlPHP="http://localhost/php/crudDetalles.php";
export default {
  name:'app',
  data(){
        return{
          personas:[],
          persona: {
            id_persona:null,
            id_familia:null,
            dni: '',
            nombre:'',
            apellido_pat:'',
            apellido_mat:'',
            edad:'',
            id_ep:null,
            desc_ep:'',
            id_detalle:null,
            desc_detalle:''
          }
        }
      },
      created(){
          this.mostrar()
          
      },
      methods:{
          mostrar:function(){
            axios.post(urlPHP, {opcion:'5', id_familia:this.persona.id_familia})
            .then(response => {
                this.personas = response.data;
                console.log(this.personas);
            })
          },
          crear(id){
            this.persona.id_familia = id;
            console.log(id);
          }
      },
      props:['id_familia']

    }
</script>


