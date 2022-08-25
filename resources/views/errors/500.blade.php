<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>500 error</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <section style="padding-top:100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <h1 style="font-size:162px">500</h1>
                    <h2>Error en la petición al servidor.</h2>
                    <p>Lo sentimos, la página que esta buscando no a sido posible cargarla.</p>
                    <button type="button" class="btn btn-primary"><a href="/" class="text-light">Volver a la página principal</a></button>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
