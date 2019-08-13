<?php
	// Include config file
 include_once('config.php'); 


	$name=$gender=$bod=$pob="";
	$name_err=$gender_err=$bod_err=$pob_err="";
	
	
// Processing form data when form is submitted
		if($_SERVER["REQUEST_METHOD"]=="POST"){
		
					// Validate name
						$input_name = trim($_POST["name"]);
							if(empty($input_name)){
							$name_err = "Pleas enter an name";
						}else{
							$name = $input_name;
						}
						
						// Validate gender
						$input_gender = trim($_POST["gender"]);
						if(empty($input_gender)){
						$gender_err = "Pleas enter an gender";
					    }else{
						$gender = $input_gender;
				     	}
						
						// Validate dop
						$input_bod = trim($_POST["bod"]);
						if(empty($input_bod)){
						$bod_err = "Pleas enter an bod";
					    }else{
						$bod = $input_bod;
				     	}
						
						// Validate pob
						$input_pob = trim($_POST["pob"]);
						if(empty($input_pob)){
						$pob_err = "Pleas enter a pob";
					    }else{
						$pob = $input_pob;
					    }
						
		
		 // ត្រួតពិនិត្យ​ error មុន​ពេល​បញ្ចូល​ទិន្ន​ន័យ​ទៅ​ក្នុង​ table user
		if(empty($name_err)&& empty($gender_err)&& empty($bod_err)&& empty($pob_err)){
			
			// Prepare an insert statement
			$sql = "INSERT INTO students (name,gender,bod,pob) VALUES (:name,:gender,:bod,:pob)" ;
			
			if($stmt = $pdo->prepare($sql)){
				
				// Bind variables to the prepared statement as parameters
				   $stmt->bindParam(":name", $param_name);
				   $stmt->bindParam(":gender", $param_gender);
				   $stmt->bindParam(":bod", $param_bod);
				   $stmt->bindParam(":pob", $param_pob);
				   
				         // Set parameters
						 $param_name = $name;
						 $param_gender = $gender;
						 $param_bod = $bod;
						 $param_pob = $pob;
					
						 // Attempt to execute the prepared statement
				  if($stmt->execute()){
					// Records created successfully. Redirect to landing page
					header("location: ../home.php?page=students&frm=index");
					exit();
					// echo "Hello Success !";
				} else{
					echo "Something went wrong. Please try again later.";
				}
				   
			}
			  // Close statement
        unset($stmt);
			
		}
		   // Close connection
    unset($pdo);
	}

?>
        <form action="students/create.php" method="POST">

            <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Pleas enter name" name="name" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please enter name again.</div>
            </div>

           <div class="form-group">
            <label for="gender"><b>Gender:</b></label>
             <select class="form-control" id="gender" name="gender">
              <option value="Male">Male</option>
              <option value="Female">Female</option>  
             </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out Student Gender.</div>
        </div>

            <div class="form-group">
            <label for="bod">BOD:</label>
            <input type="date" class="form-control" id="bod" placeholder="Pleas enter bod" name="bod" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please enter bod again.</div>
            </div>

            <div class="form-group">
            <label for="pob">POB:</label>
            <input type="text" class="form-control" id="pob" placeholder="Pleas enter pob" name="pob" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please enter pob again.</div>
            </div>

        
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="home.php?page=students&frm=index" class="btn btn-primary" >Cancel</a>
        </form>



<script>
// Disable form submissions if there are invalid fields
(function() {
'use strict';
window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
    form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
    });
}, false);
})();
</script>