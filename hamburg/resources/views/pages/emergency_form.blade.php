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
        <form>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Name</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">What is your phone number?</small>
                    </div>
                    <label for="exampleInputEmail1" class="font-weight-bold">Attributes</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Safe?
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Requesting help.
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Water?
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Power?
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Shelter?
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
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
            <br />
            <div class="row float-left">
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    var geocoder;
    var map;
    function initMap() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng({{$current_location['lat']}}, {{$current_location['lng']}});
        var mapOptions = {
            zoom: 15,
            center: latlng
        }
        map = new google.maps.Map(document.getElementById('map'), mapOptions);
    }
    function codeAddress() {
        var address = document.getElementById('address').value;
        geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == 'OK') {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
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