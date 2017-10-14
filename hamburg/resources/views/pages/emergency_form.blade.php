<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body onload="initMap()">
<!-- As a heading -->
<nav class="navbar navbar-light bg-faded">
    <h1 class="navbar-brand mb-0">SAVE THIS NUMBER! Call or Text 1-800-XXX-XXXX</h1>
</nav>
<div class="container">
    <br />
    <div class="row d-flex align-items-center">
        <div class="col-5">
            <h1 class="text-center">
                Call or Text
                <br />
                1-800-XXX-XXXX
            </h1>
        </div>
        <div class="col-2">
            <h1 class="text-center">
                - OR -
            </h1>
        </div>
        <div class="col-5">
            <button type="button" class="btn btn-danger btn-lg btn-block">Fill Out Emergency Form</button>
        </div>
    </div>
    <br />
    <hr />
    <br />
    <div class="container">
        <h1 class="text-center">Emergency Form</h1>
        <br />
        {!! Form::open(['url' => '/formTest', 'method' => 'post','class' => 'name']) !!}
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Name</label>
                        <input type="name" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">What is your name?</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea" class="font-weight-bold">Location</label>
                        <input class="form-control" id="address">
                        <br />
                        <div class="clearfix">
                            <div class="float-right">
                                <input type="button" class="btn btn-primary" value="Update Map" onclick="codeAddress()">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Phone Number</label>
                        <input type="tel" class="form-control" id="exampleInputEmail1" name="phone_number" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">What is your phone number?</small>
                    </div>
                    <label for="exampleInputEmail1" class="font-weight-bold">Attributes</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" id='safe' name="safe" class="form-check-input" value="0">
                            Safe?
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" id="resource[help]"" name="resource[help]" class="form-check-input">
                            Requesting help.
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" id="resource[water]" name="resource[water]" class="form-check-input">
                            Water?
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" id="resource[power]" name="resource[power]" class="form-check-input">
                            Power?
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" id="resource[shelter]" name="resource[shelter]" class="form-check-input">
                            Shelter?
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" id="resource[zombies]" name="resource[zombies]" class="form-check-input">
                            Zombies?
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea" class="font-weight-bold">Details</label>
                        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="d-flex align-items-center">
                        <div class="container">
                            <div id="map" style="width: 500px; height: 500px;"></div>
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="lat" id="lat" value="0" />
            <input type="hidden" name="lng" id="lng" value="0" />
            {{-- Name this better --}}
            <br />
            <div class="row float-left">
                    {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>

<script
        src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
        crossorigin="anonymous"></script>

<script>
    var geocoder;
    var map;
    var updated;
    function initMap() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng({{$current_location['lat']}}, {{$current_location['lng']}});
        var mapOptions = {
            zoom: 15,
            center: latlng
        }
        map = new google.maps.Map(document.getElementById('map'), mapOptions);

        var marker = new google.maps.Marker({
            position: latlng,
            map: map
        });

        @foreach ($zombie_location as $zombie)
        var marker = new google.maps.Marker({
            position: {lat: {{$zombie['location']['lat']}}, lng: {{$zombie['location']['lng']}} },
            map: map,
            title: 'Zombie!',
            label: 'Z'
        });
        @endforeach

        @foreach ($water_location as $water)
        var marker = new google.maps.Marker({
            position: {lat: {{$water['location']['lat']}}, lng: {{$water['location']['lng']}} },
            map: map,
            title: 'Water!',
            label: 'W'
        });
        @endforeach

        @foreach ($power_location as $power)
        var marker = new google.maps.Marker({
            position: {lat: {{$power['location']['lat']}}, lng: {{$power['location']['lng']}} },
            map: map,
            title: 'Power!',
            label: 'P'
        });
        @endforeach

        @foreach ($shelter_location as $shelter)
        var marker = new google.maps.Marker({
            position: {lat: {{$power['location']['lat']}}, lng: {{$power['location']['lng']}} },
            map: map,
            title: 'Shelter!',
            label: 'S'
        });
        @endforeach
    };


    function codeAddress() {
        var address = document.getElementById('address').value;
        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == 'OK') {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
                $('#lat').val(results[0].geometry.location.lat());
                $('#lng').val(results[0].geometry.location.lng());
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
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