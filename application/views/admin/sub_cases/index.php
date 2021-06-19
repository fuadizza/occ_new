<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?= form_error('sub_case_name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-default">Add Case</button>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title; ?> List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Sub Case Name</th>
                                    <th style="width: 115px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($sub_case as $scs) :
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $scs['name']; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/sub_cases/edit/' . $scs['id']); ?>" type="button" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('admin/sub_cases/delete/' . $scs['id']); ?>" type="button" class="btn btn-danger btn-sm">
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
                <h4 class="modal-title">Add Sub Case</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/sub_cases') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputName">Sub Case Name</label>
                        <textarea id="summernote" name="sub_case_name">
                            
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>