<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-default">Add Job</button>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title; ?> List</h3>
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
                                        <th>Case</th>
                                        <th>Case</th>
                                        <th>Case</th>
                                        <th>Case</th>
                                        <th>Case</th>
                                        <th>Case</th>
                                        <th>Case</th>
                                        <th>Case</th>
                                    </tr>
                                </thead>
                                <tbody>

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
                                                echo "<td><input type='checkbox'";
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
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Update & Close</button>
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