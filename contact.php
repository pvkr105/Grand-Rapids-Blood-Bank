<?php
    require_once('assets/header.php')
?>
  <body>
  <?php
    require_once('assets/navbar.php')
?>
<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('donors.db');
      }
   }
   $db = new MyDB();
?>
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/contact_bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Contact Us</h1>
              <span class="subheading">Have questions? We have answers.</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p>Want to Donate? Fill out the form below to send us a message and we will get back to you as soon as possible!</p>

          <form action="" method="POST" enctype="multipart/form-data">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Name" name="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" name="email" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Phone Number</label>
                <input type="tel" class="form-control" placeholder="Phone Number" name="phone" required data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Message</label>
                <textarea rows="5" class="form-control" placeholder="Message" name="message" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" name="sendMessageButton">Send</button>
            </div>
          </form>
          
        </div>
      </div>
    </div>

    <hr>
    <?php 

$name=$_REQUEST['name'];  
$email=$_REQUEST['email'];
$phone=$_REQUEST['phone']; 
$message=$_REQUEST['message']; 


$sql =<<<EOF
  INSERT INTO DONOR (name,email,phone,message)
  VALUES ('$name', '$email', '$phone', '$message' );

  
EOF;

$ret = $db->exec($sql);
if(!$ret){
echo $db->lastErrorMsg();
} else {
 echo "Records created successfully\n";
}
$db->close();
?>
<?php
    require_once('assets/footer.php')
?>