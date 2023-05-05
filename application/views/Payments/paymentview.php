<!DOCTYPE html>
<html>
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
	.homediv{
	width:75%;
	height:100%;
	margin:3%;    
    }
	td{
		vertical-align: middle !important;
	}
	td p{
		margin: unset
	}
	img{
		max-width:100px;
		max-height: :150px;
	}
	.card{
		margin-left: 15px;
		margin-right: 15px;
	}
	#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}
	#edit_overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}
#text{
  position: absolute;
  top: 50%;
  left: 50%;
  height:70vh;
  width:40vw;
  border-radius:10px;
  /* font-size: 50px; */
  background-color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
  display:flex;
  justify-content:center;
  align-items:center;
}
form{
	width:80%;
}
#name{
	width:70%;
	height:5vh;
}
</style>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('css/sidebar.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div id="overlay">
  <div id="text">
  <form action="<?php echo base_url('Payments/add_new_entry'); ?>" method="POST">
  <div class="form-group" style="font-size:20px;font-weight:bold;">New Invoice</div>
  <hr>
    <div class="form-group">
    <label for="name"><b>Full Name<span style="color:red;">*</span> : </b></label>&emsp;
    <select name="tenant_id" id="name">
		<option value="">Select tenant for payment</option>
		<?php foreach($tenants as $t){ ?>
			<option value="<?php echo $t['id']; ?>"><?php echo $t['name']; ?></option>
		<?php } ?>
	</select>
     </div>
	 <br>

     <div class="form-group">
    <label for="invoice"><b>Invoice<span style="color:red;">*</span> :</b></label>
    <input type="text" class="form-control" id="invoice" name="invoice"  placeholder="Enter invoice number" required>
     </div>
 	 <br>
    <div class="form-group">
    <label for="amount"><b>Amount Paid<span style="color:red;">*</span> :</b></label>
    <input type="number" class="form-control" id="amount" name="amount"  placeholder="Enter amount" required>
    </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>&emsp;
  <button class="btn btn-danger"  onclick="off()">Cancel</button>
</form>
  </div>
</div>
<div id="edit_overlay">
  <div id="text">
  <form action="<?php echo base_url('Payments/edit_entry'); ?>" method="POST">
  <input type="hidden" name="id" id="sno" />
  <input type="hidden" name="tenant_id" id="tenant_id" />
  <div class="form-group" style="font-size:20px;font-weight:bold;">Edit Invoice</div>
  <hr>
    <div class="form-group">
    <label for="name" style="font-size:20px;"><b>Full Name<span style="color:red;">*</span> : <span id="selected"></span></b></label>&emsp;
     </div>
    <br>
     <div class="form-group">
    <label for="invoice" style="font-size:20px;"><b>Invoice<span style="color:red;">*</span> : <span id="edit_invoice"></span></b></label>
     </div>
 	 <br>
    <div class="form-group">
    <label for="amount"><b>Amount Paid<span style="color:red;">*</span> :</b></label>
    <input type="number" class="form-control" id="edit_amount" name="amount"  placeholder="Enter amount" required>
    </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>&emsp;
  <button class="btn btn-danger"  onclick="edit_entry_off()">Cancel</button>
</form>
  </div>
</div>
	<main>

	<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;height:100vh;">
  <h4><?php echo $_SESSION['user']; ?></h4>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="<?php echo base_url('Home') ?>" class="nav-link text-white" aria-current="page">Home</a>
      </li>
      <li>
        <a href="<?php echo base_url('Payments') ?>" class="nav-link text-white">Payments</a>
      </li>
      <li>
        <a href="#" class="nav-link text-white">Report</a>
      </li>
    </ul>
    <hr>
  </div>

<div class="homediv">
  <div class="containe-fluid">
	<div class="row mt-3 ml-3 mr-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

						<b style="font-style:italic; font-size: 23px; color:red;">List of Payments</b>&emsp;

						<span>
							<button class="btn btn-primary"  onclick="on()">New Entry</button>
						</span>
					</div>
					<div class="card-body" style="height:70vh; overflow-x: hidden; overflow-y: auto;">
						<table class="table table-condensed table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">S.No</th>
									<th class="">Date</th>
									<th class="">Tenant</th>
									<th class="">Invoice</th>
									<th class="">Amount</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								
									<?php $i=1; foreach ($payment_details as $row) { ?>
										

										<tr>
									<td class="text-center"><?php echo $i++ ?></td>
									<td>
										<?php echo date('d M, Y',strtotime($row['date_created'])) ?>
									</td>
									<td class="">
										 <p> <b><?php echo ucwords($row['name']) ?></b></p>
									</td>
									<td class="">
										 <p> <b><?php echo ucwords($row['invoice']) ?></b></p>
									</td>
									<td class="text-right">
										 <p> <b><?php echo number_format($row['amount'],2) ?></b></p>
									</td>
									<td class="text-center">
										<button class="btn btn-sm btn-outline-primary edit_invoice" type="button" id="<?php echo $row['sno']."/".$row['tenant_id']."/".$row['name']."/".$row['invoice']."/".$row['amount']."/".$row['date_created']; ?>" onclick="edit_entry(this.id);">Edit</button>
										<a href="#" class="btn btn-sm btn-outline-danger delete_invoice" type="button" id="<?php echo $row['sno']; ?>" onclick="delete_entry(this.id);">Delete</a>
									</td>
								</tr>
								<?php	} ?>
								
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- Table Panel -->
		</div>
	</div>	

</div>


</main>

<script>

function on() {
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
}

function edit_entry(id){
	var temp = id.split("/");
	console.log(temp);
	document.getElementById("sno").value = temp[0];
	document.getElementById("tenant_id").value = temp[1];
	document.getElementById("selected").innerHTML = temp[2];
	document.getElementById("edit_invoice").innerHTML = temp[3];
	document.getElementById("edit_amount").value = temp[4];
	document.getElementById("edit_overlay").style.display = "block";
}

function edit_entry_off(){
	document.getElementById("edit_overlay").style.display = "none";
}

function delete_entry(id){
	var check = confirm("Are You Sure !!!");
  if(check){
    document.getElementById(id).setAttribute("href","<?php echo base_url('Payments/delete_entry/') ?>"+id);
  }
  console.log(check);
}



</script>
</body>
</html>
