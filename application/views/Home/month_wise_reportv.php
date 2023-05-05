<?php

// print_r($flat_name);
// die();
if (!defined('BASEPATH')) exit('No direct script access allowed');
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

                        <h2 style="text-align:center;"><?php echo "Flat No.".$flat_no." (". $flat_name[0]['flat_name']. ")"; ?></h2>

                        <br>
                    <table class="table table-striped table-hover table-bordered" style="width:90%" align="center">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col" style="text-align:center;">S.No.</th>
                            <th scope="col" style="text-align:center;">Month</th>
                            <th style="text-align:center;">Invoice No.</th>
                            <th scope="col" style="text-align:center;">Rent</th>
                            <th scope="col" style="text-align:center;">Meter Reading <br> (Current - Previous) * rate</th>
                            <th scope="col" style="text-align:center;">Water Pump Charges <br>( no. of members * units )* rate</th>
                            <th scope="col" style="text-align:center;">Waste </th>
                            <th scope="col" style="text-align:center;">Miscellaneous</th>
                            <th scope="col" style="text-align:center;">Total</th>
                            <th scope="col" style="text-align:center;">Total + Previous Outstanding</th>
    
                            <th scope="col" style="text-align:center;">Payment</th>
                            <th style="text-align:center;">Amount Paid</th>
                            <th scope="col" style="text-align:center;">Outstanding Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=1;$amount=0;
                                foreach ($tenant_entry_form_details as $key => $value) { ?>
                                    
                            <tr>
                            <td scope="row" style="text-align:center;"><?php echo $i ?></td>
                            <td style="text-align:center;"><?php echo $value['month'] ?></td>
                            <?php if(!empty($value['invoice_number'])) {?>
                              <td style="color:green;"><?php echo $value['invoice_number'];?> </td>
                              
                            <?php } else {?>
<td>
                              <form action="<?php echo base_url("Home/generate_invoice"); ?>" method="POST">
                    <input name="invoice_date" type="date"
                  
                        />
                        <input type="hidden" name="property_id" value="<?php echo $property_id; ?>">
                        <input type="hidden" name="flat_no" value="<?php echo $flat_no; ?>">
                        <input type="hidden" name="month" value="<?php echo $value['month']; ?>">
                    <input type="submit" value="Generate" class="btn btn-primary">

                              <!-- <td style="color:red;"><a href="<?php echo base_url("Home/generate_invoice/").$property_id."/".$flat_no."/".$value['month']; ?>" class="btn btn-success">Generate </a></td> -->
                              <?php }?>
                            <td style="text-align:center;"><?php echo $value['rent'] ?></td>


                            <!-- <td style="text-align:center;"><?php if($i==1){$amount = ($value['current_meter_reading']-$previous_reading)*$value['electricity_rate'];
                            echo "(".$value['current_meter_reading']." - ".$previous_reading.") * ".$value['electricity_rate']." = ".$amount;}else{
                                $amount = ($value['current_meter_reading']-$tenant_entry_form_details[$i-2]['current_meter_reading'])*$value['electricity_rate'];
                                echo "(".$value['current_meter_reading']." - ".$tenant_entry_form_details[$i-2]['current_meter_reading'].") * ".$value['electricity_rate']." = ".$amount;
                            } ?></td> -->
                           

                           <td style="text-align:center;"><?php $amount = ($value['current_meter_reading']-$value['previous_meter_reading'])*$value['electricity_rate'];
                            echo "(".$value['current_meter_reading']." - ".$value['previous_meter_reading'].") * ".$value['electricity_rate']." = ".$amount; ?>

                            </td>

                            <?php $total = $value['rent']+( $value['no_of_members']*$value['water_rate']*$value['electricity_rate'])+ $value['waste']+$value['miscellaneous']+$amount; ?>
                            <td><?php echo '('.$value['no_of_members']."*".$value['water_rate'].")*".$value['electricity_rate']."=".$value['no_of_members']*$value['water_rate']*$value['electricity_rate']; ?></td> 
                            
                            <td><?php echo $value['waste'] ?></td>
                            <td><?php echo $value['miscellaneous'] ?></td>
                            <td><?php echo  round($total);  ?></td>
                            <td><?php echo $value['total']; ?></td>
                            <td align="center">
                              <?php if($value['invoice_number']==$last_invoice){ ?>
                                <button style="padding: 9px; background-color: #fce205; border-radius: 5px; border-color:#fce205; ;"><a style="text-decoration: none; font-size: 15px; font-weight: bold; color: black;" href="<?php echo base_url('Home/pay_bill/').$property_id.'/'.$flat_no.'/'.$value['month'];?>">Pay</a></button>
                                <a href="<?php echo base_url("Home/view_flat_invoice/").$property_id."/".$flat_no."/".$value['month']; ?>" class="btn btn-primary">Invoice</a>
                                    
                                <a href="<?php echo base_url("Home/delete_flat_invoice/").$property_id."/".$flat_no."/".$value['month']; ?>" class="btn btn-danger" style="text-decoration : none; " onclick="return confirm('Are you sure you want to delete ?');">Delete</a>

                                <?php }else{ if(!empty($value['invoice_number'])){ ?>
                                    <a href="<?php echo base_url("Home/view_flat_invoice/").$property_id."/".$flat_no."/".$value['month']; ?>" class="btn btn-primary">Invoice</a>

                                    <a href="<?php echo base_url("Home/delete_flat_invoice/").$property_id."/".$flat_no."/".$value['month']; ?>" class="btn btn-danger" style="text-decoration : none;" onclick="return confirm('Are you sure you want to delete ?');">Delete</a>

                                <?php }} ?>
                            </td> 
                            <td style="text-align:center;"><?php echo $value['amount_paid']; ?></td>                           
                            <td style="text-align:center;"> <?php echo $value['outstanding_amount'];?></td>
                            </tr>   

                            <?php   $i++; } ?>

                            
                        </tbody>
                        </table>
                    </div>

                    
                <!-- </div> -->

</div></div></div></div></div>



</body>
</html>


