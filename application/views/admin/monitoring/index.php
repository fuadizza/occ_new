<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    <!-- <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-default">Add Job</button> -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List <?= $title; ?> </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered">
                                <thead class="">
                                    <tr>
                                        <th class="text-center" width="2%">No</th>
                                        <th class="text-center" >PIC</th>
                                        <th class="text-center" >Task</th>
                                        <th class="text-center" >Shift</th>
                                        <th class="text-center" >Date</th>
                                        <th class="text-center" width="10%">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n = 1;
                                    foreach ($monitoring as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $n ?></td>
                                            <td class="text-center"><?= $key['name'] ?></td>
                                            <td class="text-center"><?= $key['task'] ?></td>
                                            <td class="text-center"><?= $key['shift'] ?></td>
                                            <td class="text-center"><?= $key['date_created'] ?></td>
                                            <td class="text-center"><a href="<?= base_url('admin/monitoring/detail/' . $key['id']); ?>" class="btn btn-info"> detail </a></td>
                                        </tr>
                                    <?php $n++;
                                    endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
                <!-- /.card -->
                <div>

                </div>
            </div>
        </div>
    </div>
</section>
</div>