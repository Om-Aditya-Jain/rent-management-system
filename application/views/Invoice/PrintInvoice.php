
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Devanagari+Hindi:ital@0;1&display=swap" rel="stylesheet">
    <style>
    *{
        margin:0px;
        padding:0px;   
    }
    body{
      /* display:flex;       */
    }
    </style>
  </head>
  <body>
    <?php foreach($flats as $f){ ?>
        <div class="maindiv" style=" min-height:500px;
        max-width:380px;
        min-width:380px;
        border:2px solid black;
        padding:0px 5px;
        margin:10px 0px 0px 10px;
        display:inline-block;
        font-family: 'Tiro Devanagari Hindi', serif;
        font-size: 14px;
        ">
        <div class="upperdiv">
        <?php 
          $array = explode(" ", $f['tenant_name']);
          foreach ($array as $key) {
            $tenant_name = $key;
          }
          $amount_paid=0;
          foreach ($f['paid_amount'] as $key) {
            $amount_paid += $key['amount'];
          }
          // print_r($f['amount_paid']);die();
          $units = $f['current_meter_reading'] - $f['previous_meter_reading'];
          $water_units = $f['water_rate']*$f['no_of_members']; 
          // $total_units = $units+$water_units; 
          $total_unit = $f['electricity_rate']*($units + $water_units);
          $total_unit_price = $f['electricity_rate']*$units; 
          $others = $f['waste'] + $f['miscellaneous'];
          // $total_others = $water_units + $total_unit_price + $flats[0]['waste'] + $flats[0]['miscellaneous'];
          // echo "<pre>";print_r($f['prev_outstanding']);die();
          $previous_outstanding=$f['prev_outstanding'];
          // $amount_paid=$flats[0]['amount_paid'];
          if(empty($previous_outstanding)){
            $f['prev_outstanding']=0;
          }else{
            $f['prev_outstanding']=$previous_outstanding;
          }
          // print_r($f['prev_outstanding']);die();
          $total_amount_to_pay = $total_unit+$f['rent']+$f['prev_outstanding']+$others;
          $outstanding_amount = $total_amount_to_pay-$amount_paid;
          ?>
            <h5 style="text-align:center;margin-top:5px;"><u>हिसाब पर्ची</u></h5>
            <p style="margin-bottom:0px;"><span>क्र.: <b><?php if(isset($f['invoice'])){echo $f['invoice'];}else{ ?>...............<?php } ?></b></span><span style="margin-left:150px">दिनांक: <b><?php if(isset($f['timestamp'])) echo date('d-m-Y',strtotime($f['timestamp'])) ?></b></span></p>
            <p style="margin-bottom:0px;">नाम श्री/श्रीमती: <b><?php echo $f['tenant_name']." Ji"; ?></b> </p>
            <p style="margin-bottom:0px;"><span>किराया माह: <b><?php echo date("F Y", strtotime($month)); ?></b></span><span style="margin-left:80px">कमरा नं: <b><?php echo $f['flat_no']; ?><span style="color:blue; font-size:19px;"> (<?php echo $f['flat_name']; ?>)</span></b></span></p>
            <hr style="height: 5px; background: black;">
            <p style="margin-bottom:0px;">1. वर्तमान मी. रीडिंग - पिछला मी. रीडिंग:&nbsp;<b><?php echo $f['current_meter_reading']?>-<?php echo $f['previous_meter_reading']?>=</b>&nbsp;<b><?php echo $units; ?>  यूनिट</b>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">2. प्रति सदस्य/माह पम्प यूनिट: &emsp;<b><?php echo $f['no_of_members']."×". $f['water_rate']." = ".$water_units; ?>&nbsp;यूनिट</p></b>
            <p style="margin-bottom:0px;">&emsp;(यूनिट × सदस्य संख्या)</p> 
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">3. कुल खपत यू (1+2) * दर: &nbsp;<b>(<?php echo $units; ?></b>+<b><?php echo $water_units; ?>) × <b><?php echo $f['electricity_rate']?></b></b>&nbsp;=
              <b><?php echo $total_unit; ?> ₹</b>
            </p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">4. कमरे का किराया: &emsp;<b><?php echo $f['rent']; ?> ₹</b></p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">5. पिछला बिल का क्र.: <b><?php if(!empty($f['previous_invoice'])){echo $f['previous_invoice']. " का "; echo $f['prev_outstanding']; ?> ₹ बाकी<?php }else{ ?>&nbsp;-&nbsp;का&nbsp;₹ 0&nbsp; /- बाकी<?php } ?></b> </p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">6. अन्य (कचरा, इत्यादि ): <b><?php echo $f['waste']."+".$f['miscellaneous']." = ".$others ?></b> </p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">7. कुल (3+4+5+6):&emsp;<b>₹ <?php echo $total_unit."+".$f['rent']."+".$f['prev_outstanding']."+".$others." = ".round($total_amount_to_pay);?> /-</b></p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">8. प्राप्त राशि (दिनांक सहित): <b>₹ <?php foreach ($f['paid_amount'] as $key) {
              echo $key['amount']."+";
            }?> = <?php echo $amount_paid; ?>/- (<?php if(!empty($f['payment_date'])){echo $f['payment_date'];}else{echo "Nil";}?>)</b></p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">9. शेष राशि: &emsp;<b>₹ <?php echo round($total_amount_to_pay)." - "; ?><?php if(!empty($amount_paid)){echo $amount_paid; }else{echo "0";} ?><?php echo " = ".$f['outstanding_amount']; ?></b> /-</p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">भुगतान दिनांक: <b><?php echo date("d-m-Y",strtotime($f['duedate'])); ?></b> तक आवश्यक |</p>
            <!-- <h4 style="margin:15px 0px 0px 30px;">बाकी : <b>₹ <?php echo $f['outstanding_amount']; ?></b></h4> -->
            <h4 style="margin:15px 0px 0px 30px;"><?php if($f['outstanding_amount']>=0){ ?>बाकी : <b>₹ <?php echo $f['outstanding_amount']; ?></b><?php }else{ ?>जमा: <b>₹ <?php echo (0-$f['outstanding_amount']); ?></b><?php } ?></h4>
            <!-- <p style="margin-bottom:0px; float:right; margin-right:50px;">ह०</p> -->

        </div>
    </div>
    <?php }?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>