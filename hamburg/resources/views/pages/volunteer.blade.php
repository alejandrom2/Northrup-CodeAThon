<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>
<!-- As a heading -->
<nav class="navbar navbar-light bg-faded">
    <h1 class="navbar-brand mb-0">Admin Page</h1>
</nav>
{{--<img src="https://images.unsplash.com/photo-1502820563747-6ef04d9f4f37?dpr=1&auto=compress,format&fit=crop&w=1950&h=&q=80&cs=tinysrgb&crop=" class="img-fluid" alt="" style="position: absolute">--}}
<div class="container">
    <br />
    <h1 class="text-center">Volunteers</h1>
    <br />
    <div class="row">
        <div class="col-4" style="height: 80vh; overflow: scroll">
            @foreach($volunteers as $volunteer)
                <div class="card">
                    <h3 class="card-header text-center">{{$volunteer->name}}</h3>
                    <div class="card-block">
                        <h4 class="card-title">Experience:</h4>
                        <p class="card-text">{{$volunteer->experience}}</p>
                        <a href="#" class="btn btn-primary">Contact</a>
                        <a href="#" class="btn btn-secondary">Assigned</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-8">
            <div id="map" style="width: 100%; height: 80vh;"></div>
        </div>
    </div>
</div>

<script>
    function initMap() {
        var uluru = {lat: {{$current_location['lat']}}, lng: {{$current_location['lng']}} };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgzexPGNw2G1qHMueCq6K700XZyYrJIDE&callback=initMap">
</script>


<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>