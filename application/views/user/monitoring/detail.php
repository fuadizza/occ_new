<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    <!-- <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-default">Add Job</button> -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title; ?> [<?= $user['date_created']; ?>] </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                                <!-- <p><?= $user['job_id'] ?></p>
                            <?php
                            $job = explode(',', $user['job_id']);
                            print_r($job);

                            print "<br>";
                            ?>
                            <p>
                                <?php
                                $serialize_value = unserialize($user['value']);
                                print_r($serialize_value);
                                //$value = explode(', ', $user['value']);
                                //print_r($value);
                                print "<br>"; ?>
                            </p> -->
                            

                            <table id="example1" class="table table-bordered ">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Case</th>
                                        <th>Sub Case</th>
                                         <?php if ($shift == 1) : ?>
                                        <th class="text-center">06-07</th>
                                        <th class="text-center">07-08</th>
                                        <th class="text-center">08-09</th>
                                        <th class="text-center">09-10</th>
                                        <th class="text-center">10-11</th>
                                        <th class="text-center">11-12</th>
                                        <th class="text-center">12-13</th>
                                        <th class="text-center">13-14</th>
                                    <?php elseif ($shift == 2) : ?>
                                        <th class="text-center">14-15</th>
                                        <th class="text-center">15-16</th>
                                        <th class="text-center">16-17</th>
                                        <th class="text-center">17-18</th>
                                        <th class="text-center">18-19</th>
                                        <th class="text-center">19-20</th>
                                        <th class="text-center">20-21</th>
                                        <th class="text-center">21-22</th>
                                    <?php else : ?>
                                        <th class="text-center">22-23</th>
                                        <th class="text-center">23-00</th>
                                        <th class="text-center">00-01</th>
                                        <th class="text-center">01-02</th>
                                        <th class="text-center">02-03</th>
                                        <th class="text-center">03-04</th>
                                        <th class="text-center">04-05</th>
                                        <th class="text-center">05-06</th>
                                    <?php endif ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="text" name="user_log" value="<?= $this->session->userdata('log_id'); ?>" hidden>

                                    <?php
                                    $n = 0;
                                    foreach ($job as $id) {

                                        $this->db->select('case.name');
                                        $this->db->from('job');
                                        $this->db->join('case', 'case.id = job.case_id');
                                        $this->db->where('job.id', $id);
                                        $case = $this->db->get_where()->row_array();

                                        $this->db->select('sub_case.name');
                                        $this->db->from('job');
                                        $this->db->join('sub_case', 'sub_case.id = job.sub_case_id');
                                        $this->db->where('job.id', $id);
                                        $sub_case = $this->db->get_where()->row_array();

                                        echo "<tr>";
                                        echo "<td>" . $n . "</td>";
                                        echo "<td>" . $case['name'] . "</td>";
                                        echo "<td>" . $sub_case['name'] . "</td>";
                                        for ($i = 1; $i < 9; $i++) {
                                            if ($serialize_value) {
                                                echo "<td><input type='checkbox' name='value[]' value='sc" . $n . "" . $i . "'";
                                                if (in_array('sc' . $n . $i, $serialize_value)) {

                                                    echo 'checked';
                                                }
                                                echo "></td>";
                                            };
                                        }
                                        echo "</tr>";
                                        $n++;
                                    }
                                    ?>
                                </tbody>
                            </table><br>
                            <label>Catatan Monitoring</label>
                            <textarea id="summernote" name="noted">
                                <?= $user['noted'] ?>
                            </textarea>
                            <div class="card-footer clearfix">
                                <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Submite</button>
                            </div>
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