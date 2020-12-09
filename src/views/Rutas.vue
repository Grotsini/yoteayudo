<template>

    <div>
    <v-app>
      <v-main>
            <div id="content" class="p-4 p-md-5 pt-5">

              <div class="container">
              <br>
              <br>
                <div>
                  <v-card>
                    <v-card-title>
                      <v-text-field
                        v-model="search"
                        append-icon="mdi-magnify"
                        label="Search"
                        single-line
                        hide-details
                      ></v-text-field>
                    </v-card-title>
                    <v-data-table
                      :headers="headers"
                      :items="rutas"
                      :search="search"
                    >
                    <template v-slot:top>
                      <v-toolbar flat>
                        <v-toolbar-title>Rutas</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-btn
                          dark
                          class="mb-2"
                         color="green acent-2 white--text" style="float:right; text-decoration:none" @click="formNuevo()"
                        >Crear Ruta</v-btn>
                      </v-toolbar>
                    </template>
                    
                      <template #item.acciones="{item}">
                        <v-btn icon
                          color="pink" @click="formEditar(item.id_ruta, item.zona, item.fecha, item.hora, item.grupo, item.placa, item.estado_ruta)"><v-icon dark>
                          mdi-pencil
                        </v-icon></v-btn>
                        <v-btn icon
                          color="indigo" name="delete" @click="deleteData(item.id_ruta)"><v-icon dark>
                          mdi-delete
                        </v-icon></v-btn>
                      </template>
                    </v-data-table>

                  </v-card>
                  
                </div>
              </div>
              
            </div>
        <!--<b-modal 
        id="modal-crear" 
        size="xl"
        ref="modal"
        title="Crear Ruta" 
        @show="resetModal"
        @hidden="resetModal"
        @ok="handleOk">
          <form ref="form" @submit.stop.prevent="handleSubmit">
            <b-form-group
              :state="zonaState"
              label="Zona"
              label-for="zona-input"
              invalid-feedback="La zona es requerida"
            >
              <b-form-input
                id="zona-input"
                v-model="zona"
                :state="zonaState"
                required
              ></b-form-input>
            </b-form-group>
          </form>
        </b-modal>-->
        <v-dialog v-model="dialog" max-width="1000" id="modalRuta">
          <v-card>
            <v-card-title class="blue-grey darken-1 white--text">Rutas</v-card-title>
            <v-card-text>
              <v-form>
                <v-container>
                  <v-row>
                    <!--<GmapMap :center="{ lat: 10, lng: 10 }">
                      <GmapMarker
                        v-for="(m, index) in markers"
                        :key="index"
                        :position="m.position"
                        @click="center = m.position"
                      />
                    </GmapMap>-->
                    <input v-model="ruta.id_ruta" hidden>
                    <v-col class="d-flex" cols="12" sm="6">
                      <v-select
                        :items="zonas"
                        prepend-icon="mdi-map-marker"
                        label="Zona"
                        v-model="ruta.zona"
                      ></v-select>
                    </v-col>

                    <v-col
                      class="d-flex" cols="12" sm="6"
                    >
                      <v-menu
                        ref="menu2"
                        v-model="menu2"
                        :close-on-content-click="false"
                        :nudge-right="40"
                        transition="scale-transition"
                        offset-y
                        min-width="290px"
                      >
                        <template v-slot:activator="{ on, attrs }">
                          <v-text-field
                            v-model="ruta.fecha"
                            label="Fecha"
                            prepend-icon="mdi-calendar"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                          ></v-text-field>
                        </template>
                        <v-date-picker
                          v-model="ruta.fecha"
                          @input="menu2 = false"
                        ></v-date-picker>
                      </v-menu>
                    </v-col>
                    <v-col class="d-flex" cols="12" sm="6">
                      <v-menu
                        ref="menu"
                        v-model="menu3"
                        :close-on-content-click="false"
                        :nudge-right="40"
                        :return-value.sync="time"
                        transition="scale-transition"
                        offset-y
                        max-width="290px"
                        min-width="290px"
                      >
                        <template v-slot:activator="{ on, attrs }">
                          <v-text-field
                            v-model="ruta.hora"
                            label="Hora"
                            prepend-icon="access_time"
                            readonly
                            v-bind="attrs"
                            v-on="on"
                          ></v-text-field>
                        </template>
                        <v-time-picker
                          v-if="menu3"
                          v-model="ruta.hora"
                          format="24hr"
                          use-seconds
                          full-width
                          @click:second="$refs.menu.save(ruta.hora)"
                        ></v-time-picker>
                      </v-menu>
                    </v-col>
                    <v-col class="d-flex" cols="12" sm="6">
                      <v-select
                        :items="grupos"
                        prepend-icon="mdi-account-multiple-plus"
                        label="Grupo"
                        v-model="ruta.grupo"
                      ></v-select>
                    </v-col>
                    <v-col class="d-flex" cols="12" sm="6">
                      <v-select
                        :items="vehiculos"
                        prepend-icon="mdi-car"
                        label="Vehículo"
                        v-model="ruta.placa"
                      ></v-select>
                    </v-col>
                    <v-col class="d-flex" cols="12" sm="6">
                      <v-select
                        :items="estados"
                        label="Estado"
                        prepend-icon="mdi-cube-outline"
                        v-model="ruta.estado_ruta"
                      ></v-select>
                    </v-col>
                    
                  </v-row>
                  <v-row>
                    <GoogleMap :latitude= 13.7013266 :longitude= -89.226622 :title="'Titulo Marcador'" />
                  </v-row>
                </v-container>
              </v-form>
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn @click="dialog=false" depressed
              color="error">Cancelar</v-btn>
              <v-btn @click="guardar" type="submit" color="indigo" dark> Guardar<v-icon style="margin-left:5px;">mdi-content-save</v-icon></v-btn>
            </v-card-actions>
          </v-card>
        </v-dialog>
      </v-main>
      
    </v-app>
    
    
  </div>

</template>

<script>
// @ is an alias to /src



import axios from 'axios'
import VueAxios from 'vue-axios'
import GoogleMap from "../components/GoogleMap";
import 'vue-material-design-icons/styles.css'
import { mdiDeleteOutline } from '@mdi/js';
import MenuIcon from 'vue-material-design-icons/Menu.vue';
var urlPHP="http://localhost/php/crudRutas.php";


export default {
      components: {
        MenuIcon,
        GoogleMap
      },
      data(){
        return{
          time: null,
          picker:null,
          menu3: false,
          modal2: false,
          date: new Date().toISOString().substr(0, 10),
          menu: false,
          modal: false,
          menu2: false,
          search: '',
          headers: [
            {
              text: 'Id',
              align: 'start',
              value: 'id_ruta',
            },
            { text: 'Fecha', value: 'fecha' },
            { text: 'Hora', value: 'hora' },
            { text: 'Grupo', value: 'grupo' },
            { text: 'Vehículo', value: 'placa' },
            { text: 'Zona', value: 'zona' },
            { text: 'Estado', value: 'estado_ruta' },
            { text: 'Acciones', value: 'acciones', sortable: false }
          ],
          rutas:[],
          map:null,
          zonas: ['Zona 1', 'Zona 2', 'Zona 3', 'Zona 4'],
          grupos:['Principal 1', 'Principal 2', 'Leones', 'Principal 4'],
          vehiculos:['ABCDEF','BHQ430','PAL032','ROD233','RQE902','ABN220'],
          estados:['Completa', 'En Proceso', 'Pendiente'],
          zonaState: null,
          submittedNames: [],
          estadoAnterior:'',
          dialog:false,
          operacion:'',
          ruta:{
            id_ruta:null,
            fecha:null,
            hora:null,
            grupo:'',
            placa:'',
            zona:'',
            estado_ruta:''
          }
        }
      },
      created(){
          this.mostrar()
      },
      mounted(){
        this.map;
        window.scrollTo(0, 0);
      },
      methods:{
          mostrar:function(){
            axios.post(urlPHP, {opcion:'4'})
            .then(response => {
                this.rutas = response.data;
                console.log(this.rutas);
            })
          },
          añadirDatos: function(){
            this.$root.$emit('CrearRuta');
          },
          openModel:function(){
            application.first_name = '';
            application.last_name = '';
            application.actionButton = "Insert";
            application.dynamicTitle = "Add Data";
            application.myModel = true;
          },
          checkFormValidity() {
            const valid = this.$refs.form.checkValidity()
            this.zonaState = valid
            return valid
          },
          resetModal() {
            this.zona = ''
            this.zonaState = null
          },
          handleOk(bvModalEvt) {
            // Prevent modal from closing
            bvModalEvt.preventDefault()
            // Trigger submit handler
            this.handleSubmit()
          },
          handleSubmit() {
            // Exit when the form isn't valid
            if (!this.checkFormValidity()) {
              return
            }
            // Push the name to submitted names
            this.submittedNames.push(this.zona)
            // Hide the modal manually
            this.$nextTick(() => {
              this.$bvModal.hide('modal-prevent-closing')
          })
          
        },
        deleteData: async function (id){
           
            this.$swal({
              title:'¿Desea eliminar este registro?',
              text: 'No puedes revertir esta acción',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonText: 'Confirmar',
              cancelButtonText: 'Cancelar',
              showCloseButton: true,
              showLoaderOnConfirm: true
            }).then((result) => {
              if(result.isConfirmed){
                axios.post(urlPHP, {opcion:'3',id_ruta:id}).then(response => {
                  this.mostrar();
                });
                this.$swal('Eliminado','La ruta fue eliminada exitosamente','success')
              }
              else{
            
              }
            });

            //this.$swal('Heading', 'this is a Heading', 'OK');
            /*
            if(confirm("Are you sure you want to remove this data?"))
            {
              axios.post(urlPHP, {opcion:'3',id_ruta:id}).then(response => {
                this.mostrar();
              });
            }*/
        },
        crear:function(){
          var estado = true;
          console.log("Creacion de ruta" + this.ruta.placa);
          for (let i in this.rutas){
            console.log(this.rutas[i].placa);
            if (this.ruta.placa == this.rutas[i].placa){
              if(this.rutas[i].estado_ruta == 'En Proceso'){
                this.$swal('Error','La ruta no puede ser incluida dado que el vehículo que se ha colocado está en uso','error');
                estado=true;
                return;
              }
              
            }
            else{
              estado = false;
            }
          }
          console.log(estado);
          if(estado==false){
            this.$swal({
                title:'¿Desea crear este registro?',
                text: 'La acción puede ser editada en cualquier momento.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar',
                showCloseButton: true,
                showLoaderOnConfirm: true,
                preConfirm: function() {
                  return new Promise(function(resolve, reject) {
                    // here should be AJAX request
                    setTimeout(function() {
                      resolve();
                    }, 1000);
                  });
                }
              }).then((result) => {
                if(result.isConfirmed){
                  axios.post(urlPHP, {opcion:'1', fecha:this.ruta.fecha, hora:this.ruta.hora, grupo:this.ruta.grupo, placa:this.ruta.placa, zona:this.ruta.zona, estado_ruta: this.ruta.estado_ruta}).then(response => {
                    this.mostrar();

                  });
                  this.ruta.fecha = "";
                  this.ruta.hora = "";
                  this.ruta.grupo = "";
                  this.ruta.placa = "";
                  this.ruta.zona = "";
                  }
                  else{

                  }
              });
          }
        },
        editar:function(id, zona, fecha, hora, grupo, placa, estado_ruta){

          var estado = true;
          console.log("Creacion de ruta" + this.ruta.placa);
          for (let i in this.rutas){
            console.log(this.rutas[i].placa);
            if (this.estadoAnterior!='En Proceso'){
              if (this.ruta.placa == this.rutas[i].placa){
                if(this.rutas[i].estado_ruta == 'En Proceso'){
                  this.$swal('Error','La ruta no puede ser incluida dado que el vehículo que se ha colocado está en uso','error');
                  estado=true;
                  return;
                }
                
              }
            }
            
            else{
              estado = false;
            }
          }
          if(estado==false){
            this.$swal({
                title:'¿Desea editar este registro?',
                text: 'La acción puede ser reeditada nuevamente.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar',
                showCloseButton: true,
                showLoaderOnConfirm: true,
                preConfirm: function() {
                  return new Promise(function(resolve, reject) {
                    // here should be AJAX request
                    setTimeout(function() {
                      resolve();
                    }, 1000);
                  });
                }
              }).then((result) => {
                if(result.isConfirmed){
                  
                  axios.post(urlPHP, {opcion:'2',id_ruta:this.ruta.id_ruta, fecha:this.ruta.fecha, hora: this.ruta.hora, grupo:this.ruta.grupo, placa: this.ruta.placa, zona:this.ruta.zona,  estado_ruta: this.ruta.estado_ruta}).then(response => {
                    this.mostrar();

                  });
                }
                else{

                }
              });
          }
        },
        guardar:function(){
          if(this.operacion=='crear'){
            this.crear();
          }
          if(this.operacion=='editar'){
            this.editar();
          }
          this.dialog=false;
        },
        formNuevo:function(){
          document.getElementById("modalRuta").scrollTop = 0;
          this.dialog=true;
          this.operacion='crear';
          this.ruta.fecha = "";
          this.ruta.hora = "";
          this.ruta.grupo = "";
          this.ruta.placa = "";
          this.ruta.zona = "";
          this.ruta.estado_ruta = "";
        },
        formEditar:function(id, zona, fecha, hora, grupo, placa, estado_ruta){
          document.getElementById("modalRuta").scrollTop = 0;
          this.ruta.id_ruta = id;
          this.ruta.zona = zona;
          this.ruta.fecha = fecha;
          this.ruta.hora = hora;
          this.ruta.grupo = grupo;
          this.ruta.placa = placa;
          this.ruta.estado_ruta = estado_ruta;
          this.estadoAnterior = estado_ruta;
          this.dialog = true;
          this.operacion='editar';
        }
      }
}
</script>