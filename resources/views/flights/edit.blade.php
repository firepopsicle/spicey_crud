<!DOCTYPE html>
<html>
<head>
    <title>Edit Flight</title>
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit Flight</h1>
        <form action="{{ route('flights.update', $flight->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label>Flight Number:</label>
            <input type="text" name="flight_number" value="{{ $flight->flight_number }}" required>
            <label>Destination:</label>
            <input type="text" name="destination" value="{{ $flight->destination }}" required>
            <label>Departure Time:</label>
            <input type="datetime-local" name="departure_time" value="{{ $flight->departure_time->format('Y-m-d\TH:i') }}" required>
            <button type="submit">Update Flight</button>
        </form>
        <a href="{{ route('flights.index') }}">Back to List</a>
    </div>
</body>
</html>
