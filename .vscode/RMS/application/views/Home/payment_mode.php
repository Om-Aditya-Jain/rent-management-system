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
<h2 style="color:red; font-style:italic; font-weight:bold; font-size:25px;"> Payment Details</h2>
<div class="containe-fluid">
<div class="row mt-3 ml-3 mr-3">
<div class="col-lg-12">
<div class="card">
<div class="card-body">

<form action="<?php echo base_url('Home/insert_payment');?>" method="post">
<?php if($mode == 1){?>
<input type="hidden" name="mode" value="<?php echo $mode;?>"> 
<input type="hidden" name="property_id" value="<?php echo $property_id;?>">   
<input type="hidden" name="flat_no" value="<?php echo $flat_no;?>"> 
<input type="hidden" name="month" value="<?php echo $month;?>">         
<div class="row">
    <div class="form-group col">
    <label for="exampleInputEmail1">Date of Payment:</label>
    <input type="date" class="form-control" id="exampleInputEmail1" name="date"  placeholder="Enter payment date">
</div>
 <div class="form-group col">
    <label for="exampleInputEmail1">Payment Mode:</label>
    <select class="form-control" id="exampleInputPassword1" name="payment_mode">
    <option>Select Payment Mode</option>
    <option value="gpay">Google Pay</option>
    <option value="paytm">Paytm</option>
   </select>
</div>
</div>
<br>
<div class="row">
    <div class="form-group col">
    <label for="exampleInputEmail1">Reference Id:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="ref_id"  placeholder="Enter Reference Id..">
</div>
<div class="form-group col">
    <label for="exampleInputEmail1">Amount:</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="amount"  placeholder="Enter Amount..">
</div>
</div>
<br>
<div class="form-group">
    <label for="exampleInputEmail1">Description:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="description"  placeholder="Enter description..">
</div>
<br>
<div class="form-group">
    <label for="exampleInputEmail1">Received By:</label>
    <select class="form-control" id="exampleInputPassword1" name="receiver">
    <option>Select Payment Receiver</option>
    <option value="1">Mr. Ram Kripal Shah</option>
    <option value="2">Mr. Manoj Kumar Shah</option>
    <option value="3">Dr. Indra Kumar Shah</option>
   </select>
</div>
<br>
<?php } else { ?>
   <input type="hidden" name="mode" value="<?php echo $mode;?>"> 
   <input type="hidden" name="property_id" value="<?php echo $property_id;?>">   
<input type="hidden" name="flat_no" value="<?php echo $flat_no;?>"> 
<input type="hidden" name="month" value="<?php echo $month;?>"> 

<div class="form-group">
    <label for="exampleInputEmail1">Date of Payment:</label>
    <input type="date" class="form-control" id="exampleInputEmail1" name="date"  placeholder="Enter payment date">
</div>
 <br>
 <div class="form-group">
    <label for="exampleInputEmail1">Description:</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="description"  placeholder="Enter description..">
</div>
<br>
 <div class="form-group">
    <label for="exampleInputEmail1">Amount:</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="amount"  placeholder="Enter Amount..">
</div>
<br>
<div class="form-group">
    <label for="exampleInputEmail1">Received By:</label>
    <select class="form-control" id="exampleInputPassword1" name="receiver">
    <option>Select Payment Receiver</option>
    <option value="1">Mr. Ram Kripal Shah</option>
    <option value="2">Mr. Manoj Kumar Shah</option>
    <option value="3">Dr. Indra Kumar Shah</option>
   </select>
</div>
<br>
<?php } ?>
<button type="submit" class="btn btn-primary" value="Submit">Submit</button>
</form>

</div>

</div></div></div></div></div>
</main>
</body>
</html>