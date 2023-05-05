<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">

    <!-- Page Title -->
<title>Reports</title>

<!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<!-- Custom CSS -->
<link href="<?php echo base_url('css/sidebar.css') ?>" rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">


<!-- Custom Styles -->
<style>
    main {
        display: flex;
        width: 100%;
        height: 100%;
    }
    
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .homediv {
        width: 75%;
        height: 100%;
        margin: auto;    
    }
</style>
</head>
<body>
    <div class="homediv">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="card border-primary">
                                        <div class="card-body bg-light">
                                            <h4><b>Monthly Payments Report</b></h4>
                                        </div>
                                        <div class="card-footer">
                                            <div class="col-md-12">
                                                <a href="<?php echo base_url('Report/month_of_payment') ?>" class="d-flex justify-content-between">
                                                    <span>View Report</span>
                                                    <span class="fa fa-chevron-circle-right"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="card border-primary">
                                        <div class="card-body bg-light">
                                            <h4><b>Rental Balances Report</b></h4>
                                        </div>
                                        <div class="card-footer">
                                            <div class="col-md-12">
                                                <a href="<?php echo base_url('Report/balance_report') ?>" class="d-flex justify-content-between">
                                                    <span>View Report</span>
                                                    <span class="fa fa-chevron-circle-right"></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
    <!-- Bootstrap core JavaScript -->
<!-- <script src="https://code.jquery.com/jquery-3.6 -->

