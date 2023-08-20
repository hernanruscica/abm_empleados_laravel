@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-5 ">Tension [V] Fase R</h1>
    <canvas id="miGrafico"></canvas>
</div>
<script>
    var ctx = document.getElementById('miGrafico').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', // Tipo de gráfico
        data: {
            labels: ['2023-08-20 18:28', '2023-08-20 18:33', '2023-08-20 18:38', '2023-08-20 18:43',  '2023-08-20 18:48', '2023-08-20 18:53', '2023-08-20 18:58', '2023-08-20 19:03', '2023-08-20 19:08',  '2023-08-20 19:13'], // Eje X
            datasets: [{
                label: 'Tension eficaz', // Leyenda
                data: [246, 247, 245, 251, 250, 249, 248, 248, 248, 249, 245, 247, 242, 246 ], // Valores en el eje Y
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color de fondo
                borderColor: 'rgba(75, 192, 192, 1)', // Color del borde
                borderWidth: 1 // Ancho del borde
            }]
        },
        options: {
            // Opciones de personalización
        }
    });
</script>
@endsection