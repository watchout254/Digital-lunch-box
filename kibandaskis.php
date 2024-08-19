<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Lunchbox | Nearby</title>
    <!-- Google Maps JavaScript API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4S7ETKRTLQGYxh5S6nwaoyVGcIyvbwHU&libraries=places">
    </script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    h1 {
        color: #333;
        font-size: 2.5rem;
        margin-bottom: 20px;
        text-align: center;
    }

    #find-restaurants,
    #back-home {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 15px 30px;
        border-radius: 50px;
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-bottom: 20px;
        box-shadow: 0 4px 10px rgba(0, 123, 255, 0.4);
        width: 90%;
        max-width: 400px;
    }

    #find-restaurants:hover,
    #back-home:hover {
        background-color: #0056b3;
        box-shadow: 0 6px 12px rgba(0, 123, 255, 0.6);
    }

    ul {
        list-style-type: none;
        padding: 0;
        width: 90%;
        max-width: 600px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        overflow-y: auto;
        max-height: 400px;
        margin-top: 20px;
    }

    li {
        display: flex;
        align-items: center;
        padding: 15px;
        border-bottom: 1px solid #dee2e6;
        font-size: 1rem;
        color: #495057;
        transition: background-color 0.3s ease;
    }

    li img {
        margin-right: 15px;
        border-radius: 8px;
        width: 50px;
        height: 50px;
        object-fit: cover;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    li:last-child {
        border-bottom: none;
    }

    li:hover {
        background-color: #f8f9fa;
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

        ul {
            max-width: 90%;
            max-height: 300px;
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
    <h1>Find Nearby Restaurants</h1>
    <!-- Back to Homepage Button -->
    <button id="back-home" onclick="window.location.href='index.php'">Back to Homepage</button>
    <!-- Find Nearby Restaurants Button -->
    <button id="find-restaurants">Find Nearby Restaurants</button>
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
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                results.forEach(restaurant => {
                    fetchRestaurantDetails(restaurant);
                });
            } else {
                handleErrors(status);
            }
        });
    }

    function fetchRestaurantDetails(restaurant) {
        const request = {
            placeId: restaurant.place_id,
            fields: ['name', 'vicinity', 'formatted_phone_number', 'photos']
        };

        const service = new google.maps.places.PlacesService(document.createElement('div'));
        service.getDetails(request, (details, status) => {
            if (status === google.maps.places.PlacesServiceStatus.OK) {
                displayRestaurant(details);
            } else {
                console.error('Error fetching restaurant details:', status);
            }
        });
    }

    function displayRestaurant(restaurant) {
        const list = document.getElementById('restaurants-list');
        const item = document.createElement('li');

        // Display restaurant name, address, and phone number
        let content = `${restaurant.name} - ${restaurant.vicinity}`;
        if (restaurant.formatted_phone_number) {
            content += ` | Contact: ${restaurant.formatted_phone_number}`;
        }

        // If photos are available, add a thumbnail
        if (restaurant.photos && restaurant.photos.length > 0) {
            const photo = restaurant.photos[0].getUrl({
                'maxWidth': 100,
                'maxHeight': 100
            });
            const img = document.createElement('img');
            img.src = photo;
            img.alt = restaurant.name;
            item.appendChild(img);
        }

        // Append text content
        const text = document.createElement('span');
        text.textContent = content;
        item.appendChild(text);

        list.appendChild(item);
    }

    function handleError(error) {
        console.error('Geolocation error:', error);
        alert('Error retrieving your location. Please enable location services and try again.');
    }

    function handleErrors(status) {
        const errorMessages = {
            ZERO_RESULTS: 'No restaurants found nearby.',
            OVER_QUERY_LIMIT: 'Query limit reached. Try again later.',
            REQUEST_DENIED: 'Request denied. Check your API key and restrictions.',
            INVALID_REQUEST: 'Invalid request. Please try again.',
            UNKNOWN_ERROR: 'An unknown error occurred. Please try again.'
        };

        alert(errorMessages[status] || 'Failed to fetch nearby restaurants. Please try again later.');
    }

    document.getElementById('find-restaurants').addEventListener('click', () => {
        alert('Loading nearby restaurants, please wait...');
        getUserLocation(
            position => {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;
                fetchNearbyRestaurants(lat, lng);
            },
            handleError
        );
    });
    </script>
</body>

</html>