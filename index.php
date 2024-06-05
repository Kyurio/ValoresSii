<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- datatable -->
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet">


    <title>Valores SII</title>
</head>

<body>


    <div id="app">
        <div class="container mt-5">

            <h1>{{ title }}</h1>

            <div class="card">
                <div class="card-body">

                    <!-- BUSCADOR -->
                    <div class="d-flex flex-row-reverse bd-highlight">
                        <div class="p-2 bd-highlight">
                            <button type="button" class="btn btn-outline-secondary" @click="extraerValores">Buscar</button>
                        </div>
                        <div class="p-2 bd-highlight">
                            <select class="form-select" aria-label="Indicador" v-model="indicador">
                                <option value="uf">UF</option>
                                <option value="utm">UTM</option>
                            </select>
                        </div>
                        <div class="p-2 bd-highlight">
                            <select v-model="fecha" class="form-select">
                                <option v-for="year in lastFiveYears" :value="year">{{ year }}</option>
                            </select>
                        </div>

                    </div>
                    <!-- END BUSCADOR -->

                    <!-- tabla -->
                    <table class="table" v-if="valores.length" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in valores[0].serie" :key="item.fecha">
                                <td>{{ formatDate(item.fecha) }}</td>
                                <td>{{ formatCurrency(item.valor) }}</td>
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- vuejs -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- datatable -->
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

    <!-- app -->
    <script src="app.js"></script>

</body>

</html>