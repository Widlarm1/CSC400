<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5 shadow-lg p-3 mb-5 bg-body rounded">
        <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid"
          alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 shadow-lg p-3 mb-5 bg-body rounded">
        <form method="POST">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <h2 class="lead m-3 text-center" style="font-weight: 900; color: #333; font-size: 30px;">Create your account!<h2>
          </div>
          <?php 
            if(isset($already_exists)){
                echo $already_exists;
            }
            else if(isset($acct_created)){
                echo $acct_created;
            }
            else if(isset($failed)){
                echo $failed;
            }
          ?>
        
      

          <div class="form-outline mb-4">
            <input type="text" name="fname" class="form-control form-control-lg"
              placeholder="Enter your first name"  value="<?php echo set_value('fname');?>"/>
              <small class="text-danger"><?php echo form_error('fname');?></small>
          </div>

          <div class="form-outline mb-3">
            <input type="text" name="lname" class="form-control form-control-lg"
              placeholder="Enter your last name" value="<?php echo set_value('lname');?>" />
              <small class="text-danger"><?php echo form_error('lname');?></small>

          </div>

          <div class="form-outline mb-3">
            <input type="text" name="username" class="form-control form-control-lg"
              placeholder="Create your username" value="<?php echo set_value('username');?>"/>
              <small class="text-danger"><?php echo form_error('username');?></small>

          </div>

          <div class="form-outline mb-3">
            <input type="password" name="pwd" class="form-control form-control-lg"
              placeholder="Create your password" />
              <small class="text-danger"><?php echo form_error('pwd');?></small>

          </div>

          <div class="form-outline mb-3">
            <input type="password" name="confirm_pwd" class="form-control form-control-lg"
              placeholder="Retype that password"  />
              <small class="text-danger"><?php echo form_error('confirm_pwd');?></small>

          </div>

          

     

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="width: 430px;">Create account</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="../Login/signin"
                class="link-success">Login now!</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>

</section>
</body>