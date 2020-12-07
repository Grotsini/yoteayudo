<template>
    <div>    
        <div v-if="showModal">
        <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
            
            
            <div class="modal-dialog modal2-confirm" role="document">
                <div class="modal-content">
                <div class="modal-header flex-column">
                    
                    <h4 class="modal-title w-100">¿Desea retirar?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" @click="showModal = false">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Este integrante ya no formará parte del grupo</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" @click="showModal = false">No</button>
                    <button type="button" class="btn btn-danger"><router-link to="./rutas">Sí</router-link> </button>
                </div>
                </div>
            </div>


            

            
            </div>
        </div>
        </transition>
    </div>
    

    <button @click="showModal = true"><img src="../../public/imagenes/menos.png" width="25px"></button>
    



</div>
</template>

<script>
export default {
    data () {
        return {
            showModal: false
        }
    }
}
</script>

<style>
    .modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}
</style>