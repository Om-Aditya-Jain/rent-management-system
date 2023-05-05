<?php
// echo "<pre>";
// print_r($flat_entry);
// die();
?>
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

    label{
        font-style:italic; 
        font-weight:bold; 
        font-size:20px;
    }

    </style>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
<h2 style="color:red; font-style:italic; font-weight:bold; font-size:25px;"> Tenant Details</h2>
<div class="containe-fluid">
<div class="row mt-3 ml-3 mr-3">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<div class="row">
    <div class="form-group col"></div>
    <label for="flat_no">Flat No:&nbsp;<span style="font-weight:normal;"><?php echo $flat_no; ?></span></label>
</div>

<div class="row">
    <div class="form-group col">
    <label for="exampleInputEmail1">Full Name:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['tenant_name']; ?></span></label>
     </div>
     <div class="form-group col">
    <label for="exampleInputEmail1">Father's Name:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['father_name']; ?></span></label>
     </div>
</div>
<div class="row">
    <div class="form-group col">
    <label for="exampleInputEmail1">Date of Birth:&nbsp;  <span style="font-weight:normal;"><?php echo $flat_entry[0]['dob']; ?></span></label>
    </div>
    <div class="form-group col">
    <label for="exampleInputEmail1">Contact Number:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['contact']; ?></span></label>
    </div>
</div>
<div class="row">
    <div class="form-group col">
    <label for="exampleInputEmail1">Aadhaar Number:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['aadhaar_no']; ?></span></label>
    </div>
    <div class="form-group col">
    <label for="exampleInputPassword1">Joining Date:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['joining_date']; ?></span></label>
    </div>
</div>
<div class="form-group">
    <label for="exampleInputEmail1">Email address:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['email']; ?></span></label>
    </div>
    <div class="row">
    <div class="form-group col">
    <label for="exampleInputEmail1">Family Members:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['members']; ?></span></label>
   
    </div>
    <!-- <div class="form-group col">
        <label for="exampleInputPassword1">Rent of Flat:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['rent']; ?></span></label>
      </div> -->
</div>

</div></div></div></div></div>

<br>
<div class="row">
    <div class="form-group col"> <h2 style="color:red; font-style:italic; font-weight:bold; font-size:22px; display: inline-block; margin-right: 20px;">Report</h2> 
<span>
    <a style="display: inline-block;" class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="<?php echo base_url('Home/month_wise_report').'/'.$flat_no.'/'.$property_id; ?>" >View</a>
</span></div>
   
<div class="form-group col">
    <h2 style="color:red; font-style:italic; font-weight:bold; font-size:22px; display: inline-block; margin-right: 20px;">Police Verification Form</h2> 
<span>
    <a style="display: inline-block;" class="btn btn-primary btn-block btn-sm col-sm-2 float-right" href="<?php echo base_url('Home/police_verification_form').'/'.$flat_no.'/'.$property_id; ?>" >View </a>
</span>
</div>
</div>


<br>
<br>







</div></div></div></div></div>
</div>
</main>
</body>
</html>