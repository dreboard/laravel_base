$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".btn-submit").click(function (e) {

        e.preventDefault();
        try{
            var name = $("input[name=name]").val();
            var password = $("input[name=password]").val();
            var email = $("input[name=email]").val();
            //console.log(email);
            $.ajax({
                type: 'POST',
                dataType: 'json',
                //contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                url: 'ajaxRequestPost',
                data: {name: name, password: password, email: email},
                success: function (data) {
                    console.log(data);
                    $("#theName").text(data.email);
                    console.log(data.name);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }catch (error){
            console.log(error.message);
        }

    });
});
// Load the Visualization API and the piechart package.
google.charts.load('current', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var jsonData = $.ajax({
        url: "getData.php",
        dataType: "json",
        async: false
    }).responseText;

    // Create our data table out of JSON data loaded from server.
    var data = new google.visualization.DataTable(jsonData);

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, {width: 400, height: 240});
}
/*
try{

    $dsn = "mysql:host=$host;dbname=$db_base;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_EMULATE_PREPARES   => true,
    ];
    $db = new PDO($dsn, $db_user, $db_password, $options);

}catch (PDOException $e){
     print(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}


// Get all my users
function getFullListOfUsers($dbh)
{
    $request = $dbh->prepare( "SELECT * FROM it_users WHERE user_subs_time > 2015-12 OR user_subs_time <= 2016-12 " );
    return $request->execute() ?  $request->fetchAll() : null;
}


$users = getFullListOfUsers($db);


// I want data for just some months
$months = ['Jan' => 0, 'Feb' => 0, 'Mar' => 0, 'Apr' => 0, 'May' => 0, 'Jun' => 0];


// Look for subscribers for each month
foreach ($users as $user) {
    if (array_key_exists(date('M', $user->user_subs_time), $months)) {
        $months[date('M', $user->user_subs_time)] ++;
    }
}

// List of the chart rows
$rows = [];

// Create rows for each month
foreach ($months as $key => $value) {
     $rows[] =  ['c' =>
                        [
                          ['v' => $key],
                          ['v' => $value, 'f' => 'Share']
                        ]
                ];
}

// Structure data for google visualization API
$data = [

     'cols' => [
            ['1', 'Months', 'type' => 'string'],
            ['2',  'Subscriptions', 'type' => 'number']
      ],
      'rows' => $rows

];


header('Content-Type: application/json');
echo json_encode($data);
* */