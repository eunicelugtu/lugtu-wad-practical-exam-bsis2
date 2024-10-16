<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSACTIONS</title>
</head>
<body>
    <h1>ALL TRANSACTIONS</h1>

    <form action="{{route('createTransaction')}}" method="GET">
        <button type="submit">Add Transaction</button>
    </form>
    <br>

    @foreach ($transactions as $transaction)
    <div><b>Transaction: {{$transaction->transaction_title}}</b></div>
    <div><i>{{$transaction->description}}</i></div>
    <div>&#8369;{{$transaction->total_amount}}</div><br>

    <form action="{{route('showTransaction', ['id' => $transaction->id])}}" method="GET">
        <button type="submit">View</button>
    </form>

    <form action="{{route('editTransaction', ['id' => $transaction->id])}}" method="GET">
        <button type="submit">Edit</button>
    </form>

    <form action="{{route('deleteTransaction', ['id' => $transaction->id])}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this transaction?')">
        @method('DELETE')
        @csrf
        <button type="submit">Delete</button>
    <hr>
    @endforeach
    
</body>
</html>