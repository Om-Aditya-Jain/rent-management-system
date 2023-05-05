<?php
// echo "<pre>";print_r($flat);
// die(); 
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?php echo base_url('css/sidebar.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">


     <style>

     	body{
     		background-color: #f6f4eb;
     	}
     	.box{

/*     	  padding: 140px 20px;*/
			padding: 5% 1%;
		  max-width: 70%;
		  margin: 0 auto;
		}


         .homediv{
        width:100%;
        height:100%;
        margin:3%;    
        box-shadow: 10px 10px 8px #888888;
    }

		.intro{
			font-family: Comic Sans MS;
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
    
    </style>
</head>


<body>
<div class="box" style="padding:0px 0px">	
<div class="homediv">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="col-md-12">

					<div class="intro">
							 <h3><center>Month Wise Report </center></h3>
							 
							</div>
	
					<br>
					<form id="filter-report" action="<?php echo base_url('Report/Report_Monthwise') ?>" method=post id=month>
						<div class="row form-group">
							<label class="control-label col-md-2 offset-md-2 text-right" id="month">Month of: </label>
							<input type="month" name="month" class='from-control col-md-4' value="">
							</div><br>
							<div class="row form-group">
							<button class="btn btn-sm btn-block btn-primary col-md-2 ml-1 offset-md-2"> Filter</button>
						</div>
						<input type="hidden" name="property_id" value="<?php echo $property_id; ?>" >
					</form>
<br><br>

						</div>
						
			
			</div>
		</div>
	</div>
</div>
</div>
<div class="box" style="padding:0px 0px">
<div class="homediv">
<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="col-md-12">
					<div class="intro">
					<h3><center>Flat wise </center></h3><br>
					</div>
					<form id="filter-report" action="<?php echo base_url('Report/Report_flatwise') ?>" method=post id=date>
						<div class="row form-group">
							<label class="control-label col-md-2 offset-md-2 text-right" id="date">From: </label>
							<input type="date" name="from_date" class='from-control col-md-4'>
							</div><br>
							<div class="row form-group">
							<label class="control-label col-md-2 offset-md-2 text-right" id="date">To: </label>
							<input type="date" name="to_date" class='from-control col-md-4'>
							</div><br>
							<div class="row form-group">
							<label class="control-label col-md-2 offset-md-2 text-right" id="flat_no" style = "padding-right:0px">Flat Number: </label>
  							<select class='from-control col-md-4' id="flats" name="flats">
								<option> Select Flat </option>
								<?php 
                                foreach ($flat as $key => $value) { ?>
								<option><?php echo $value['flat_no']."=>".$value['flat_name'];?></option>
							  <?php } ?>
							</select>
							</div><br>
							<div class="row form-group">
							<button class="btn btn-sm btn-block btn-primary col-md-2 ml-1 offset-md-2"> Filter</button>
							</div>
						<input type="hidden" name="property_id" value="<?php echo $property_id; ?>" >
					</form>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>



