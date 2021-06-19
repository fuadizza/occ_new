<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">selamat datang, <?php echo $this->session->userdata('name'); ?> !</p>

        <form method="post">
          <div class="form-group">
            <input type="text" name="id" hidden value="<?php echo $this->session->userdata('id'); ?>">
            <label for="name">Shifting</label>
            <select name="shift" class="form-control select2bs4" style="width: 100%;">
              <option selected disabled>Select Shift..</option>
              <option value="1">Shift 1</option>
              <option value="2">Shift 2</option>
              <option value="3">Shift 3</option>
            </select>
          </div>
          <div class="form-group">
            <label for="name">Task</label>  
            <select name="task" class="form-control select2bs4" style="width: 100%;">
              <option selected disabled>Select Task..</option>
              <?php foreach ($task as $t ):?>
                <option value="<?= $t['id_task']; ?>"><?= $t['task_name']; ?></option>
              <?php endforeach ?>
            </select>
            <a href="<?= base_url('auth/logout'); ?>">logout?</a>
          </div>
          <div class="row">
            <!-- /.col -->

            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Next</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

     <!--  <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

     <!--  <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


