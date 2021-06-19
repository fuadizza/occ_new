<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form method="POST">
            <div class="card card-primary">
                <div class="card-header"></div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control select2bs4" value="<?= $user['level']; ?>" style="width: 100%;">
                            <option selected  value="<?= $user['level']; ?>">
                                <?php if ($user['level'] == 1): ?>
                                    Admin
                                    <?php else: ?>
                                    User
                                <?php endif ?>
                            </option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                      <?php echo form_error('level','<small class="text-danger pl-3">','</small>'); ?><br>
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?= $user['name']; ?>" placeholder="Name">
                      <?php echo form_error('name','<small class="text-danger pl-3">','</small>'); ?><br>
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $user['username']; ?>" placeholder="Username">
                      <?php echo form_error('username','<small class="text-danger pl-3">','</small>'); ?><br>
                        <label>Gender</label>
                        <select name="gender" value="<?= $user['gender']; ?>" class="form-control select2bs4" style="width: 100%;">
                            <option selected ><?= $user['gender']; ?></option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                      <?php echo form_error('gender','<small class="text-danger pl-3">','</small>'); ?><br>
                        <label>Password</label>
                        <input type="password" name="password1" class="form-control" placeholder="Password">
                      <?php echo form_error('password1','<small class="text-danger pl-3">','</small>'); ?><br>
                        <label>Confirm Password</label>
                        <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
</div>