<?php
// echo "<pre>";
// print_r($payment_details);
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
            font-family: Comic Sans MS;
        }

        table {
          background-color: #fcfbf8;
          font-family: Comic Sans MS;
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
                        <h2 style="text-align:center;"><?php echo "Flat No.".$flat_no; ?></h2>
                        <br>
                    <table class="table table-striped table-hover table-bordered" style="width:90%" align="center">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col" style="text-align:center;">S.No.</th>
                            <th scope="col" style="text-align:center;">Month</th>
                            <th scope="col" style="text-align:center;">Amount Received</th>
                            <th scope="col" style="text-align:center;">Mode of Payment</th>
                            <th scope="col" style="text-align:center;">Reference ID</th>
                            <th scope="col" style="text-align:center;">Receiver</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                $i=1;
                                foreach ($payment_details as $key => $value) { ?>
                                    
                            <tr>
                            <td rowspan="<?php echo sizeof($value['payments'])+1; ?>" style="text-align: center;"><?php echo $i ?></td>
                            <td rowspan="<?php echo sizeof($value['payments'])+1; ?>" style="text-align: center;"><?php echo $value['month']; ?></td>
                            <?php foreach($value['payments'] as $v){ ?>
                            <tr>
                            <td style="text-align: center;"><?php echo $v['amount']; ?></td>
                            <td style="text-align: center;"><?php echo $v['pay_mode']; ?></td>
                            <td style="text-align: center;"><?php echo $v['reference_id']; ?></td>
                            <td style="text-align: center;"><?php echo $v['payment_receiver']; ?></td>
                            </tr>
                            <?php } ?>
                            </tr>

                            <?php } ?>
                        </tbody>
                        </table>
                    </div>

                    
                <!-- </div> -->

</div></div></div></div>



</body>
</html>


