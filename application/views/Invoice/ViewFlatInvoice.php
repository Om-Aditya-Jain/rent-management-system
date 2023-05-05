<?php
// echo "<pre>";
// print_r($data);
// die();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Devanagari+Hindi:ital@0;1&display=swap" rel="stylesheet">
    <style>
    *{
        margin:0px;
        padding:0px;   
    }
    </style>
  </head>
  <body>
    <div class="maindiv" style=" min-height:500px;
        max-width:400px;
        border:5px solid black;
        padding:0px 5px;
        margin:2% auto;
        font-family: 'Tiro Devanagari Hindi', serif;
        font-size: 14px;
        ">
        <div class="upperdiv">
          <?php 
          $array = explode(" ", $data['tenant_name']);
          foreach ($array as $key) {
            $tenant_name = $key;
          }
          $amount_paid=0;
          foreach ($paid_amount as $key) {
            $amount_paid += $key['amount'];
          }
         $water_units = $details[0]['water_rate']*$details[0]['no_of_members']; 
          $electricity_units = $data['electricity_units']; 
          $total_unit = $details[0]['electricity_rate']*($electricity_units + $water_units);
          $total_unit_price = $details[0]['electricity_rate']*$electricity_units; 
          $others = $details[0]['waste'] + $details[0]['miscellaneous'];
          // $total_others = $water_units + $total_unit_price + $details[0]['waste'] + $details[0]['miscellaneous'];

           

          
          if(empty($previous_outstanding)){
            $prev_oustanding=0;
          }else{
            $prev_oustanding=$previous_outstanding[0]['outstanding_amount'];
          }
          // print_r($previous_outstanding);
          // die();
          $total_amount_to_pay = $total_unit+$details[0]['rent']+$prev_oustanding+$others;
          $outstanding_amount = $total_amount_to_pay-$amount_paid;
          ?>
            <h5 style="text-align:center;margin-top:5px;"><u>हिसाब पर्ची</u></h5>
            <p style="margin-bottom:0px;"><span>क्र.: <b><?php if(isset($data['invoice'])){echo $data['invoice'];}else{ ?>...............<?php } ?></b></span><span style="margin-left:150px">दिनांक: <b><?php if(isset($data['timestamp'])) echo date('d-m-Y',strtotime($data['timestamp'])) ?></b></span></p>
            <p style="margin-bottom:0px;">नाम श्री/श्रीमती: <b><?php echo $tenant_name." Ji"; ?></b> </p>
            <p style="margin-bottom:0px;"><span>किराया माह: <b><?php echo date("F Y", strtotime($month)); ?></b></span><span style="margin-left:80px">कमरा नं: <b><?php echo $details[0]['flat_no'];?><span style="color:blue; font-size:19px;"> (<?php echo $flat_name; ?>) </span>
      </b></span></p>
            <hr style="height: 5px; background: black;">
            <p style="margin-bottom:0px;">1. वर्तमान मी. रीडिंग - पिछला मी. रीडिंग:&nbsp;<b><?php echo $details[0] ['current_meter_reading']?>-<?php echo $details[0] ['previous_meter_reading']?>=</b>&nbsp;<b><?php echo $data['electricity_units']; ?>  यूनिट</b>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">2. प्रति सदस्य/माह पम्प यूनिट: &emsp;<b><?php echo $details[0]['no_of_members']."×". $details[0]['water_rate']." = ".$water_units; ?>&nbsp;यूनिट</p></b>
            <p style="margin-bottom:0px;">&emsp;(यूनिट × सदस्य संख्या)</p> 
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">3. कुल खपत यू (1+2) * दर: &nbsp;<b>(<?php echo $data['electricity_units']; ?></b>+<b><?php echo $water_units; ?>) × <b><?php echo $details[0]['electricity_rate']?></b></b>&nbsp;=
              <b><?php echo $total_unit; ?> ₹</b>
            </p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">4. कमरे का किराया: &emsp;<b><?php echo $details[0]['rent']; ?> ₹</b></p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">5. पिछला बिल का क्र.: <b><?php if(!empty($previous_invoice)){echo $previous_invoice[0]['invoice']. " का "; echo $prev_oustanding; ?> ₹ बाकी<?php }else{ ?>&nbsp;-&nbsp;का&nbsp;₹ 0&nbsp; /- बाकी<?php } ?></b> </p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">6. अन्य (कचरा, इत्यादि ): <b><?php echo $details[0]['waste']."+".$details[0]['miscellaneous']." = ".$others ?></b> </p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">7. कुल (3+4+5+6):&emsp;<b>₹ <?php echo $total_unit."+".$details[0]['rent']."+".$prev_oustanding."+".$others." = ".round($total_amount_to_pay);?> /-</b></p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">8. प्राप्त राशि (दिनांक सहित): &emsp;<b>₹ <?php foreach ($paid_amount as $key) {
              echo $key['amount']."+";
            }?> = <?php echo $amount_paid; ?>/- (<?php if(!empty($paid_amount)){echo $paid_amount[0]['payment_date'];}else{echo "Nil";}?>)</b></p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">9. शेष राशि: &emsp;<b>₹ <?php echo round($total_amount_to_pay)." - "; ?><?php if(!empty($amount_paid)){echo $amount_paid; }else{echo "0";} ?><?php echo " = ".$outstanding_details[0]['outstanding_amount']; ?></b> /-</p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">भुगतान दिनांक: <b><?php echo date("d-m-Y",strtotime($details[0]['duedate'])); ?></b> तक आवश्यक |</p>
            <h4 style="margin:15px 0px 0px 30px;"><?php if($outstanding_details[0]['outstanding_amount']>=0){ ?>बाकी : <b>₹ <?php echo $outstanding_details[0]['outstanding_amount']; ?></b><?php }else{ ?>जमा: <b>₹ <?php echo (0-$outstanding_details[0]['outstanding_amount']); ?></b><?php } ?></h4>
            <!-- <p style="margin-bottom:0px; float:right; margin-right:50px;">ह०</p> -->

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>