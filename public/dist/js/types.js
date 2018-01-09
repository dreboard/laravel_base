/*!
 * Coin App JS v1.0.0
 *
 * Coin types chart loader
 * Copyright 2017 Coin App
 * Licensed under MIT
 */

$(document).ready(function () {
    try{
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        console.log(coinType);
        $.ajax({
            method: "POST",
            url: "../postTypeColor",
            data:  {
                type: coinType
            }
        })
            .done(function( colors ) {
                //console.log(data.holed);
                console.log(colors);
                var data;
                var chart;

                // Load the Visualization API and the piechart package.
                google.charts.load('current', {'packages':['corechart']});

                // Set a callback to run when the Google Visualization API is loaded.
                google.charts.setOnLoadCallback(drawChart);

                // Callback that creates and populates a data table,
                // instantiates the pie chart, passes in the data and
                // draws it.
                function drawChart() {

                    // Create our data table.
                    data = new google.visualization.DataTable();
                    data.addColumn('string', 'Topping');
                    data.addColumn('number', 'Slices');
                    data.addRows([
                        ['Red', colors.red],
                        ['Red Brown', colors.redBrown],
                        ['Brown', colors.brown],
                        ['None', colors.none]
                    ]);

                    // Set chart options
                    var options = {
                        'title':''+coinType+' Colors',
                        'width':$('#colors').width()*0.75,
                        'height':$('#colors').height()*0.50,
                        'colors': ['#DC143C', '#791b19', '#7b6419', '#6495ED']
                    };

                    // Instantiate and draw our chart, passing in some options.
                    chart = new google.visualization.PieChart(document.getElementById('colors'));
                    google.visualization.events.addListener(chart, 'select', selectHandler);
                    chart.draw(data, options);
                }

                function selectHandler() {
                    var selectedItem = chart.getSelection()[0];
                    var value = data.getValue(selectedItem.row, 0);
                    alert('The user selected ' + value);
                }
            })
            .fail(function(error) {
                console.log('Error:', error);
            })
            .always(function(data) {
                //console.log(data);
            });
    }catch (error){
        console.log(error.message);
    }
});