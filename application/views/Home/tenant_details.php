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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />

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
        margin:1% 3% 0% 3%;    
    }

    </style>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?php echo base_url('css/sidebar.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
  </head>
<body>
  <main>  
<!-- <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;height:100vh;">
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
        <a href="<?php echo base_url('Payments') ?>" class="nav-link text-white">Payments</a>
      </li>
      <li>
        <a href="<?php echo base_url('Report/month_of_payment') ?>" class="nav-link text-white">Report</a>
      </li>
    </ul>
    <hr>
  </div> -->

<div class="homediv">
<h2 style="color:red; font-style:italic; font-weight:bold;"> Tenant Details</h2>
<div class="containe-fluid">
<div class="row mt-3 ml-3 mr-3">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<form action="<?php echo base_url('Home/insert_tenant_details');?>" method="post">
<div class="row">
    <div class="form-group col">
    <label>Full Name:</label>
    <input type="text" class="form-control"  name="name"  placeholder="Enter your name">
     </div>
     <div class="form-group col">
    <label>Father's / Husband's Name :</label>
    <input type="text" class="form-control" name="father_name"  placeholder="Enter your father name">
     </div>
     <div class="form-group col">
    <label>Flat Name:</label>
    <input type="text" class="form-control" name="flat_name"  placeholder="Enter the flat name">
     </div>
     
  </div>
  <br>
  <div class="row">
    <div class="form-group col">
    <label>Date of Birth:</label>
    <input type="date" class="form-control" name="dob"  placeholder="Enter your date of birth">
    </div>
    <div class="form-group col">
    <label>Gender:</label>
    <select class="form-control" name="gender">
    <option value="" selected disabled>Select Gender</option>
    <option value="male">Male</option>
    <option value="female">Female</option>
    <option value="others">Others</option>
    </select>
     </div>
     <div class="form-group col">
    <label>Age:</label>
    <input type="number" class="form-control" name="age"  placeholder="Enter your Age">
     </div>
     <div class="form-group col">
    <label>Aadhaar Number:</label>
    <input type="number" class="form-control" name="Aadhaar"  placeholder="Enter your aadhaar no">
    </div>
    
    
  </div>

     <br>

  <div class="row">
    
    <div class="form-group col">
    <label>Mobile Number:</label>
    <input type="number" class="form-control" name="mobile"  placeholder="Enter your mobile no">
     </div>
     <div class="form-group col">
    <label>Email address:</label>
    <input type="email" class="form-control" name="email"  placeholder="Enter email address">
    </div>
    <div class="form-group col">
    <label>Joining Date:</label>
    <input type="date" class="form-control" name="joining_date" placeholder="Enter joining date">
  </div>
  <div class="form-group col">

    <label>Rent of Flat:</label>
    <input type="number" class="form-control" name="rent" placeholder="Enter rent of flat" >
    </div>
  </div>
  <br>

   <div class="row">
    <h4>Address:</h4>
    <br>
    
    <div class="form-group col">
    <label>Permanent Address:</label>
    <input type="text" class="form-control" name="address" placeholder="Enter your Permanent Address">
     </div>
  </div>
  <br>
   <div class="row">
    <div class="form-group col">
    <label>District:</label>
    <input type="text" class="form-control" name="district" placeholder="Enter the District">
     </div>
     <div class="form-group col">
    <label>State:</label>
    <input type="text" class="form-control" name="state" placeholder="Enter State">
     </div>
     <div class="form-group col">
    <label>Polic Station:</label>
    <input type="text" class="form-control" name="polic_station" placeholder="Enter">
     </div>
  </div>
  <br>
    <!-- <div class="row">
      <h4>Details of Family Members</h4>
      <br>
    <div class="form-group col">
    <label>Family Members:</label>
    <input type="number" class="form-control" name="members"  placeholder="Enter members in the family">
     </div>
    
    </div> -->
  <!--    <div>
      
      <h4>Details of Family Members</h4>
    <div class="container my-4">
      <div class="card my-4 shadow">
        <div class="card-body">
          
            <div>
              <label>Name :</label>
              <input type="text" class="form-control" name="member_name[]"/>
              <br>
            </div>
            <div>
              <label>Father's Name :</label>
              <input type="text" class="form-control" name="member_father_name"/>
              <br>
            </div>
            <div class="row">
            <div class ="form-group col">
              <label>Age :</label>
              <input type="number" class="form-control" name="member_age"/>
              <br>
            </div>
             <div class="form-group col">
            <label>Gender</label>
            <select class="form-control" name="member_gender">
            <option value="" selected disabled>Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="others">Others</option>
            </select>
             </div>
             <br>
             <div class="form-group col">
            <label>Relation</label>
            <select class="form-control" name="member_relation">
            <option value="" selected disabled>Select the Relation</option>
            <option value="father">Father</option>
            <option value="mother">Mother</option>
            <option value="husband">Husband</option>
            <option value="wife">Wife</option>
            <option value="child">Child</option>
            <option value="others">Others</option>
            </select>
             </div> 
           
              </div>
             <div class="row">
            <div class ="form-group col">
              <label>Mobile No :</label>
              <input type="number" class="form-control" name="member_mobile_no"/>
              <br>
            </div>
            <div class ="form-group col">
              <label>Aadhar No :</label>
              <input type="number" class="form-control" name="member_aadhar"/>
              <br>
            </div>
            </div>
            <div class="clearfix mt-4">
              <button type="button" id="add-button" class="btn btn-secondary float-left text-uppercase shadow-sm"><i class="fas fa-plus fa-fw"></i> Add</button>
              <button type="button" id="remove-button" class="btn btn-secondary float-left text-uppercase ml-1" disabled="disabled"><i class="fas fa-minus fa-fw"></i> Remove</button> 
               <button type="submit" class="btn btn-primary float-right text-uppercase shadow-sm">Submit</button> 
             </div>
        
        </div>
      </div>
      
    </div>
    </div>  -->


    <div>
        <h4>Details of Family Members</h4>
        <br>
        <div class="row">
    <div class="form-group col">
    <label>Number of Members:</label>
    <input type="number" class="form-control" name="no_of_members" placeholder="Enter">
     </div>
     <div class="form-group col">
    <label>Number of Male:</label>
    <input type="number" class="form-control" name="no_of_male" placeholder="Enter">
     </div>
     <div class="form-group col">
    <label>Number of Female:</label>
    <input type="number" class="form-control" name="no_of_female" placeholder="Enter">
     </div>
     <div class="form-group col">
    <label>Children below 5 years:</label>
    <input type="number" class="form-control" name="no_of_children_below_5" placeholder="Enter">
     </div>

  </div>
        <div class="container my-4">
            <div class="card my-4 shadow">
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col">
                        <label>Name :</label>
                        <input type="text" class="form-control" name="member_name[]"/>
                        <br>
                    </div>
                    <div class="form-group col">
                        <label>Father's / Husband's Name :</label>
                        <input type="text" class="form-control" name="member_father_name[]"/>
                        <br>
                    </div>  
                    <div class="form-group col">
                            <label>Age :</label>
                            <input type="number" class="form-control" name="member_age[]"/>
                            <br>
                        </div>                 
                      </div>
                      <div class="row">
                        <div class="form-group col">
                            <label>Gender:</label>
                            <select class="form-control" name="member_gender[]">
                                <option value="" selected disabled>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label>Relation:</label>
                            <select class="form-control" name="member_relation[]">
                                <option value="" selected disabled>Select the Relation</option>
                                <option value="father">Father</option>
                                <option value="mother">Mother</option>
                                <option value="husband">Husband</option>
                                <option value="wife">Wife</option>
                                <option value="child">Son</option>
                                <option value="Daughter">Daughter</option>
                                <option value="others">Others</option>
                            </select>
                        </div> 
                        <div class ="form-group col">
                            <label>Mobile No :</label>
                            <input type="number" class="form-control" name="member_mobile_no[]"/>
                            <br>
                        </div>
                        <div class ="form-group col">
                            <label>Aadhar No :</label>
                            <input type="number" class="form-control" name="member_aadhar[]"/>
                            <br>
                          </div>
                    </div>
                    <div class="row">
                    
                        
                        </div>
                      
                        <div class="clearfix mt-4">
              <button type="button" id="add-button" class="btn btn-secondary float-left text-uppercase shadow-sm"><i class="fas fa-plus fa-fw"></i> Add</button>
              <button type="button" id="remove-button" class="btn btn-secondary float-left text-uppercase ml-1" disabled="disabled"><i class="fas fa-minus fa-fw"></i> Remove</button> 
               <!-- <button type="submit" class="btn btn-primary float-right text-uppercase shadow-sm">Submit</button>  -->
             </div>
                      </div>
                    </div>
                  </div>
                </div>


<div class="row">
      <h4>Vehicle detail:</h4>
      <br>
    <div class="form-group col">
    <label>No. of two wheeler:</label>
    <input type="text" class="form-control" name="two_wheeler"  placeholder="Enter Here">
    </div>
    <div class="form-group col">
    <label>No. of four wheeler:</label>
    <input type="text" class="form-control" name="four_wheeler" placeholder="Enter Here">
    </div>
    </div>
    <br>
  
    <div class="row">
       <h4>Occupation detail:</h4>
      <br>
      <div class="form-group col">
    <label>Occupation of the Tenant:</label>
    <input type="text" class="form-control" name="occupation" placeholder="Enter the Occupation">
  </div>
    <div class="form-group col">

    <label>Office/College/School Address:</label>
    <input type="text" class="form-control" name="occupation_address" placeholder="Enter the Address">
    </div>
    <div class="form-group col">

    <label>Office contact Number:</label>
    <input type="text" class="form-control" name="occupation_contact" placeholder="Enter the Contact No">
    </div>
     </div>
     <br>
    
     <div class="row">
       <h4>Local Identifier/ Granter</h4>
       <h5>1:</h5>
      <br>
      <div class="form-group col">
    <label>Name:</label>
    <input type="text" class="form-control" name="identifier_name1" placeholder="Enter the Identifier's Name">
  </div>
    <div class="form-group col">

    <label>Mobile No:</label>
    <input type="number" class="form-control" name="identifier_mobile1" placeholder="Enter the mobile no">
    </div>
    <div class="form-group col">

    <label>Email ID:</label>
    <input type="email" class="form-control" name="identifier_email1" placeholder="Enter Email ID">
    </div>
     </div>
     <br>
    
     <div class="row">
      <div class="form-group col">
    <label>Address:</label>
    <input type="text" class="form-control" name="identifier_address1" placeholder="Enter the Address">
  </div>
     </div>
     <br>
    
     <div class="row">
      <div class="form-group col">
    <label>District:</label>
    <input type="text" class="form-control" name="identifier_district1" placeholder="Enter the District">
  </div>
    <div class="form-group col">

    <label>State:</label>
    <input type="text" class="form-control" name="identifier_state1" placeholder="Enter the State">
    </div>
    <div class="form-group col">
    <label>Police Station:</label>
    <input type="text" class="form-control" name="identifier_policestation1" placeholder="Enter">
  </div>
     </div>
     
<br>

 <div class="row">
       <h4>Local Identifier/ Granter</h4>
       <h5>2:</h5>
      <br>
      <div class="form-group col">
    <label>Name:</label>
    <input type="text" class="form-control" name="identifier_name2" placeholder="Enter the Identifier's Name">
  </div>
    <div class="form-group col">

    <label>Mobile No:</label>
    <input type="number" class="form-control" name="identifier_mobile2" placeholder="Enter the mobile no">
    </div>

    <div class="form-group col">

    <label>Email ID:</label>
    <input type="email" class="form-control" name="identifier_email2" placeholder="Enter Email ID">
    </div>
     
     </div>
     <br>
    
     <div class="row">
      <div class="form-group col">
    <label>Address:</label>
    <input type="text" class="form-control" name="identifier_address2" placeholder="Enter the Address">
  </div>
     </div>
     <br>
    
     <div class="row">
      <div class="form-group col">
    <label>District:</label>
    <input type="text" class="form-control" name="identifier_district2" placeholder="Enter the District">
  </div>
    <div class="form-group col">

    <label>State:</label>
    <input type="text" class="form-control" name="identifier_state2" placeholder="Enter the State">
    </div>
    <div class="form-group col">
    <label>Police Station:</label>
    <input type="text" class="form-control" name="identifier_policestation2" placeholder="Enter">
  </div>
     </div>
<br>


  <input type="hidden" name="flat_no" value="<?php echo $flat_no; ?>" >
  <input type="hidden" name="property_id" value="<?php echo $property_id; ?>" >
  
  <!-- <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
</form>
</div>
</div></div></div></div></div>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 
    <script  src="./script.js"></script>
    <script>
      // Get the add and remove buttons
const addButton = document.getElementById('add-button');
const removeButton = document.getElementById('remove-button');

// Add event listener to add button
addButton.addEventListener('click', () => {
  // Get the container where the new member details will be added
  const container = document.querySelector('.container');

  // Create a new member details card
  const newCard = document.createElement('div');
  newCard.classList.add('card', 'my-4', 'shadow');

  // Set the card's HTML content
  newCard.innerHTML = `
        <div class="card-body">
                  <div class="row">
                    <div class="form-group col">
                        <label>Name :</label>
                        <input type="text" class="form-control" name="member_name[]"/>
                        <br>
                    </div>
                    <div class="form-group col">
                        <label>Father's Name :</label>
                        <input type="text" class="form-control" name="member_father_name[]"/>
                        <br>
                    </div>
                     <div class="form-group col">
                            <label>Age :</label>
                            <input type="number" class="form-control" name="member_age[]"/>
                            <br>
                        </div>
                      </div>
                    <div class="row">
                    <div class="form-group col">
                            <label>Gender</label>
                            <select class="form-control" name="member_gender[]">
                                <option value="" selected disabled>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label>Relation</label>
                            <select class="form-control" name="member_relation[]">
                                <option value="" selected disabled>Select the Relation</option>
                                <option value="father">Father</option>
                                <option value="mother">Mother</option>
                                <option value="husband">Husband</option>
                                <option value="wife">Wife</option>
                                <option value="child">Child</option>
                                <option value="others">Others</option>
                            </select>
                        </div> 
                        <div class ="form-group col">
                            <label>Mobile No :</label>
                            <input type="number" class="form-control" name="member_mobile_no[]"/>
                            <br>
                        </div>
                        <div class ="form-group col">
                            <label>Aadhar No :</label>
                            <input type="number" class="form-control" name="member_aadhar[]"/>
                            <br>
                          </div>
                        </div>
                      </div>
  `;

  // Add the new card to the container
  container.appendChild(newCard);

  // Enable the remove button
  removeButton.disabled = false;
});

// Add event listener to remove button
removeButton.addEventListener('click', () => {
  // Get the container that holds all the member details cards
  const container = document.querySelector('.container');

  // Get all the member details cards
  const cards = container.querySelectorAll('.card');

  // If there is only one card left, disable the remove button
  if (cards.length === 1) {
    removeButton.disabled = true;
  }

  // Remove the last card
  container.removeChild(cards[cards.length - 1]);
});

    </script>

</body>
</html>
