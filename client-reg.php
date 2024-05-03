<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .container{
      width: 500px;
    }
    h1{
      text-align: center;
      padding:40px 0px;
    }
  </style>
  </head>
  <body>
    <h1>Hack4Health Registration</h1>
    <div class="container border border-black p-5 rounded">
      <form action="client-reg.php" method="POST">
      <div class="form-floating mb-3">
            <input type="text" class="form-control" name="lastname"  placeholder="Last Name">
                <label >Last Name</label>
        </div>
        <div class="form-floating mb-4">
            <input type="text" class="form-control" name="firstname" placeholder="First Name">
                <label >First Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email"  placeholder="name@example.com">
                <label f>Email address</label>
        </div>
        <div class="form-floating mb-4">
            <input type="password" class="form-control" name="password" placeholder="Password">
                <label >Password</label>
        </div>
        <h6>Sex</h6>
        <div class="form-check mb-3 mt-3">
          <input class="form-check-input" type="radio" name="sex" value="male">
          <label class="form-check-label">
            Male
          </label>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="radio" name="sex" value="female">
          <label class="form-check-label">
          Female
          </label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="company"  placeholder="Password">
                <label >Institution/Company</label>
  </div>
        <div class="form-floating mb-4">
            <input type="text" class="form-control" name="mobile" placeholder="Password">
                <label >Mobile No.</label>
        </div>
        <h6>Role</h6>
        <div class="form-check mb-3 mt-3">
          <input class="form-check-input" type="radio" name="role" value="Project Manager">
          <label class="form-check-label" >
          Project Manager
          </label>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="radio" name="role" value="Front-End Developer" >
          <label class="form-check-label">
          Front-End Developer
          </label>
        </div>
        <div class="form-check mb-3 mt-3">
          <input class="form-check-input" type="radio" name="role" value="Backend Developer">
          <label class="form-check-label">
          Backend Developer
          </label>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="radio" name="role" value="Marketing Specialist">
          <label class="form-check-label">
          Marketing Specialist
          </label>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="radio" name="role"  value="Data Researcher">
          <label class="form-check-label">
          Data Researcher
          </label>
        </div>
        <input type="submit" value="Register" name="submit" class="btn btn-primary mt-5" style="width:100%;">
        </form>
        <?php 
        require "nusoap.php";

          if (isset($_POST['submit'])){

            $firstname=$_POST['firstname'];
            $lastname=$_POST['lastname'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $sex=$_POST['sex'];
            $company=$_POST['company'];
            $mobile=$_POST['mobile'];
            $role=$_POST['role'];
          //  echo $firstname. $lastname. $email. $password. $sex. $company. $address. $mobile.$role;

                $client = new nusoap_client("http://localhost/projects/labact2/participantwebservice.php?wsdl");		
                try {
                    $response=$client->call("insertParticipant", array("lastname"=>$lastname, "firstname"=>$firstname, "email"=>$email, "password"=>$password, "sex"=>$sex,"company"=>$company, "address" => $address,"mobile"=>$mobile, "role"=>$role));

                    if ($response == true) {
                      echo "<script>
                              Swal.fire({
                                  title: 'Good job!',
                                  text: 'Registered Successfully',
                                  icon: 'success'
                              });
                            </script>";
                  } else {
                      echo "<script>
                              Swal.fire({
                                  title: 'Error!',
                                  text: 'Registration Failed',
                                  icon: 'error'
                              });
                            </script>";
                  }
                }
                catch (Exception $e){
                    echo $e->getMessage();
                }

                }
?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>