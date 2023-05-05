<?php
// echo "<pre>";
// print_r($report_flatwise_details);
// die();  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?php echo base_url('css/sidebar.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">

    <style>
        
        .on-print{
        display: none;
        }

        .box{
          padding: 20px 10px;
          max-width: 100%;
          margin: 0 auto;
        }

        .intro{
            font-family: Times New Roman;
        }

        table {
          background-color: #fcfbf8;
          font-family: Times New Roman;
          border-collapse: collapse;
          width: 100%;
        }

        th {
          
          color: black;
          font-size: 16px;
          font-weight: bold;
          text-align: center;
          padding: 10px;
          border: 1px solid #ddd;
        }

        td {
          text-align: center;
          padding: 10px;
          border: 1px solid #ddd;
        }

        tr:nth-child(even) {
          background-color: #f6f4eb;
        }

        tr:hover {
          background-color: #ddd;
        }

        tbody td:first-child {
          text-align: left;
        }

        tbody td:last-child {
          font-weight: bold;
          color: #0077b6;
        }

        body {
/*            background-color: #fcfbf8;*/
            color: black;
        }
        
    </style>
</head>
<body>
    <!-- <div class="containe-fluid"> -->
<div class="row mt-3 ml-3 mr-3">
<div class="col-lg-12">
<div class="card">
<div class="card-body">

                    <br>
                    <div class="intro">
                    <h2 style="text-align:center;"><b><?php echo $property_name; ?></b></h2>
                    <h1 style="text-align:center;">Flatwise Report</h1>
                    <?php 
                                foreach ($report_flatwise_details as $key => $value) { ?>
                        <?php break;}?>
                        <h4 style="text-align:center;">From: <?php echo $from_date?> To: <?php echo $to_date?></h4>
                    <table class="table table-striped table-hover table-bordered" style="width:100%" align="center">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col" style="text-align:center;">S.No.</th>
                            <th scope="col" style="text-align:center;">Flat No.</th>
                            <th scope="col" style="text-align:center;">Tenant Name</th>
                            <th style="text-align:center;">Invoice No.</th>
                            <th scope="col" style="text-align:center;">Rent</th>
                            <th scope="col" style="text-align:center;">Meter Reading <br> (Current - Previous) * rate</th>
                            <th scope="col" style="text-align:center;">Water Pump Charges <br>( no. of members * units )* rate</th>
                            <th scope="col" style="text-align:center;">Waste </th>
                            <th scope="col" style="text-align:center;">Misc.</th>
                            <th scope="col" style="text-align:center;">Total</th>
                            <th scope="col" style="text-align:center; width:10%">Total + Previous Outstanding</th>
                            <th scope="col" style="text-align:center;">Amount Paid</th>
                            <th scope="col" style="text-align:center;">Outstanding Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=1;$amount=0;
                                foreach ($report_flatwise_details as $key => $value) { ?>
                                    
                            <tr>
                            <?php if(!empty($value['invoice_number'])){?>

                              <!-- sno  -->
                            <td scope="row" style="text-align:center;"><?php echo $i ?></td>
                            <!-- flat no  -->
                            <?php if(!empty($value['flat_name'])){?>
                              <td style="text-align:center;"><?php echo $value['flat_no']; ?><br><span style="color:blue";><?php echo "(".$value['flat_name'].")"?></span></td>
                            <?php }else {?>
                            <td style="text-align:center;"><?php echo $value['tenant_name'];?></td>
                            <?php } ?>
                            <?php if(!empty($value['contact'])){?>
                              <td style="text-align:center;"><?php echo $value['tenant_name']; ?><br><?php echo "(".$value['contact'].")"?></td>
                            <?php }else {?>
                            <td style="text-align:center;"><?php echo $value['tenant_name'];?></td>
                            <?php } ?>
                            <?php if(!empty($value['invoice_number'])) {?>
                              <td style="color:green;"><?php echo $value['invoice_number'];?> </td>
                            <td style="text-align:center;"><?php echo $value['rent'] ?></td>
                            <?php } ?>
                           <td style="text-align:center;"><?php $amount = ($value['current_meter_reading']-$value['previous_meter_reading'])*$value['electricity_rate'];
                            echo "(".$value['current_meter_reading']." - ".$value['previous_meter_reading'].") * ".$value['electricity_rate']." = ".$amount; ?>

                            </td>

                            <?php $total = $value['rent']+( $value['no_of_members']*$value['water_rate']*$value['electricity_rate'])+ $value['waste']+$value['miscellaneous']+$amount; ?>
                            <td><?php echo '('.$value['no_of_members']."*".$value['water_rate'].")*".$value['electricity_rate']."=".$value['no_of_members']*$value['water_rate']*$value['electricity_rate']; ?></td>                            
                            <td><?php echo $value['waste'] ?></td>
                            <td><?php echo $value['miscellaneous'] ?></td>
                            <!-- total -->
                            <td><?php echo round($total); ?></td>
                            <!-- total + previous outstanding -->
                            <td><?php echo $value['total']; ?></td>
                            <!-- amount paid  -->
                            <?php if(!empty($value['payment_date'] && $value['amount_paid'])){?>
                              <td style="text-align:center;"><?php echo $value['amount_paid'];?><br><span style="color:blue";><?php echo "(".$value['payment_date'].")"?></span></td>
                            <?php }else {?>
                            <td style="text-align:center;"><?php echo $value['amount_paid'];?></td>
                            <?php } ?>                        
                            <td style="text-align:center;"> <?php echo $value['outstanding_amount'];?></td>
                            </tr>   
                            <?php $totalamount += $value['amount_paid'];
                            $totaloutstanding +=$value['outstanding_amount'];
                            ?>
                            <?php   $i++;$value['flat_no']++; } }?>
                              
                            <tr>
                  <td style="text-align: center; color:blue; font-weight:bold; font-size:20px;" colspan="11">Total </td>
                  <?php if($totalamount>0){?> 
                    <td style="text-align: center; font-weight:bold; color:green;"><?php echo $totalamount; ?></td>
                  <?php }else{ ?> 
                    <td style="text-align: center; font-weight:bold; color:red;"><?php echo $totalamount; ?></td>
                  <?php } ?> 
                  <?php if($totaloutstanding>0){?> 
                    <td style="text-align: center; font-weight:bold; color:green;"><?php echo $totaloutstanding; ?></td>
                  <?php }else{ ?> 
                    <td style="text-align: center; font-weight:bold; color:red;"><?php echo $totaloutstanding; ?></td>
                  <?php } ?> 
                  </tr>
                        </tbody>
                        </table>
                    </div>
</div></div></div></div></div>
</body>
</html>