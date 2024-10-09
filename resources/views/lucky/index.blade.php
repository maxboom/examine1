<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>

@if ($lucky->isLucky())
    <h1>You are win! ^_^</h1>
    <h2>Your lucky number is: {{ $lucky->number }}</h2>
    <h3>You won: {{ $lucky->getWinningRate() }}</h3>
@else
    <h1>You Lose :(</h1>
@endif

<form action="{{ route('link.lucky.history', ['segment' => request()->segment]) }}" method="GET">
    @csrf
    <div>
        <button type="submit">History</button>
    </div>
</form>
</body>
</html>
