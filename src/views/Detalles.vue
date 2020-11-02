<template>
    <div>
        
        <div id="content" class="p-4 p-md-5 pt-5">
          <h5 class="mb-4">Detalle de familia Alva Ramirez</h5>
   
          <div class="container">

            <div th:if="${!list.isEmpty()}">
              <h2></h2>
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>DNI</th>
                    <th>Nombre Completo</th>
                    <th>Edad</th>
                    <th>Estado</th>
                    <th>Detalle</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>1</td>
                    <td>76349867</td>
                    <td>Jesus Alva Acosta</td>
                    <td>52</td>
                    <td>Negativo</td>
                    <td>-</td>
              
                  <tr>
                    <td>2</td>
                    <td>45673987</td>
                    <td>Ana Maria Ramirez Soto</td>
                    <td>48</td>
                    <td>Contagiado</td>
                    <td>Critico</td>
                  </tr>

                  <tr>
                    <td>3</td>
                    <td>73490330</td>
                    <td>Virginia Alva Ramirez</td>
                    <td>14</td>
                    <td>Negativo</td>
                    <td>-</td>
                  </tr>

                  <tr>
                    <td>4</td>
                    <td>74573909</td>
                    <td>Lisa Alva Ramirez</td>
                    <td>26</td>
                    <td>Negativo</td>
                    <td>-</td>
             
                  </tr>

                  <tr>
                    <td>5</td>
                    <td>73839347</td>
                    <td>Jorge Antonio Alva Ramirez</td>
                    <td>19</td>
                    <td>Negativo</td>
                    <td>-</td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>




          <div style="text-align: center;">

            <button class="fill" style="border-radius:7px;"><router-link to="./familias">Volver</router-link></button>
           
          </div>
        </div>
    </div>
</template>

<script>

</script>


