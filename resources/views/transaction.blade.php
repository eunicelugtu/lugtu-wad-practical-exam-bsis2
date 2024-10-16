<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSACTIONS</title>
</head>
<body>
    <h1>{{$transaction->transaction_title}}</h1>
    <p><b>Transanction is {{$transaction->status}}.</b></p>
    <p><i>#{{$transaction->transaction_number}}</i></p>
    <p>{{$transaction->description}}</p>

    <br>
    <p>Total Amount is <u>&#8369;{{$transaction->total_amount}}</u></p>
    <p>{{$transaction->updated_at->format('F j, Y, g:i a')}}</p><br>

    <form action="{{route('editTransaction', ['id' => $transaction->id])}}" method="GET">
        <button type="submit">Edit</button>
    </form>

    <form action="{{route('deleteTransaction', ['id' => $transaction->id])}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this transaction?')">
        @method('DELETE')
        @csrf
        <button type="submit">Delete</button>
    </form>

    <form action="{{route('showAllTransactions')}}" method="GET">
        <button type="submit">Back to Transactions Page</button>
    </form>
    
</body>
</html>