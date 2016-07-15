<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" />

    <title>ilpt</title>
    
    
           <link href='https://fonts.googleapis.com/css?family=Roboto:400,100' rel='stylesheet' type='text/css'>

    <script src="js/jquery.js"></script>

    <link rel="stylesheet" href="css/example.css">
    <script src="js/example.js"></script>

    <link rel="stylesheet" href="css/material-charts.css">
    <script src="js/material-charts.js">
        var exampleBarChartData = {
    "datasets": {
        "values": [200, 10, 30, 50, 20],
        "labels": [
            "Apples", 
            "Oranges", 
            "Berries", 
            "Peaches", 
            "Bananas"
        ], "color": "blue"
    },
    "title": "Example Bar Chart",
    "height": "300px",
    "width": "800px",
    /*"background": "#FFFFFF",*/
    "shadowDepth": "1"
};

MaterialCharts.bar("#bar-chart-example", exampleBarChartData) 
    </script>

</head>
<body>
   
<div id="bar-chart-example"></div>
      
</body>
</html>