<template>
    <div>
        <div v-if="showModal">
        <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
            <div class="modal-dialog modal2-confirm" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <div class="icon-box">
                      <i class="material-icons">&#xE876;</i>
                    </div>				
                    <h4 class="modal-title w-100">Listo!</h4>
                </div>
                <div class="modal-body">
                    <p v-if="path==='/rutaCrear' || path==='/rutaEditar'" class="text-center">La ruta se creó satisfactoriamente</p>
                    <p v-else class="text-center">La entrega se creó satisfactoriamente</p>
                </div>
                <div class="modal-footer">
                    <router-link v-if="path==='/rutaCrear' || path==='/rutaEditar'" to="./rutas"><button type="button" class="btn btn-success btn-block" data-dismiss="modal" @click="showModal = false">Ok </button></router-link>
                    <router-link v-else to="./entregas"><button type="button" class="btn btn-success btn-block" data-dismiss="modal" @click="showModal = false">Ok </button></router-link>
                </div>
                </div>
            </div>
            </div>
        </div>
        </transition>
    </div>
    
    <button @click="showModal = true">Guardar</button>
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