    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form method="post">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title; ?> List -> [ Job : <?= $user['task_name']; ?> , Shift : <?= $user['shift'] ?> ]</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" border="1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <!-- <th class="text-center" style="width: 10px">#</th> -->
                                    <th class="text-center"><?= $title; ?> Name</th>
                                    <th class="text-center">Dashboard</th>
                                    <?php if ($this->session->userdata('shift') == 1) : ?>
                                        <th class="text-center">06-07</th>
                                        <th class="text-center">07-08</th>
                                        <th class="text-center">08-09</th>
                                        <th class="text-center">09-10</th>
                                        <th class="text-center">10-11</th>
                                        <th class="text-center">11-12</th>
                                        <th class="text-center">12-13</th>
                                        <th class="text-center">13-14</th>
                                    <?php elseif ($this->session->userdata('shift') == 2) : ?>
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
                                <input type="text" name="task" value="<?= $user['task_name']; ?>" hidden>
                                <input type="text" name="shift" value="<?= $user['shift']; ?>" hidden>
                                <input type="text" name="id_user" value="<?= $this->session->userdata('id'); ?>" hidden>
                                <?php

                                foreach ($job as $cell) {
                                    if (isset($total[$cell['name']]['jml'])) {
                                        $total[$cell['name']]['jml']++;
                                    } else {
                                        $total[$cell['name']]['jml'] = 1;
                                    }
                                }

                                $n = count($job);
                                $cekinstansi = "";

                                for ($i = 0; $i < $n; $i++) {

                                    $this->db->select('sub_case.name');
                                    $this->db->from('sub_case');
                                    $this->db->where('sub_case.id', $cell['sub_case_id']);
                                    $sub_case = $this->db->get()->row_array();

                                    $cell = $job[$i];
                                    echo '<tr>';
                                    if ($cekinstansi != $cell['name']) {
                                        echo '<td class="text-center"' . ($total[$cell['name']]['jml'] > 1 ? ' rowspan="' . ($total[$cell['name']]['jml']) . '">' : '>') . "<input name='case[]' type='text' value='" . $cell['name'] . "' hidden>" . $cell['name'] . '</td>';
                                        $cekinstansi = $cell['name'];
                                    }
                                    echo "<td><input name='job[]' type='text' value='$cell[id]' hidden>$sub_case[name]</td>";
                                    //echo "<td class='text-center' ><input name='subcase[]' type='text' value='" . $cell['sub_case_id'] . "' hidden>$sub_case[name]</td>";
                                    for ($s = 1; $s <= 8; $s++) {
                                        echo "<td class='text-center'><input name='value[]' type='checkbox' value='sc" . $i . "" . $s . "' ></td>";
                                    }
                                }

                                ?>
                            </tbody>
                        </table><br>
                        <label>Catatan Monitoring</label>
                        <textarea id="summernote" name="noted">
                            Place <em>some</em> <u>text</u> <strong>here</strong>
                        </textarea>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Submite</button>
                    </div>
                </div>
            </form>
            <!-- /.card -->
        </div>
    </section>
    </div>