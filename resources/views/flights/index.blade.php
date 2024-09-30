<!DOCTYPE html>
<html>
<head>
    <title>Flight List</title>
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Flights</h1>
        <a href="{{ route('flights.create') }}" class="button">Add Flight</a>
        <table>
            <thead>
                <tr>
                    <th>Flight Number</th>
                    <th>Destination</th>
                    <th>Departure Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($flights as $flight)
                <tr>
                    <td>{{ $flight->flight_number }}</td>
                    <td>{{ $flight->destination }}</td>
                    <td>{{ $flight->departure_time }}</td>
                    <td>
                        <a href="{{ route('flights.edit', $flight->id) }}">Edit</a>
                        <form action="{{ route('flights.destroy', $flight->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
