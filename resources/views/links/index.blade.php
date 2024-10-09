<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>
<h1>Welcome!</h1>

<form action="{{ route('link.delete', ['segment' => request()->segment]) }}" method="POST">
    @csrf
    <div>
        <button type="submit">Delete current link</button>
    </div>
</form>

<form action="{{ route('link.create', ['segment' => request()->segment]) }}" method="POST">
    @csrf
    <div>
        <button type="submit">Create new link</button>
    </div>
</form>

<form action="{{ route('link.lucky', ['segment' => request()->segment]) }}" method="GET">
    @csrf
    <div>
        <button type="submit">I'm Filling Lucky</button>
    </div>
</form>

<form action="{{ route('link.lucky.history', ['segment' => request()->segment]) }}" method="GET">
    @csrf
    <div>
        <button type="submit">History</button>
    </div>
</form>
</body>
</html>
