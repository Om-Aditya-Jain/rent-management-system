<?php
// echo "<pre>";
// print_r($property_id);
// echo "<br>";
// print_r($month);
// echo "<br>";
// print_r($rate_per_unit);
// echo "<br>";
// print_r($rate_per_person);
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
  </div>
  <div class="homediv">

      <?php
    if($msg = $this->session->flashdata('entry_form_inserted')) {?>
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
                    <div style="font-style:italic; font-size: 20px; color:red; font-size: 25px;"><b><i><?php echo $flat[0]['property_address'];?></i></b> &emsp;
                    
                    </div>
                    <hr>
                    <div class="row" style="height:65vh; overflow-x: hidden; overflow-y: auto;">
                        <?php for($i =1; $i<=sizeof($flats); $i++){
                          if($flats[$i] == 1){
                        ?>

                          <div class="col-md-3 mb-3">
                            <div class="card border-danger">
                                <div class="card-body bg-danger" style="padding:1px;">
                                    <div class="card-body text-white" style="background-color: red ;">
                                        <span class="float-right summary_icon"> <i class="fa fa-home" style="color:black;"></i></span>
                                        <h4 style="color:black;"><b><i><?php echo "Flat No : ".$i; ?></i></b></h4>
                                        <h6 style="color:black;"><b><i>Occupied </i></b></h6>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="<?php echo base_url('EntryForm/entry_form/').$i.'/'.$flat[0]['property_id'].'/'.$flat[0]['property_name'].'/'.$flat[0]['flats'].'/'.$flat[0]['active'].'/'.$month.'/'.$rate_per_unit.'/'.$rate_per_person.'/'.$waste; ?>" class="text-primary float-right" style="text-decoration : none; font-weight:bold;">View <span class="fa fa-angle-right"></span></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                       <?php } ?>
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
 