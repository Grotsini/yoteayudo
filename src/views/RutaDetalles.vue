<template>
    <div>
        <div id="content" class="p-4 p-md-5 pt-5">
      <h5 class="mb-4">Detalle de entregas de la ruta 1</h5>

      <div class="container">

        <div th:if="${!list.isEmpty()}">
          <h2></h2>
          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Familia</th>
                <th># Canastas</th>
                <th># Kits Médicos</th>
                <th>Dirección</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>1</td>
                <td>Alva Ramirez</td>
                <td>2</td>
                <td>1</td>
                <td>Av Los Cedros</td>
              </tr>

              <tr>
                <td>2</td>
                <td>Quezada Ovedo</td>
                <td>1</td>
                <td>3</td>
                <td>Av Brasil 257</td>
              </tr>

              <tr>
                <td>3</td>
                <td>Juarez Perez</td>
                <td>2</td>
                <td>4</td>
                <td>Jr Huaylas 286</td>
              </tr>


            </tbody>


          </table>


          
        </div>
      </div>

    </div>
    <div style="text-align: center;">

        <button class="fill" style="border-radius:7px;"><router-link to="./rutas">Volver</router-link></button>
       
      </div>
      




    </div>
</template>

<script>
// @ is an alias to /src

</script>