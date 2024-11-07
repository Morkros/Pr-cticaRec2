<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>

<body>
    <button onclick="fetchApi()">
        Procesar y Mostrar
    </button>
    <div id="data-container">
    </div>
</body>

<script>
    function fetchApi() {
        timeCheck = new Date();
        timeMinute = timeCheck.getMinutes();
        console.log(timeMinute);

        if (timeMinute % 2 === 0) {
            urlApi = 'https://randomuser.me/api/'
            urlController = '/ruser'
        } else {
            urlApi = 'https://rickandmortyapi.com/api/character'
            urlController = '/rick'
        }

        fetch(urlApi)
            .then(response => response.json())
            .then(data => {
                fetch(urlController, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(data.results)
                    })
                    .then(responseController => responseController.json())
                    .then(responseData => {
                        console.log(responseData)
                        mostrarData(responseData.records);
                    })
            })
    }

    function mostrarData(records) {
        const container = document.getElementById('data-container');
        container.innerHTML = '';

        records.forEach(item => {
            const itemDiv = document.createElement('div');
            if (timeMinute % 2 === 0) {
                itemDiv.innerHTML = `
                    <p>Nombre: ${item.name}</p>
                    <p>Género: ${item.gender || 'N/A'}</p>
                    <p>Localidad: ${item.location || 'N/A'}</p>
                    <hr>`;
            } else {
                itemDiv.innerHTML = `
                    <p>Nombre: ${item.name}</p>
                    <p>Estado: ${item.status || 'N/A'}</p>
                    <p>Especie: ${item.species || 'N/A'}</p>
                    <p>Género: ${item.gender || 'N/A'}</p>
                    <hr>`;
            }
            container.appendChild(itemDiv);
        });
    }
</script>

</html>
