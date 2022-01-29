<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LARAVEL</title>
</head>
<body>
        <header>
            <h1>Cabeçalho</h1>
        </header>
        <hr>
        <section>
            @yield('conteudo')
        </section>
        <hr>
        <footer>
            Rodapé.
        </footer>
</body>
</html>