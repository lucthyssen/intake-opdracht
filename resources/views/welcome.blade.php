<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>iBizz</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="grid">
            <a href="/login">
                <div class="block">
                    <h1 class="block-title">Login</h1>
                </div>
            </a>

            <a href="/register">
                <div class="block">
                    <h1 class="block-title">Registreer</h1>
                </div>
            </a>

            <a href="/feedback">
                <div class="block">
                    <h1 class="block-title">Zelfreflectie</h1>
                </div>
            </a>
        </div>
    </div>
</body>

</html>
