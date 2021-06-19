
<section class="content">
    <div class="container-fluid">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Primary</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                The body of the card
              </div>
              <!-- /.card-body -->
            </div>
        <div class="alert alert-info col-sm-6">
            <h1>USER tools</h1>
            <H4>Nama : <?= $user['name']; ?></H4>
            <H4>Shift : <?= $user['shift']; ?></H4>
            <H4>Task : <?= $user['task_name'] ?></H4>
            <?php print_r($this->session->userdata('log_id')); ?>
        </div>
    </div>
</section>
</div>