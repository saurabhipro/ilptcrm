<!DOCTYPE html>
<html lang="en">
<head>

    <?php include("../../header.php"); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Read Clients</title>


    <style>
        .display-none {
            display: none;
        }

        .padding-bottom-2em {
            padding-bottom: 2em;
        }

        .width-30-pct {
            width: 30%;
        }

        .width-40-pct {
            width: 40%;
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .margin-right-1em {
            margin-right: 1em;
        }

        .right-margin {
            margin: 0 .5em 0 0;
        }

        .margin-bottom-1em {
            margin-bottom: 1em;
        }

        .margin-zero {
            margin: 0;
        }

        .text-align-center {
            text-align: center;
        }
    </style>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {

        });

    </script>


    <script type="text/javascript">

        function changePageTitle(page_title) {
            $('#page-title').text(page_title);
            document.title = page_title;
        }


        $(document).ready(function () {

            $('#loader-image').show();
            showProducts();

            $('#read-products').click(function () {
                $('#loader-image').show();
                $('#create-product').show();
                $('#read-products').hide();
                showProducts();
            });

            $('#create-product').click(function () {
                changePageTitle('Create Clients');
                $('#loader-image').show();
                $('#create-product').hide();
                $('#read-products').show();
                $('#page-content').fadeOut('slow', function () {
                    $('#page-content').load('create_form.php', function () {
                        $('#loader-image').hide();
                        $('#page-content').fadeIn('slow');
                    });
                });
            });

            $(document).on('click', '.delete-btn', function () {
                if (confirm('Are you sure?')) {
                    var client_id = $(this).closest('td').find('.product-id').text();
                    $.post("delete.php", {id: client_id})
                        .done(function (data) {
                            console.log(data);
                            $('#loader-image').show();
                            showProducts();
                        });
                }
            });
        });


        $(document).on('submit', '#create-user-form', function () {
            $('#loader-image').show();
            $.post("create.php", $(this).serialize())
                .done(function (data) {
                    $('#create-product').show();
                    $('#read-products').hide();
                    showProducts();
                });

            return false;
        });


        // Read Users
        function showProducts() {
            changePageTitle('Read Clients');
            $('#page-content').fadeOut('slow', function () {
                $('#page-content').load('read.php', function () {
                    $('#loader-image').hide();
                    $('#page-content').fadeIn('slow');
                    $('#example').DataTable();
                });
            });
        }

        $(document).on('click', '.edit-btn', function () {
            changePageTitle('Update Client');
            var client_id = $(this).closest('td').find('.product-id').text();
            $('#loader-image').show();
            $('#create-product').hide();
            $('#read-products').show();
            $('#page-content').fadeOut('slow', function () {
                $('#page-content').load('update_form.php?client_id=' + client_id, function () {
                    $('#loader-image').hide();
                    $('#page-content').fadeIn('slow');
                });
            });
        });


        // will run if update product form was submitted
        $(document).on('submit', '#update-product-form', function () {
            $('#loader-image').show();
            $.post("update.php", $(this).serialize())
                .done(function (data) {
                    $('#create-product').show();
                    $('#read-products').hide();
                    showProducts();
                });


            return false;
        });

    </script>

</head>
<body>


<div class="container">

    <div class='page-header'>
        <h1 id='page-title'>Read Clients</h1>
    </div>

    <div class='margin-bottom-1em overflow-hidden'>
        <!-- when clicked, it will show the product's list -->
        <div id='read-products' class='btn btn-primary pull-right display-none'>
            <span class='glyphicon glyphicon-list'></span> Read Clients
        </div>

        <!-- when clicked, it will load the create product form -->
        <div id='create-product' class='btn btn-primary pull-right'>
            <span class='glyphicon glyphicon-plus'></span> Create Clients
        </div>
        <!-- this is the loader image, hidden at first -->
        <!-- <div id='loader-image'><img src='images/ajax-loader.gif' /></div> -->
    </div>


    <!-- content will be here -->
    <div id='page-content'>


    </div>


</div>    <!-- /container -->


<!-- jQuery library -->
<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->


</body>
</html>