<template>
  <div id="app">
    <Header></Header>
    
  </div>
</template>

<script>

import Header from '@/components/Header'

import axios from 'axios'
import { mapState } from 'vuex'
import VueAxios from 'vue-axios'
var urlPHP="http://localhost/php/crudDetalles.php";

export default {
  name: 'App',
  components: {
    Header
  }

}
</script>

<style>
    /*body {
      background:white;
    }*/
</style>
