<?php include("includes/header.html")?>

      <!-- input start -->
        <form class="input_form" id="formId" action="submit.php" method="POST" autocomplete="off" >
            <div class="col-md-12">
                <div class="input_heading text-center">
                    <h2>Input Form</h2>
                </div>
            </div>
                    
              <!-- input start -->
            <select class="form-select form-select-lg mb-3" name='salutation' aria-label=".form-select-lg example">
                <option disabled selected>Select Salutation</option>
                <option value="Mr">Mr.</option>
                <option value="Ms">Ms.</option>
                <option value="Mrs">Mrs.</option>
            </select>
                
                <input class="form-control form-control-lg" id="fname" name='fname' type="text" placeholder="First Name*" aria-label=".form-control-lg example" >
                <p id="error1"></p>
                
                <input class="form-control form-control-lg" id='lname' name='lname' type="text" placeholder="Last Name*" aria-label=".form-control-lg example" >
                <p id="error2"></p>

                <input class="form-control form-control-lg" id='tel' name='tel' type="text" placeholder="Mobile Phone Number" aria-label=".form-control-lg example" oninput="checkTelephone()">
                <p id="error3"></p>

                <input class="form-control form-control-lg" id='email' name='email' type="text" placeholder="Email" aria-label=".form-control-lg example" oninput="checkEmail()">
                <p id="error4"></p>
              
            <button type="submit" class="btn btn-primary btn-lgn" id="submit-btn" >SUBMIT</button>

        </form>
        

    <!-- input end -->
   
    <?php include("includes/footer.html")?>

