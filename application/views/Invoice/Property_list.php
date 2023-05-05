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

      /* Style the button that opens the dropdown */
.dropbtn {
  background-color: #202121;
  color: white;
  padding: 16px;
  font-size: 16px;
    border: none;
  cursor: pointer;
}
/* Add a dropdown icon to the .dropbtn element */
.dropbtn::after {
  content: "";
  display: inline-block;
  margin-left: 15px;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 5px 5px 0 5px;
  border-color: white transparent transparent transparent;
}


/* Style the dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  z-index: 1;
}

/* Style the links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #202121;
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
      <li>
        <a href="<?php echo base_url('Home') ?>" class="nav-link text-white" aria-current="page">Home</a>
      </li>

      <li>
        <a href="<?php echo base_url('EntryForm') ?>" class="nav-link text-white" aria-current="page">Entry Form</a>
      </li>
      <!-- <li>
        <a href="<?php echo base_url('Invoice') ?>" class="nav-link text-white">Invoice</a>
      </li> -->

     <!--  <li>
        <a href="<?php echo base_url('Payments') ?>" class="nav-link text-white">Payments</a>
      </li> -->

      <!-- <button class="dropdown-btn">Reports 
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">

        <li>
          <a href="<?php echo base_url('Report/select_property_for_report_monthwise') ?>" class="nav-link text-white">Main Report</a>  
        </li>

      <li>
        <a href="<?php echo base_url('Report/receiver_report') ?>" class="nav-link text-white">Receiver Report</a>
      </li>      
       <li>
          <a href="<?php echo base_url('Report/User_Wise_Report') ?>" class="nav-link text-white">User-Wise Report</a>  
        </li> 
       <li>
        <a href="<?php echo base_url('Report/outstanding_amount') ?>" class="nav-link text-white">Oustanding Report</a>
      </li>
       <li>
          <a href="<?php echo base_url('Report/TR_Report?property_id=' . $property_id) ?>" class="nav-link text-white">TR Report</a>  
        </li>  
        <li>
        <a href="<?php echo base_url('Report/receiver_expenditure') ?>" class="nav-link text-white"> Receiver Expenditure</a>
      </li>  

  </div> -->

<div class="dropdown">
  <button class="dropbtn">Report</button>
  <div class="dropdown-content">

    <a href="<?php echo base_url('Report/select_property_for_report_monthwise') ?>">Main Report</a>
    <a href="<?php echo base_url('Report/outstanding_amount') ?>">Outstanding Report</a>
    <a href="<?php echo base_url('Report/receiver_expenditure') ?>">Receiver Expenditure</a>
    <a href="<?php echo base_url('Report/receiver_report') ?>">Receiver Report</a>
    <a href="<?php echo base_url('Report/TR_Report') ?>">TR Report</a>
    <!-- <a class="dropdown-item" href="<?php echo base_url('Report/TR_Report?property_id=' . $property_id) ?>">TR Report</a> -->
  </div>
</div>

<li>
        <a href="<?php echo base_url('Home/user_entry') ?>" class="nav-link text-white" aria-current="page">User Entry</a>
      </li>



			</ul>
    <hr>
  </div>

  <script>
  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}</script>
  <div class="homediv">
  <?php
    if($msg = $this->session->flashdata('invoice')) {?>
    <div class="alert alert-success" style="font-style: italic; text-align:center;">
    <strong><?php echo $msg; ?></strong>
    </div>
  <?php } ?>   
  <div class="containe-fluid">
	<div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div style="font-style:italic; font-size: 23px; color:red;" ><b>Invoice</b>    
                                
                    </div>
                    <hr>
                    <div style="display:flex; justify-content:center;">
                    <form action="<?php echo base_url("Invoice"); ?>" method="POST">
                    <input
                        id="month"
                        type="month"
                        name="month"
                        min="2000-01"
                        max="<?php echo date("Y-m"); ?>"
                        value="<?php echo $month; ?>"
                        style="height:100%;margin-right:10px;"
                        required
                        />
                    <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                    </div>
                    <br>
                    <div class="row">
                    <table class="table table-striped table-hover table-bordered" style="width:90%" align="center">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col" style="text-align:center;">S.No.</th>
                            <th scope="col" style="text-align:center;">Property</th>
                            <th scope="col" style="text-align:center;">Month</th>
                            <th scope="col" style="text-align:center;">Status</th>
                            <th scope="col" style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($property as $p){ ?> 
                            <tr>
                            <th scope="row" style="text-align:center;"><?php echo $i; ?></th>
                            <td style="text-align:center;"><?php echo $p['property_name']; ?></td>
                            <td style="text-align:center;"><?php echo date("F", strtotime($month))." ".date("Y", strtotime($month));; ?></td>
                            <td style="text-align:center;"><?php if(!empty($p['timestamp'])){?>
                              <span style="color:green"><b><?php echo date("d-m-Y h:i:s A", strtotime($p['timestamp'])); ?></b></span>
                              <?php }else{?>
                                <span style="color:red;"><b>Not Generated</b></span>
                              <?php } ?></td>
                            <td align="center">
                              <a href="<?php echo base_url("Invoice/generate_invoice/").$p['property_id']."/".$month; ?>" class="btn btn-success">Generate</a>
                              <?php if(!empty($p['timestamp'])){?>
                              <a href="<?php echo base_url("Invoice/view_invoice/").$p['property_id']."/".$month; ?>" class="btn btn-primary" >View</a>
                             <?php } ?>
                            </td>
                            </tr>  
                            <?php $i++;} ?> 
                        </tbody>
                        </table>
                    </div>

                    
                </div>
            </div>      			
        </div>
    </div>
</div>
  </div>
</main>
<script>
    $("#datepicker").datepicker( {
    format: "mm-yyyy",
    startView: "months", 
    minViewMode: "months"
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

      <script src="<?php echo base_url('js/sidebars.js') ?>"></script>
  </body>
</html>
 