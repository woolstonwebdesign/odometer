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
                <div class="radio">
                    <label for="kms">
                        <input type="radio" id="kms" name="distance" checked>
                        Kilometres traveled
                        <input type="number" id="kms_value" class="form-control" />
                    </label>
                </div>
                <div class="radio">
                    <label for="odometer">
                        <input type="radio" id="odometer" name="distance">
                        Odometer reading
                        <input type="number" id="odometer_value" class="form-control" />
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="">Date</label>
                <input type="date" id="date_of_travel" class="form-control" value="{{ date('Y-m-d') }}">
            </div>
            <div class="form-group">
                <button type="button" class="form-control btn btn-primary">Save</button>
            </div>
        </form>

        <table id="mileage" class="table">
            <colgroup>
                <col style="width: 50%" />
                <col style="width: 50%" />
            </colgroup>
            <thead>
                <tr><td>Vehicle</td><td>Distance Traveled</td></tr>
            </thead>
            <tbody></tbody>
        </table>
    </div><!-- /page-wrap -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $("button[type=button]").on("click", function() {
                saveMileage($("#vehicle"), $("#odometer"), $("#date_of_travel"));
            });

            $("select#vehicle").on("change", function(e) {
                getMileage($(this).val());
            });

            fetch('http://127.0.0.1:8000/api/odometer/vehicles', {
                method: "get"
            }).then(function(response) {
                return response.json();
            }).then(function(data) {
                data.data.forEach(function(item) {
                    $("select#vehicle").append(`<option value="${item.id}">${item.name}</option>`);
                })
            })
            .then(function(data) {
                getMileage($("select#vehicle").val());
            });
        });

        function getMileage(vehicleId) {
            fetch(`http://127.0.0.1:8000/api/odometer/vehicle/${vehicleId}/odometers`, {
                method: 'get',
                headers: {"Content-type": "application/json; charset=UTF-8"},
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                var $mileage = $("table#mileage tbody");
                data.data.forEach(function(item) {
                    $mileage.append(`<tr><td>${item.vehicle.name}</td><td>${item.distance_traveled}</td></tr>`);
                })
            });
        }

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
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                getMileage(data.vehicle_id);
            });
        }
    </script>
</body>
</html>