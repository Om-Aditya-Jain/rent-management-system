<?php
    // echo "<pre>";
    // print_r($property_id);
    // echo "<br>";
    // print_r($month);
    // echo "<br>";
    // print_r($rate_per_unit);
    // echo "<br>";
    // print_r($previous_reading);
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
        margin:1% 3% 0% 3%;    
    }
     .details{
      font-style: italic;
      font-weight:bold; 
      font-size: 13px;
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
    <div class="form-group col">
    <label for="exampleInputEmail1">Full Name:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['tenant_name']; ?></span></label>
     </div>
     <div class="form-group col">
    <label for="exampleInputEmail1">Aadhaar Number:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['aadhaar_no']; ?></span></label>
    </div>
</div>
<div class="row">
    
    <div class="form-group col">
    <label for="exampleInputEmail1">Contact Number:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['contact']; ?></span></label>
    </div>
    <div class="form-group col">
    <label for="exampleInputPassword1">Joining Date:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['joining_date']; ?></span></label>
    </div>
</div>
    <div class="row">
      <div class="form-group col">
        <!-- <label for="exampleInputPassword1">Rent of Flat:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['rent']; ?></span></label> -->
      </div>
    <div class="form-group col">
    <label for="exampleInputEmail1">Family Members:&nbsp; <span style="font-weight:normal;"><?php echo $flat_entry[0]['members']; ?></span></label>
   
    </div>
    
</div>

</div></div></div></div></div>
<h2 style="color:red; font-style:italic; font-weight:bold;"> Entry Form </h2>
<div class="containe-fluid">
<div class="row mt-3 ml-3 mr-3">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<form action="<?php echo base_url('EntryForm/insert_entry_form');?>" method="post">

  <div class="row">
    <div class="form-group col">
    <label for="tenant_rent">Rent</label>
    <input type="number" class="form-control" id="tenant_rent" name="tenant_rent"  placeholder="Enter the Rent Amount" value="<?php echo $previous_rent; ?>">
    </div>
    <div class="form-group col">
    <label for="previous_meter_reading">Previous Meter Reading (Unit)</label>
    <input type="number" class="form-control" id="previous_meter_reading" name="previous_meter_reading"  placeholder="Enter the Previous Meter Reading" value="<?php echo $previous_reading; ?>">
     </div>
    <div class="form-group col">
    <label for="current_meter_reading">Current Meter Reading (Unit)</label>
    <input type="number" class="form-control" id="current_meter_reading" name="current_meter_reading"  placeholder="Enter the Current Meter Reading">
     </div>
     
  </div>

<div class="row">
    
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <div class="form-group col">
    <!-- <i>Previous Meter Reading (Unit) : </i> <span class="details"><?php echo $previous_reading; ?></span>  -->
     </div>
  </div>
     <br>

  <div class="row">
    
    <div class="form-group col">
    <label for="miscellaneous">Miscellaneous</label>
    <input type="number" class="form-control" id="miscellaneous" name="miscellaneous" placeholder="Enter Miscellaneous">
     </div>

    <div class="form-group col">
    <label for="duedate">Due Date:</label>
    <input type="date" class="form-control" id="duedate" name="duedate"  placeholder="Enter the Due Date">
     </div>
  
    </div>
  <br>
 
  <input type="hidden" name="flat_no" value="<?php echo $flat_no; ?>" >
  <input type="hidden" name="property_id" value="<?php echo $property_id; ?>" >
  <input type="hidden" name="property_name" value="<?php echo $property_name; ?>" >
  <input type="hidden" name="no_of_members" value="<?php echo $flat_entry[0]['members']; ?>" >
  <input type="hidden" name="active_status" value="<?php echo $active_status; ?>" >
  <input type="hidden" name="month" value="<?php echo $month; ?>" >
  <input type="hidden" name="rate_per_unit" value="<?php echo $rate_per_unit; ?>" >
  <input type="hidden" name="rate_per_person" value="<?php echo $rate_per_person; ?>" >
  <input type="hidden" name="waste" value="<?php echo $waste; ?>" >


  <!-- <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
</form>
</div></div></div></div></div></div>
</main>
</body>
</html>