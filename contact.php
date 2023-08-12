<?php include 'navbar.php';
include 'connect.php';
$customername = $contact = $emailaddress = $message ="";
if(isset($_POST['submit'])){
  $customername=$_POST['c_name'];
  $contact=$_POST['contact'];
  $emailaddress=$_POST['email'];
  $message=$_POST['message'];
  // echo $customername,$contact, $emailaddress, $message;
  if(!empty($customername) && !empty($contact) && !empty($emailaddress) && !empty($message)){
    $sql = "INSERT INTO feedback (customer_name, contact, email, message) VALUES ('$customername','$contact', '$emailaddress', '$message')";
    if(mysqli_query($conn,$sql)){
       echo "Your feedback is submitted please wait for your response!";
       
    }else{
       echo"cannot insert into database";
      }
  }
}
?>
<!-- Wrapper container -->
<div class="container py-4 w-50 m-auto">

  <!-- Bootstrap 5 starter form -->
  <form id="contactForm " method="post">

    <!-- Name input -->
    <div class="mb-3">
      <label class="form-label" for="name">Name</label>
      <input class="form-control" id="name" name="c_name" type="text" placeholder="Name" data-sb-validations="required" required="true">
      <!-- <div class="invalid-feedback" data-sb-feedback="name:required">Name is required.</div> -->
    </div>
    <div class="mb-3 ">
      <label class="form-label" for="contactno">Contact No:</label>
      <input class="form-control" id="contactno" name="contact" type="text" placeholder="Contact Number" data-sb-validations="required" required="true">
      <div class="invalid-feedback" data-sb-feedback="contactno:required">Contact Number is required.</div>
    </div>
    <!-- Email address input -->
    <div class="mb-3 ">
      <label class="form-label" for="emailAddress">Email Address</label>
      <input class="form-control" id="emailAddress" name="email" type="email" placeholder="Email Address" data-sb-validations="required, email" required="true">
      <!-- <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
      <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div> -->
    </div>

    <!-- Message input -->
    <div class="mb-3 ">
      <label class="form-label" for="message">Message</label>
      <textarea class="form-control" id="message" name="message" type="text" placeholder="Message" style="height: 10rem;" data-sb-validations="required" required="true"></textarea>
      <!-- <div class="invalid-feedback" data-sb-feedback="message:required">Message is required.</div> -->
</div>
    <!-- Form submit button -->
    <div class="d-grid">
      <button class="btn btn-primary btn-lg " type="submit" name="submit">Submit</button>
      <p class="mt-5 mb-3 text-center">&copy;2023</p>
    </div>

  </form>

</div>
</body>
</html>