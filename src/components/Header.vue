<template>
  <div>
    <header>
        <nav class="vista">     
            <ul>
                <img class="logo" src="../../public/imagenes/sinfondo.png">
                <img class="logo" src="../../public/imagenes/comas logo.png" style="width: 280px;">
                <li><a href="#"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
            </ul>
        </nav>

    </header>
    <header>
        <input type="checkbox" id="btn-menu">
        <label for="btn-menu">Menu</label>
        <nav class="menu">
            <ul>
                <li><router-link to="/">Inicio</router-link></li>
                <li><a href="#">Programa semanal</a></li>
                <li><router-link to="/familias">Familias</router-link></li>
                <li><router-link to="/entregas">Entregas</router-link></li>
                <li><router-link to="/rutas">Rutas</router-link></li>
                <li><a href="#">Grupos de asistencia</a></li>
                
            </ul>
            
        </nav>
        
    </header>
    <router-view />
        
  </div>
</template>

<script>
    export default {
        name:'Header'

    }
</script>