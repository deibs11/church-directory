<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Church Directory</title>
    @if (app()->environment('local'))
        <link rel="stylesheet" href="http://127.0.0.1:5173/resources/css/app.css">
    @else
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @endif
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
    @if (app()->environment('local'))
        <script type="module" src="http://127.0.0.1:5173/resources/js/app.js"></script>
    @else
        <script src="{{ mix('js/app.js') }}"></script>
    @endif
</body>
</html>
