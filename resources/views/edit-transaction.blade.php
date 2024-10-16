<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSACTIONS</title>
</head>
<body>
    <h1>Edit Transaction</h1>

    <form action="{{route('updateTransaction', ['id' => $transaction->id])}}" method="POST">
        @method('PUT')
        @csrf

        <label for="transaction_title">Transaction Title:</label>
        <input value="{{$transaction->transaction_title}}" type="text" id="transaction_title" name="transaction_title" required><br>
        <label for="description">Description:</label>
        <input value="{{$transaction->description}}" type="text" id="description" name="description"><br>
        <label for="status">Status:</label>
        <select value="{{$transaction->status}}" type="select" id="status" name="status" required>
            <option value="successful">Successful</option>
            <option value="declined">Declined</option>
        </select><br>
        <label for="total_amount">Total Amount:</label>
        <input value="{{$transaction->total_amount}}" type="text" id="total_amount" name="total_amount" required><br>
        <label for="transaction_number">Transaction Number:</label>
        <input value="{{$transaction->transaction_number}}" type="text" id="transaction_number" name="transaction_number" required><br>

        <br>
        <button type="submit">Update Transaction</button>
    </form>

    <form action="{{route('showTransaction', ['id' => $transaction->id])}}" method="GET">
        <button type="submit">Back to Current Transaction</button>
    </form>

    <form action="{{route('showAllTransactions')}}" method="GET">
        <button type="submit">Back to Transactions Page</button>
    </form>
    
</body>
</html>