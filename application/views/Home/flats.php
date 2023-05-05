<?php
// echo "<pre>";
// print_r($flats);
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

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;height:100vh; ">
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

  <div class="containe-fluid">
	<div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div style="font-style:italic; font-size: 20px; color:red; font-size: 25px;"><b><i><?php echo $flat[0]['property_address'];?></i></b> &emsp;
                    <form action="<?php echo base_url("Invoice/print_invoice"); ?>" method="POST">
                    <input style="font-size: 19px;"
                        id="month"
                        type="month"
                        name="month"
                        min="2000-01"
                        max="<?php echo date("Y-m"); ?>"
                        value="<?php echo date("Y-m"); ?>"
                        style="height:50%;margin:10px;"
                        required
                        />
                        <input type="hidden" name="property_id" value="<?php echo $property_id; ?>">
                    <input type="submit" value="Combined Invoice" class="btn btn-primary">
                    </div>
                    <hr>
                    <div class="row" style="height:58vh; overflow-x: hidden; overflow-y: auto;">
                        <?php for($i =1; $i<=sizeof($flats); $i++){
                          if($flats[$i]['status'] == 1){
                        ?>

                          <div class="col-md-3 mb-3">
                            <div class="card border-success" style=" border-radius: 10%;">
                                <div class="card-body bg-success" style="padding:1px;  border-radius: 10%;  ">
                                    
                                        <div class="card-body text-white" style="background-color:#469236;  border-radius: 10%; ">
                                        <span class="float-right summary_icon"> <i class="fa fa-home" style="color:black;"></i></span>
                                        <h5 style="color:black;"><b><i><?php echo "Flat No : ".$i;?> <span style="color:white; text-size:20px;"> (<?php echo $flats[$i]['flat_name'];?>) </i></b></h5>
                                        <!-- <h6 style="color:black;"><b><i>Occupied </i></b></h6> -->
                                        <h6 style="color:black;"><b><i><?php echo "Name : ".$flats[$i]['tenant_name']; ?> </i></b></h6>
                                        <h6 style="color:black;"><b><i><?php echo "No. of members : ".$flats[$i]['members']; ?> </i></b></h6>
                                        <h6 style="color:black;"><b><i><?php echo "Joining: ".$flats[$i]['joining_date']; ?> </i></b></h6>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a href="<?php echo base_url('Home/tenant_details/').$i.'/'.$flat[0]['property_id']; ?>" class="text-primary float-right" style="text-decoration : none; font-weight:bold;">View <span class="fa fa-angle-right"></span></a>
                                        </div>
                                        <div class="col-lg-6">

                                            <a href="<?php echo base_url('Home/delete_flat_tenant/').$i.'/'.$flat[0]['property_id'];?>" class="text-primary float-right" style="text-decoration : none; font-weight:bold;" onclick="return confirm('Are you sure you want to delete this Tenant?');"><span style="color:red;">Delete &nbsp;</span><span class="fa fa-trash" style="color:red;"> </a>

                                            <!-- <a href="<?php echo base_url('Home/delete_flat_tenant/').$i.'/'.$flat[0]['property_id'];?>" class="text-primary float-right" style="text-decoration : none; font-weight:bold; " onclick="alert('Are You Sure,You Want To Delete !!!!')"><span style="color:red;">Delete &nbsp;</span><span class="fa fa-trash" style="color:red;"> </a> -->

                                        </div>

                                </div>
                                </div>
                            </div>
                        </div>
                       <?php } else { ?>

                        <div class="col-md-3 mb-3">
                            <div class="card border-danger" style=" border-radius: 10%;">
                                <div class="card-body bg-danger" style="padding:1px;  border-radius: 10%;  ">
                                    <!-- <div class="card-body text-white" style="background-color:#32CD32;"> -->
                                    <div class="card-body text-white" style="background-color: #cc1100 ;  border-radius: 10%;  ">
                                        
                                        <span class="float-right summary_icon"> <i class="fa fa-home" style="color:black;"></i></span>
                                        <h4 style="color:black;"><b><i><?php echo "Flat No : ".$i; ?></i></b></h4>
                                        <h6 style="color:black;"><b><i>Empty</i></b></h6>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="<?php echo base_url('Home/tenant_details/').$i.'/'.$flat[0]['property_id']; ?>" class="text-primary float-right" style="text-decoration : none; font-weight:bold;">View <span class="fa fa-angle-right"></span></a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                       <?php }?>
                       <?php } ?>
                    </div>

                    
                </div>
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
 