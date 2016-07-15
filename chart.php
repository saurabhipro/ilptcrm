<html>
<head>
<title>Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script type="text/javascript" src="fusioncharts/js/fusioncharts.js"></script>
<script type="text/javascript" src="fusioncharts/js/themes/fusioncharts.theme.fint.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/u/dt/dt-1.10.12/datatables.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js">></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/u/dt/dt-1.10.12/datatables.min.css"/>
    
<script type="text/javascript">
 var data = "";
 $(document).ready(function() {
        var dataTable = $('#example').DataTable( {
          "processing": true,
          "serverSide": true,
          "ajax":{
            url :"employee-grid-data.php", // json datasource
            type: "post",  // method  , by default get
            error: function(){  // error handling
              $(".employee-grid-error").html("");
              $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#employee-grid_processing").css("display","none");
              
            }
          }
        } );
      } );


  FusionCharts.ready(function(){
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "json.php", //Relative or absolute path to response.php file
        data: "",
        success: function(data) {
          var revenueChart = new FusionCharts({
              "type": "column3d",
              "renderAt": "chartContainer",
              "width": "1200",
              "height": "500",
              "dataFormat": "json",
              "dataSource":  {
                "chart": {
                  "caption": "Monthly revenue for last year",
                  "subCaption": "EMMAR MGF SALES",
                  "xAxisName": "Month",
                  "yAxisName": "Revenues (In USD)",
                  "theme": "fint"
               },
               "data":data
            }
        });
        revenueChart.render();
        }
     });
})


</script>
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Employee Registration Form</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>



 <div class="container-fluid">
      <div class="row">
         <div id="chartContainer">FusionCharts XT will load here!</div>
      </div>
      <div class="row">
         <div id="chartContainer">FusionCharts XT will load here!</div>
      </div>
     


     



<div ng-app="">
  <p>Name : <input type="text" ng-model="name"></p>
  <h1>Hello {{name}}</h1>
</div>

</div>


<table id="example" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
    </tr>
    </thead>
    <tbody>
  
    </tbody>
</table>



</body>
</html>


