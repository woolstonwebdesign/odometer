<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    
    <link rel="stylesheet" href="/css/app.css" />
</head>
<body>
    <header>
        <nav>
            <a href="/">Home</a>
        </nav>    
    </header>
    <div id="page-wrap">
        <form>
            <div class="form-group">
                <label for="vehicle">Vehicle</label>
                <select id="vehicle" class="form-control">
                </select>
            </div>
            <div class="form-group">
                <label for="odometer">Odometer</label>
                <input type="number" id="odometer" class="form-control" id="odometer">
            </div>
            <div class="form-group">
                <label for="">Date</label>
                <input type="date" id="date_of_travel" class="form-control" value="{{ date('Y-m-d') }}">
            </div>
            <div class="form-group">
                <button type="button" class="form-control btn btn-primary">Save</button>
            </div>
        </form>
    </div><!-- /page-wrap -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $("button[type=button]").on("click", function() {
                saveMileage($("#vehicle"), $("#odometer"), $("#date_of_travel"));
            });

            fetch('http://127.0.0.1:8000/api/odometer/vehicles', {
                method: "get"
            }).then(function(response) {
                return response.json();
            }).then(function(data) {
                data.data.forEach(function(item) {
                    $("#vehicle").append(`<option value="${item.id}">${item.name}</option>`);
                })
            });
        });

        function saveMileage(vehicle, odometer, travelDate) {
            var vehicleId = vehicle.val();
            fetch(`http://127.0.0.1:8000/api/odometer/vehicle/${vehicleId}/odometers`, {
                method: 'post',
                headers: {"Content-type": "application/json; charset=UTF-8"},
                body: JSON.stringify({
                    "vehicle_id": parseInt(vehicleId),
                    "odometer": parseInt(odometer.val()),
                    "user_id": 1,
                    "distance_traveled": 45,
                    "is_kms": true,
                    "date_of_travel": travelDate.val()
                })
            });
        }
    </script>
</body>
</html>