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
                    <option v-for="zona of zonas" v-bind:key="zona.id">{{zona.desc_zona}}</option>
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
                      <select class="form-control" name="grupo" id="grupo" v-model="grupo">
                      <option v-for="grupo of grupos" v-bind:key="grupo.id">{{grupo.desc_grupo}}</option>
                    </select>
                     </div>

                     <label class="col-form-label text-right col-lg-2 col-sm-12">Vehículo</label>
                     <div class=" col-lg-4 col-md-9 col-sm-12">
                      <select class="form-control" name="vehiculo" id="vehiculo" v-model="vehiculo">
                      <option v-for="vehiculo of vehiculos" v-bind:key="vehiculo.id">{{vehiculo.placa}}</option>
                    </select>
                     </div>


                    </div> 
                    
                    <br>

                  






                
                  <!-- TABLA -->

                  <div th:if="${!list.isEmpty()}" style="position:relative; height:200px; overflow:auto; display:block;">
                    <v-simple-table class="mt-5">
                      <template v-slot:default>
                        <thead>
                          <tr class="light-blue darken-2">
                            <th class="white--text" style="align-items: center; text-align: center;">
                              Id
                            </th>
                            <th class="white--text" style="align-items: center; text-align: center;">
                              Familia</th>
                          
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="familia in familias" :key="familia.id">
                            <td style="align-items: center; text-align: center;">{{familia.id_familia}}</td>
                            <td style="align-items: center; text-align: center;">{{familia.apellidos}}</td> 
                          </tr>
                        </tbody>
                      </template>
                    </v-simple-table>
        
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
import axios from "axios";
    //import vuetify from "Vuetify";
var urlPHP="http://localhost/php/crudRutas.php";
export default {
    name:'App',
    components: {
      modalGuardar,
      modalCancelar
    },
    data() {
      return{
        zonas:[],
        zona: {
          id_zona: null,
          desc_zona:''
        },
        grupos:[],
        grupo:{
          id_grupo: null,
          desc_grupo: '',
          numIntegrantes:null
        },
        vehiculos:[],
        vehiculo:{
          id_vehiculo: null,
          placa: ''
        },
        familias:[],
        familia:{
          id_familia: null,
          nomb_titular: '',
          apellidos: '',
          direccion: '',
          distrito: '',
          numIntegrantes:null,
          numContagiados:null
        }
      }
    },
    created(){
      this.mostrarZona()
      this.mostrarGrupo()
      this.mostrarVehiculo()
      this.mostrarFamilia()
    },
    methods:{
      mostrarZona(){  
        axios.post(urlPHP, {opcion:'5'})
        .then(response => {
            this.zonas = response.data;
            console.log(this.zonas);
        })
      },
      mostrarGrupo(){  
        axios.post(urlPHP, {opcion:'6'})
        .then(response => {
            this.grupos = response.data;
            console.log(this.grupos);
        })
      },
      mostrarVehiculo(){  
        axios.post(urlPHP, {opcion:'7'})
        .then(response => {
            this.vehiculos = response.data;
            console.log(this.vehiculos);
        })
      },
      mostrarFamilia(){  
        axios.post(urlPHP, {opcion:'8'})
        .then(response => {
            this.familias = response.data;
            console.log(this.familias);
        })
      }
    }
}
  
  
  
</script>