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
    <h1 class="navbar-brand mb-0">SAVE THIS NUMBER! Call or Text 1-800-XXX-XXXX</h1>
</nav>
{{--<img src="https://images.unsplash.com/photo-1502820563747-6ef04d9f4f37?dpr=1&auto=compress,format&fit=crop&w=1950&h=&q=80&cs=tinysrgb&crop=" class="img-fluid" alt="" style="position: absolute">--}}
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
            <a href="{{url('/form')}}">
                <button type="button" class="btn btn-danger btn-lg btn-block">Fill Out Emergency Form</button>
            </a>
        </div>
    </div>
    <br />
    <hr />
    <br />
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="text-center">Save this map!</h1>
                <br />
                <div class="container">
                    <div id="map" style="width: 500px; height: 500px;"></div>
                </div>
                <br />
                <button type="button" class="btn btn-primary btn-block" id="download">Download</button>
            </div>
            <div class="col-6">
                <h1 class="text-center">Volunteer!</h1>
                <br />
                {!! Form::open(['url' => '/volunteerSubmit', 'method' => 'post','class' => 'name']) !!}
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Name</label>
                        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Point of Contact</label>
                        <input type="tel" class="form-control" id="phone" name="phone" aria-describedby="emailHelp" placeholder="Enter POC">
                        <small id="emailHelp" class="form-text text-muted">We need your help, but we need to contact you!</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea" class="font-weight-bold">Experience</label>
                        <textarea class="form-control" id="experience" name="experience" rows="3"></textarea>
                        <small id="emailHelp" class="form-text text-muted">Please be honest... This is crutial. It's for us to help you help others best.</small>
                    </div>
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary submit">Submit</button>
                    </div>
                {!! Form::close() !!}
            </div>

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

        @foreach ($zombie_location as $zombie)
            @if ($zombie['location'] != NULL)
                var marker = new google.maps.Marker({
                    position: {lat: {{$zombie['location']['lat']}}, lng: {{$zombie['location']['lng']}} },
                    map: map,
                    title: 'Zombie!',
                    label: 'Z'
                });
            @endif
        @endforeach

        @foreach ($water_location as $water)
            @if ($water['location'] != NULL)
                var marker = new google.maps.Marker({
                    position: {lat: {{$water['location']['lat']}}, lng: {{$water['location']['lng']}} },
                    map: map,
                    title: 'Water!',
                    label: 'W'
                });
            @endif
        @endforeach

        @foreach ($power_location as $power)
            @if ($power['location'] != NULL)
                var marker = new google.maps.Marker({
                    position: {lat: {{$power['location']['lat']}}, lng: {{$power['location']['lng']}} },
                    map: map,
                    title: 'Power!',
                    label: 'P'
                });
            @endif
        @endforeach

        @foreach ($shelter_location as $shelter)
            @if ($shelter['location'] != NULL)
                var marker = new google.maps.Marker({
                    position: {lat: {{$power['location']['lat']}}, lng: {{$power['location']['lng']}} },
                    map: map,
                    title: 'Shelter!',
                    label: 'S'
                });
            @endif
        @endforeach
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgzexPGNw2G1qHMueCq6K700XZyYrJIDE&callback=initMap">
</script>

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
<script>
    $('#download').on('click', function() {
        var doc = new jsPDF();
        var source = window.document.getElementsByTagName("body")[0];
        doc.fromHTML(source);
        doc.save('map.pdf')
    });
</script>


<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>