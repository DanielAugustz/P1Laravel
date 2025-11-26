@markdown:Layout Base do Laravel:P1Laravel/resources/views/layouts/app.blade.php
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD de Categorias - P1Laravel</title>
    
    {{-- Importa Bootstrap CSS via CDN para estilização simples --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    {{-- Barra de Navegação Simples (Escura para contraste) --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            {{-- Link para a listagem principal --}}
            <a class="navbar-brand" href="{{ route('categories.index') }}">
                Categorias
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    
    {{-- Container Principal: Onde o conteúdo de outras views será injetado --}}
    <main class="py-4">
        @yield('content') 
    </main>

    {{-- Importa Bootstrap JS (para funcionalidades de nav/modais) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>