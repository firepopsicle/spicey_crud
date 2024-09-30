<!DOCTYPE html>
<html>
<head>
    <title>Add Flight</title>
    <link rel="stylesheet" href="{{ asset('/public/css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Add Flight</h1>
        <form action="{{ route('flights.store') }}" method="POST">
            @csrf
            <label>Flight Number:</label>
            <input type="text" name="flight_number" required>
            <label>Destination:</label>
            <input type="text" name="destination" required>
            <label>Departure Time:</label>
            <input type="datetime-local" name="departure_time" required>
            <button type="submit">Add Flight</button>
        </form>
        <a href="{{ route('flights.index') }}">Back to List</a>
    </div>
</body>
</html>
