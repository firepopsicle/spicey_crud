<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Flight List</title>
    <style>

        
        .edit-delete-buttons {
            display: none; 
    </style>
</head>
<body>
    <div class="background-image">
        <div class="background-overlay"></div>
        <div class="container mt-5">
            <div class="header">
                <input type="text" id="search" onkeyup="filterFlights()" placeholder="Search for flights..." class="form-control d-inline-block">
                <h1 class="mt-4">Flight List</h1>
                <button id="toggleEdit" class="btn btn-info">EDIT TILES</button>
            </div>
            <div class="flight-list" id="flight-list">
                <div class="row">
                    @foreach ($flights as $flight)
                    <div class="col-md-6 mb-4">
                        <div class="card flight-card">
                            <div class="delete-button-container">
                                <form action="{{ route('flights.destroy', $flight->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" onclick="confirmDelete(event)">X</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $flight->flight_number }}</h5>
                                <div class="flight-info top-line">
                                    <span><strong>From:</strong> {{ $flight->take_off_from }}</span>
                                    <span><strong>To:</strong> {{ $flight->destination }}</span>
                                    <span><strong>Airline:</strong> {{ $flight->airline_name }}</span>
                                </div>
                                <div class="flight-info">
                                    <span><strong>Departure:</strong> {{ $flight->departure_time }}</span>
                                    <span><strong>Duration:</strong> {{ $flight->flight_duration }} hrs</span>
                                    <span><strong>Price:</strong> ₹{{ number_format($flight->price, 2) }}</span>
                                </div>
                                <div class="mt-2">
                                    <strong>Pilot:</strong> {{ $flight->pilot_name }}
                                </div>
                                <div class="edit-delete-buttons">
                                    <a href="{{ route('flights.edit', $flight->id) }}" class="btn btn-warning edit-btn">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('flights.create') }}" class="btn btn-primary add-flight-button">Add Flight</a>

    <script>
    function filterFlights() {
        const input = document.getElementById('search');
        const filter = input.value.toLowerCase();
        const cards = document.getElementsByClassName('card');

        for (let i = 0; i < cards.length; i++) {
            const title = cards[i].getElementsByClassName('card-title')[0].textContent.toLowerCase();
            const text = cards[i].getElementsByClassName('flight-info')[0].textContent.toLowerCase();

            cards[i].style.display = (title.includes(filter) || text.includes(filter)) ? '' : 'none';
        }
    }

    function confirmDelete(event) {
        if (confirm('Are you sure you want to delete this flight?')) {
            event.target.closest('form').submit();
        }
    }

    document.getElementById('toggleEdit').addEventListener('click', function() {
        const buttons = document.querySelectorAll('.edit-delete-buttons');
        const deleteButtons = document.querySelectorAll('.delete-button-container');

        // Toggle visibility for both edit and delete buttons
        buttons.forEach(button => {
            button.style.display = button.style.display === 'none' || button.style.display === '' ? 'flex' : 'none';
        });

        deleteButtons.forEach(btn => {
            btn.style.display = btn.style.display === 'none' || btn.style.display === '' ? 'block' : 'none';
        });

        // Add shimmer effect to the button
        this.classList.add('shimmer');

        // Remove shimmer effect after animation completes
        setTimeout(() => {
            this.classList.remove('shimmer');
        }, 500); // Match duration with animation duration
    });
    </script>
</body>
</html>
