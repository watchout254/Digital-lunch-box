<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Nearby Restaurants</title>
    <!-- Google Maps JavaScript API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4S7ETKRTLQGYxh5S6nwaoyVGcIyvbwHU&libraries=places">
    </script>
</head>

<body>
    <button id="find-restaurants">Find Nearby Kibandaskis</button>
    <ul id="restaurants-list"></ul>

    <script>
    function getUserLocation(successCallback, errorCallback) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback, {
                enableHighAccuracy: true
            });
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function fetchNearbyRestaurants(lat, lng) {
        const location = new google.maps.LatLng(lat, lng);
        const request = {
            location: location,
            radius: '1500', // Radius in meters
            type: ['restaurant'] // Type of place
        };

        const service = new google.maps.places.PlacesService(document.createElement('div'));
        service.nearbySearch(request, (results, status) => {
            console.log("Google Places API status:", status); // Log the status
            console.log("Google Places API response:", results); // Log the full response

            if (status === google.maps.places.PlacesServiceStatus.OK) {
                displayRestaurants(results);
            } else if (status === google.maps.places.PlacesServiceStatus.ZERO_RESULTS) {
                alert('No restaurants found nearby.');
            } else if (status === google.maps.places.PlacesServiceStatus.OVER_QUERY_LIMIT) {
                alert('Query limit reached. Try again later.');
            } else if (status === google.maps.places.PlacesServiceStatus.REQUEST_DENIED) {
                alert('Request denied. Check your API key and restrictions.');
            } else if (status === google.maps.places.PlacesServiceStatus.INVALID_REQUEST) {
                alert('Invalid request. Please try again.');
            } else if (status === google.maps.places.PlacesServiceStatus.UNKNOWN_ERROR) {
                alert('An unknown error occurred. Please try again.');
            } else {
                console.error('Error fetching restaurants:', status);
                alert('Failed to fetch nearby restaurants. Please try again later.');
            }
        });
    }

    function displayRestaurants(restaurants) {
        const list = document.getElementById('restaurants-list');
        list.innerHTML = '';

        if (restaurants.length === 0) {
            list.innerHTML = '<li>No nearby restaurants found.</li>';
        } else {
            restaurants.forEach(restaurant => {
                const item = document.createElement('li');
                item.textContent = `${restaurant.name} - ${restaurant.vicinity}`;
                list.appendChild(item);
            });
        }
    }

    function handleError(error) {
        console.error('Geolocation error:', error);
        alert('Error retrieving your location. Please enable location services and try again.');
    }

    document.getElementById('find-restaurants').addEventListener('click', () => {
        console.log("Find Nearby Kibandaskis button clicked.");
        getUserLocation(
            position => {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;
                console.log(`Latitude: ${lat}, Longitude: ${lng}`); // Debug line
                fetchNearbyRestaurants(lat, lng);
            },
            handleError
        );
    });
    </script>
</body>

</html>