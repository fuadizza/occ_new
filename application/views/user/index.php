    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-info col-sm-6">
                <h1>USER DASHBOARD</h1>
                <H4>Nama : <?= $user['name']; ?></H4>
                <H4>Shift : <?= $user['shift']; ?></H4>
                <H4>Task : <?= $user['task_name'] ?></H4>
                <?php print_r($this->session->userdata('log_id')); ?>
            </div>
        </div>
    </section>
    </div>