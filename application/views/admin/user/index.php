<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-default">Add User</button>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title; ?> List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Gender</th>
                                    <th style="width: 115px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($users as $cs) :
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td>
                                            <?= $cs['name']; ?><?php if ($cs['level'] == 1): ?>
                                                 <span class=" badge badge-info">Admin</span>
                                            <?php else: ?>
                                            <?php endif ?></td>
                                        <td><?= $cs['username']; ?></td>
                                        <td><?= $cs['gender']; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/user/edit/' . $cs['id']); ?>" type="button" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('admin/user/delete/' . $cs['id']); ?>" type="button" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control select2bs4" style="width: 100%;">
                            <option selected disabled>Select Level..</option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username">
                        <label>Gender</label>
                        <select name="gender" class="form-control select2bs4" style="width: 100%;">
                            <option selected disabled>Select Gender..</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                        <label>Password</label>
                        <input type="password" name="password1" class="form-control" id="exampleInputEmail1" placeholder="Password">
                        <label>Confirm Password</label>
                        <input type="password" name="password2" class="form-control" id="exampleInputEmail1" placeholder="Confirm Password">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>