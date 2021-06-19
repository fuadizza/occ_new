<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?= form_error('sub_case', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-default">Add Job</button>
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
                                    <th>Task</th>
                                    <th>Case</th>
                                    <th>Sub Case</th>
                                    <th style="width: 115px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($jobs as $job) :

                                    $task = $this->db->get_where('task', ['id_task' => $job['task_id']])->row_array();
                                    $case = $this->db->get_where('case', ['id' => $job['case_id']])->row_array();
                                    $sub_case = $this->db->get_where('sub_case', ['id' => $job['sub_case_id']])->row_array();
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $task['task_name']; ?></td>
                                        <td><?= $case['name']; ?></td>
                                        <td><?= $sub_case['name']; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/job/edit/' . $job['id']); ?>" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('admin/job/delete/' . $job['id']); ?>" type="button" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </a>
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
                <h4 class="modal-title">Add Jobs</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/job') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Task</label>
                        <select name="task" class="form-control select2bs4" style="width: 100%;">
                            <option selected disabled>Select Task..</option>
                            <?php foreach ($tasks as $t) : ?>
                                <option value="<?= $t['id_task']; ?>"><?= $t['task_name']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <label for="name">Case</label>
                        <select name="case" class="form-control select2bs4" style="width: 100%;">
                            <option selected disabled>Select Case..</option>
                            <?php foreach ($cases as $case) : ?>
                                <option value="<?= $case['id']; ?>"><?= $case['name']; ?></option>
                            <?php endforeach ?>
                        </select>
                        <label for="name">Sub Case</label>
                        <select name="sub_case" class="form-control select2bs4" style="width: 100%;">
                            <option selected disabled>Select Sub Case..</option>
                            <?php foreach ($sub_cases as $sc) : ?>
                                <option value="<?= $sc['id']; ?>"><?= $sc['name']; ?></option>
                            <?php endforeach ?>
                        </select>
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