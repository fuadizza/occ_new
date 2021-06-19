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
                            
                            <table  id="example1" class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>no</th>
                                        <th>task</th>
                                        <th>shift</th>
                                        <th>date</th>
                                        <th class="text-center" width="10%">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($monitoring as $key ): ?>
                                    <tr>
                                        <td>#</td>
                                        <td><?= $key['task'] ?></td>
                                        <td><?= $key['shift'] ?></td>
                                        <td><?= $key['date_created'] ?></td>
                                        <td class="text-center"><a href="<?= base_url('user/history/detail/'. $key['id']); ?>" class="btn btn-info"> detail </a></td>
                                    </tr>
                                    <?php endforeach ?>
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