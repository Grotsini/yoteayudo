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
                        <v-btn small class="mr-2" style="background: url('https://api.iconify.design/mdi-pencil-circle.svg') no-repeat center center / contain;" @click="formEditar(item.id_ruta, item.zona, item.fecha, item.hora, item.grupo, item.placa)"></v-btn>
                        <v-btn small class="mr-2" style="background: url('https://api.iconify.design/el:trash-alt.svg') no-repeat center center / contain" name="delete" @click="deleteData(item.id_ruta)"></v-btn>
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
        <v-dialog v-model="dialog" max-width="1000">
          <v-card>
            <v-card-title class="blue-grey darken-1 white--text">Rutas</v-card-title>
            <v-card-text>
              <v-form>
                <v-container>
                  <v-row>
                    <GmapMap :center="{ lat: 10, lng: 10 }">
                      <GmapMarker
                        v-for="(m, index) in markers"
                        :key="index"
                        :position="m.position"
                        @click="center = m.position"
                      />
                    </GmapMap>
                    <input v-model="ruta.id_ruta" hidden>
                    <v-col class="d-flex" cols="12" sm="6">
                      <v-select
                        :items="rutas"
                        label="Zona"
                        v-model="ruta.zona"
                      ></v-select>
                    </v-col>
                    <v-col cols="12" md="4"><v-text-field v-model="ruta.zona" label="Ingresa una zona" solo required></v-text-field></v-col>
                    <v-col cols="12" md="4"><v-text-field v-model="ruta.fecha" label="Ingresa una fecha" solo required></v-text-field></v-col>
                    <v-col cols="12" md="4"><v-text-field v-model="ruta.hora" label="Ingresa la hora de partida" solo required></v-text-field></v-col>
                    <v-col cols="12" md="4"><v-text-field v-model="ruta.grupo" label="Ingresa el grupo" solo required></v-text-field></v-col>
                    <v-col cols="12" md="4"><v-text-field v-model="ruta.placa" label="Ingresa la placa del vehículo" solo required></v-text-field></v-col>
                  </v-row>
                </v-container>
              </v-form>
            </v-card-text>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn @click="dialog=false">Cancelar</v-btn>
              <v-btn @click="guardar" type="submit" color="indigo" dark>Guardar</v-btn>
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
import GoogleMapsLoader from 'google-maps'
import 'vue-material-design-icons/styles.css'
import { mdiDeleteOutline } from '@mdi/js';
import MenuIcon from 'vue-material-design-icons/Menu.vue';
var urlPHP="http://localhost/php/crudRutas.php";


export default {
      components: {
        MenuIcon
      },
      data(){
        return{
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
          zona: '',
          zonaState: null,
          submittedNames: [],
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
        this.map
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
            
            /*this.alert({
              title:'¿Desea eliminar este registro?',
              confirmButtonText: `Confirmar`,
              showCancelButton: True
            }).then((result) => {
              if(result.isConfirmed){
                axios.post(urlPHP, {opcion:'3',id_ruta:id}).then(response => {
                  this.mostrar();
                });
                this.alert('Eliminado Exitosamente','','success')
              }
              else if(result.isDenied){

              }
            });*/
            
            if(confirm("Are you sure you want to remove this data?"))
            {
              axios.post(urlPHP, {opcion:'3',id_ruta:id}).then(response => {
                this.mostrar();
              });
            }
        },
        crear:function(){
          axios.post(urlPHP, {opcion:'1', fecha:this.ruta.fecha, hora:this.ruta.hora, grupo:this.ruta.grupo, placa:this.ruta.placa, zona:this.ruta.zona}).then(response => {
            this.mostrar();

          });
          this.ruta.fecha = "";
          this.ruta.hora = "";
          this.ruta.grupo = "";
          this.ruta.placa = "";
          this.ruta.zona = "";
        },
        editar:function(id, zona, fecha, hora, grupo, placa){
          axios.post(urlPHP, {opcion:'2',id_ruta:this.ruta.id_ruta, fechaInicio:this.ruta.fecha + " "+ this.ruta.hora, fechaFin:this.ruta.fecha + " "+ this.ruta.hora,  })
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
          this.dialog=true;
          this.operacion='crear';
          this.ruta.fecha = "";
          this.ruta.hora = "";
          this.ruta.grupo = "";
          this.ruta.placa = "";
          this.ruta.zona = "";
        },
        formEditar:function(id, zona, fecha, hora, grupo, placa){
          this.ruta.id_ruta = id;
          this.ruta.zona = zona;
          this.ruta.fecha = fecha;
          this.ruta.hora = hora;
          this.ruta.grupo = grupo;
          this.ruta.placa = placa;
          this.dialog = true;
          this.operacion='editar';
        }
      }
}
</script>