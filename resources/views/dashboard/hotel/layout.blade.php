<!-- resources/views/hotel/layout.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Booking Laravel App</title>
    
</head>
<body>
      
<div class="container">
    @yield('content')
</div>
      
</body>
</html>