<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>RMS</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        main{
            display:flex;
            width:100%;
            height:100%;
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
    
    .homediv{
        width:75%;
        height:100%;
        margin:3%;    
    }

    </style>

    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('css/sidebar.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
  </head>
  <body>

<main>

    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;height:100vh;">
    <h4><?php echo $_SESSION['user']; ?></h4>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="<?php echo base_url('Home') ?>" class="nav-link text-white" aria-current="page">Home</a>
      </li>

      <li class="nav-item">
        <a href="<?php echo base_url('EntryForm') ?>" class="nav-link text-white" aria-current="page">Entry Form</a>
      </li>
      <li>
        <a href="<?php echo base_url('Invoice') ?>" class="nav-link text-white">Invoice</a>
      </li>

     <!--  <li>
        <a href="<?php echo base_url('Payments') ?>" class="nav-link text-white">Payments</a>
      </li> -->
      <li>
          <a href="<?php echo base_url('Report/select_property_for_report_monthwise') ?>" class="nav-link text-white">Main Report</a>  
        </li>

      <li>
        <a href="<?php echo base_url('Report/receiver_report') ?>" class="nav-link text-white">Receiver Report</a>
      </li>
       <li>
        <a href="<?php echo base_url('Report/receiver_expenditure') ?>" class="nav-link text-white"> Receiver Expenditure</a>
      </li>
        
       <!--  <li>
          <a href="<?php echo base_url('Report/User_Wise_Report') ?>" class="nav-link text-white">User-Wise Report</a>  
        </li> -->
        
      
      <li>
        <a href="<?php echo base_url('Report/outstanding_amount') ?>" class="nav-link text-white">Oustanding Report</a>
      </li>
     
    </ul>
    <hr>
  </div>

  <div class="homediv">

  <?php
    if($msg = $this->session->flashdata('Expenditure_inserted')) {?>
    <div class="alert alert-success" style="font-style: italic; text-align:center;">
    <strong><?php echo $msg; ?></strong>
    </div>
    <br>
  <?php } ?>

  <div class="containe-fluid">
	<div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <form action="<?php echo base_url('Report/insert_receiver_expenditure');?>" method="post">
                    <div style="font-style:italic; font-size: 23px; color:red;"><b>Receiver Expenditure</b>
                    </b> &emsp;
                    <span><a class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="<?php echo base_url('Report/view_expenditure'); ?>" style="font-weight:bold;">
                    <i class="fa fa-plus"></i> View Expenditure
                  </a></span> 
                    </div>
                    <hr>
                    <div class="form-group col">
                    <label for="exampleInputEmail1">Expenditure date:</label>
                    <input type="date" class="form-control"  name="date"  placeholder="Enter start date...">
                     </div>
 
                <br>
                <div class="form-group col">
                 <label for="exampleInputEmail1">Payment User:</label>
                 <select class="form-control" name="pay_user">
                 <option value="">Select user</option>
                <option value="1">Dr. Indra Kumar Shah</option>
                <option value="2">Sir's Father</option>
                <option value="3">Nisha</option>
                </select>
                </div>
                <br>
                <div class="form-group col">
                 <label for="exampleInputEmail1">Expenditure Head:</label>
                 <select class="form-control" name="head">
                 <option value="">Select Payment Head</option>
                <option value="1">Waste</option>
                <option value="2">Maintenance</option>
                <option value="3">Other</option>
                </select>
                </div>
                <br>
                <div class="form-group col">
                 <label for="exampleInputEmail1">Amount:</label>
                 <input type="number" class="form-control" name="amount"  placeholder="Enter expenditure...">
                </div>
                <br>
                <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
</form>
            </div>      			
        </div>
    </div>
</div>
  </div>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

      <script src="<?php echo base_url('js/sidebars.js') ?>"></script>
  </body>
</html>
 