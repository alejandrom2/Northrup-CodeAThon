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
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="text-center">Save this map!</h1>
                <br />
                <div class="container">
                    <img src="{{asset("map.PNG")}}" alt="" class="img-fluid" alt="Responsive image">
                </div>
                <br />
                <button type="button" class="btn btn-primary btn-block">Download</button>
            </div>
            <div class="col-6">
                <h1>Volunteer!</h1>
                <br />
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Name</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="font-weight-bold">Point of Contact</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We need your help, but we need to contact you!</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea" class="font-weight-bold">Experience</label>
                        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                        <small id="emailHelp" class="form-text text-muted">Please be honest... This is crutial. It's for us to help you help others best.</small>
                    </div>
                    <div class="float-right">
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>