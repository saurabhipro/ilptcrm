<!DOCTYPE html>
<html>
<head>
    <title>Sales Report</title>
    <?php include("../header.php"); ?>

  <script>
      $(document).ready(function () {
          $('.input-daterange input').each(function() {
              $(this).datepicker({
                  format: "mm-yyyy",
                  viewMode: "months",
                  minViewMode: "months"
              });
          });
      });
  </script>

</head>
<body>
<div class = "container">
    <form id='create-user-form' action='export_excel.php' method='post' border='0'>
        <div class='page-header'>
            <h3 id='page-title'> Sales Report</h3>
        </div>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-8">
                <div class="input-group input-daterange">
                    <input type="text" class="form-control" value="2016-01" name="from_date">
                    <span class="input-group-addon">to</span>
                    <input type="text" class="form-control" value="2016-06" name="to_date">
                </div>
            </div>
            <div class="col-md-1">
                     <input type="submit" value="Download Excel" class="btn btn-primary">
            </div>
        </div>


    </form>

</div>

</body>
</html>


