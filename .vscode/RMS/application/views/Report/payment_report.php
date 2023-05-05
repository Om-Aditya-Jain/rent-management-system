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


   
</head>

<body>
	<div class="box">
	<div class="container-fluid">
	<div class="main">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="col-md-12">
				<div class="intro">
							 <h3><center>Receiver Payments Report</center></h3>
							</div>
						
						
						<br>
						<div class="intro">
							 <h4 style="font-style:italic;"><center>Receiver Name: <span style="font-weight:normal; font-style:italic;"><?php echo $payments[0]['payment_receiver'];?></span></center></h4>
							</div>
						
						
						<br>
					 <!-- <div id="report">  -->
						 <!-- <div class="on-print">  -->
						<div class="row">
							<table class="table table-striped table-hover table-bordered">
								<thead>
									<!-- <tr>
										<th style="text-align: center;" colspan="3">Receiver Name</th>
										<td style="text-align: center;"><?php //echo $payments[0]['payment_receiver'];?></td>
                                    </tr> -->
									<tr>
										<th style="text-align: center;">S.No.</th>
										<th style="text-align: center;">Payment Date</th>
										<th style="text-align: center;">Reference Id / Payment Mode</th>
										<th style="text-align: center;">Amount </th>
									</tr>
								</thead>
								<tbody>
									<?php 
										 $i = 1;
										  foreach ($payments as $row) { ?>
										<tr>
										<td style="text-align: center;"><?php echo $i; ?></td>
										<td style="text-align: center;"><?php echo date('M d,Y',strtotime($row['payment_date'])); ?></td>
										<?php if(!empty($row['reference_id'])){ ?>
											<td style="text-align: center;"><?php echo $row['reference_id']; ?></td>
										<?php } else {?>
											<td style="text-align: center;"> Offline Payment </td>
											<?php }?>
										
										<td style="text-align: center;"><?php echo $row['amount'] ?></td>
									 <?php $i++; }?>
									<tr>
									<td style="text-align: center; color:blue; font-weight:bold; font-size:20px;" colspan="3">Total </td>
									<td style="text-align: center; font-weight:bold;"><?php echo $total[0]['total']; ?></td>
									</tr>
									<tr>
									<td style="text-align: center; color:blue; font-weight:bold; font-size:20px;" colspan="3">Receiver Expenditure </td>
									<td style="text-align: center; font-weight:bold;"><?php echo $receiver_expenditure[0]['amount']; ?></td>
									</tr>	
									<tr>
									<td style="text-align: center; color:red; font-weight:bold; font-size:20px;" colspan="3">Grand Total (Amount Received - Expenditure)</td>
									<td style="text-align: center; font-weight:bold;"><?php echo $total[0]['total'] - $receiver_expenditure[0]['amount']; ?></td>
									</tr>	
								</tbody>
							</table>
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


