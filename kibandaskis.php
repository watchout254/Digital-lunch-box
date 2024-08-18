<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Nearby Restaurants</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4S7ETKRTLQGYxh5S6nwaoyVGcIyvbwHU&libraries=places"></script>

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
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                    displayRestaurants(results);
                } else {
                    console.error('Error fetching restaurants:', status);
                }
            });
        }

        function displayRestaurants(restaurants) {
            const list = document.getElementById('restaurants-list');
            list.innerHTML = '';

            restaurants.forEach(restaurant => {
                const item = document.createElement('li');
                item.textContent = `${restaurant.name} - ${restaurant.vicinity}`;
                list.appendChild(item);
            });
        }

        document.getElementById('find-restaurants').addEventListener('click', () => {
            getUserLocation(
                position => {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;
                    fetchNearbyRestaurants(lat, lng);
                },
                error => {
                    console.error('Error getting location:', error);
                }
            );
        });
    </script>
</body>
</html>
