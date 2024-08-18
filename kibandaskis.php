<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Nearby Kibandaskis</title>
    <!-- Google Maps JavaScript API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4S7ETKRTLQGYxh5S6nwaoyVGcIyvbwHU&libraries=places">
    </script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        flex-direction: column;
    }

    h1 {
        color: #343a40;
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    #find-restaurants,
    #back-home {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 15px 30px;
        border-radius: 5px;
        font-size: 1.2rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-bottom: 20px;
    }

    #find-restaurants:hover,
    #back-home:hover {
        background-color: #218838;
    }

    ul {
        list-style-type: none;
        padding: 0;
        width: 100%;
        max-width: 400px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow-y: auto;
        max-height: 300px;
    }

    li {
        display: flex;
        align-items: center;
        padding: 15px;
        border-bottom: 1px solid #dee2e6;
        font-size: 1rem;
        color: #495057;
    }

    li img {
        margin-right: 10px;
        border-radius: 5px;
    }

    li:last-child {
        border-bottom: none;
    }

    li:hover {
        background-color: #f1f3f5;
    }

    @media (max-width: 768px) {
        h1 {
            font-size: 2rem;
        }

        #find-restaurants,
        #back-home {
            font-size: 1rem;
            padding: 12px 20px;
        }

        li {
            flex-direction: column;
            align-items: flex-start;
        }

        li img {
            margin-bottom: 10px;
            width: 100%;
            height: auto;
        }
    }
    </style>
</head>

<body>
    <h1>Find Nearby Kibandaskis</h1>

    <!-- Back to Homepage Button -->
    <button id="back-home" onclick="window.location.href='index.php'">Back to Homepage</button>

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
            radius: '1500',
            type: ['restaurant']
        };

        const service = new google.maps.places.PlacesService(document.createElement('div'));
        service.nearbySearch(request, (results, status) => {
            console.log("Google Places API status:", status);
            console.log("Google Places API response:", results);

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

                // Display restaurant name and address
                let content = `${restaurant.name} - ${restaurant.vicinity}`;

                // If photos are available, add a thumbnail
                if (restaurant.photos && restaurant.photos.length > 0) {
                    const photo = restaurant.photos[0].getUrl({
                        'maxWidth': 100,
                        'maxHeight': 100
                    });
                    const img = document.createElement('img');
                    img.src = photo;
                    img.alt = restaurant.name;
                    img.width = 50; // Set width and height for thumbnail
                    img.height = 50;
                    item.appendChild(img);
                }

                // Append text content
                const text = document.createElement('span');
                text.textContent = content;
                item.appendChild(text);

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
                console.log(`Latitude: ${lat}, Longitude: ${lng}`);
                fetchNearbyRestaurants(lat, lng);
            },
            handleError
        );
    });
    </script>
</body>

</html>