<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body>

{{--тут бы табличку--}}
@foreach($lucky as $luckyModel)
    @if ($luckyModel->isLucky())
        <h1>You are win! ^_^</h1>
        <h2>Your lucky number is: {{ $luckyModel->number }}</h2>
        <h3>You won: {{ $luckyModel->getWinningRate() }}</h3>
    @else
        <h1>You Lose :(</h1>
        <h2>{{ $luckyModel->number }}</h2>
    @endif

    <hr/>
@endforeach

</body>
</html>
