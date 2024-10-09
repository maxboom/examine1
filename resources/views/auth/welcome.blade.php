<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
<h1>Follow the link:</h1>
<a href="{{ route('link.index', ['segment' => $segment]) }}">{{ route('link.index', ['segment' => $segment]) }}</a>
</body>
</html>
