<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your View</title>
</head>
<body>
    <h1>Model Columns</h1>
    <ul>
        @foreach($columns as $column)
            <li>{{ $column }}</li>
        @endforeach
    </ul>
</body>
</html>
