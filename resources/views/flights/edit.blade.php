<!DOCTYPE html>
<html>
<head>
    <title>Edit Flight</title>
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Flight</h1>
        <form action="{{ route('flights.update', $flight->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="flight_number">Flight Number:</label>
                <input type="text" name="flight_number" id="flight_number" value="{{ $flight->flight_number }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="take_off_from">Take Off From:</label>
                <input type="text" name="take_off_from" id="take_off_from" value="{{ $flight->take_off_from }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="destination">Destination:</label>
                <input type="text" name="destination" id="destination" value="{{ $flight->destination }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="departure_time">Departure Time:</label>
                <input type="datetime-local" name="departure_time" id="departure_time" value="{{ $flight->departure_time->format('Y-m-d\TH:i') }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="airline_name">Airline Name:</label>
                <input type="text" name="airline_name" id="airline_name" value="{{ $flight->airline_name }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="flight_duration">Duration (hours):</label>
                <input type="number" name="flight_duration" id="flight_duration" value="{{ $flight->flight_duration }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" value="{{ $flight->price }}" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="pilot_name">Pilot Name:</label>
                <input type="text" name="pilot_name" id="pilot_name" value="{{ $flight->pilot_name }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Flight</button>
        </form>
        <a href="{{ route('flights.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
</body>
</html>
