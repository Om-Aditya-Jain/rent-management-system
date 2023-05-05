<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
        border:2px solid black;
        padding:0px 5px;
        margin:5px 2px;
        display:inline-block;
        font-family: 'Tiro Devanagari Hindi', serif;
        ">
        <div class="upperdiv">
          <?php 
          $water_units = $f['water_rate']*$f['no_of_members']; 
          $total_units = $f['electricity_units']; 
          $total_unit_price = $f['electricity_rate']*$total_units; 
          $total_others = $total_unit_price + $water_units + $f['waste'] + $f['miscellaneous'];
          $total_amount_to_pay = $f['rent']+$total_others; 
          $outstanding_amount = $total_amount_to_pay-$f['amount_paid'];
          ?>
            <h5 style="text-align:center;margin-top:5px;"><u>हिसाब पर्ची</u></h5>
            <p style="margin-bottom:0px;"><span>क्र. <?php if(isset($f['invoice'])){echo $f['invoice'];}else{ ?>...............<?php } ?></span><span style="margin-left:150px">दिनांक <?php if(isset($f['timestamp'])) echo date('d-m-Y',strtotime($f['timestamp'])) ?></span></p>
            <p style="margin-bottom:0px;">नाम श्री/श्रीमती <?php echo $f['tenant_name']; ?></p>
            <p style="margin-bottom:0px;"><span>किराया माह <?php echo date("F", strtotime($f['month']))." ".date("Y", strtotime($f['month'])); ?></span><span style="margin-left:120px">कमरा नं <?php echo $f['flat_no']; ?></span></p>
            <hr style="height: 5px; background: black;">
            <p style="margin-bottom:0px;">1. वर्तमान - पिछला मी. रीडिंग यू &emsp;<?php echo $f['electricity_units']; ?> यू (लगभग)</p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">2. प्रति सदस्य/माह पम्प यूनिट &emsp;<?php echo $f['water_rate']."*".$f['no_of_members']." = ".$water_units; ?> यू</p>
            <p style="margin-bottom:0px;">&emsp;(यूनिट * सदस्य संख्या)</p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">3. कुल खपत यू (1+2) * दर&emsp;₹ <?php echo $f['electricity_units']."*".$f['electricity_rate']." = ".$total_unit_price."+".$water_units."+".$f['waste']."+".$f['miscellaneous']." = ".$total_others; ?></p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">4. कमरे का किराया&emsp;₹ <?php echo $f['rent']; ?></p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">5. पिछला बिल का क्र. <?php echo $f['previous_invoice'];  ?> &nbsp;का&nbsp;₹ <?php echo $f['prev_outstanding']; ?> /- बाकी</p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">6. कुल (3+4+5) &emsp;₹ <?php echo $total_others."+".$f['rent']."+".$f['prev_outstanding']."  = ".$total_amount_to_pay; ?></p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">7. प्राप्त राशि (दिनांक सहित) &emsp;₹ <?php echo $f['amount_paid']."/- ".$f['payment_date']; ?></p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">8. शेष राशि &emsp;₹ <?php echo $total_amount_to_pay." - ".$f['amount_paid']." = ".$f['outstanding_amount']; ?></p>
            <hr style="margin: 3px 0px;">
            <p style="margin-bottom:0px;">भुगतान दिनांक <?php echo date('d-m-Y',strtotime($f['duedate'])); ?> तक आवश्यक |</p>
            <p style="margin-bottom:0px; float:right; margin-right:50px;">ह०</p>

        </div>
    </div>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>