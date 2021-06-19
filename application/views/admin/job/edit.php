<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form method="post">
            <div class="card card-primary">
                <div class="card-header"></div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="hidden" name="id" value="$job['id]">

                        <label for="name">Task</label>
                        <select name="task" class="form-control select2bs4" style="width: 100%;">
                            <option selected disabled><?= $job['task_id'] ?></option>
                            <?php foreach ($task_list as $tl) : ?>
                                <option value="<?= $tl['id_task']; ?>"><?= $tl['task_name']; ?></option>
                            <?php endforeach ?>
                        </select>

                        <label for="name">Case</label>
                        <select name="case" class="form-control select2bs4" style="width: 100%;">
                            <option selected disabled><?= $job['case_id'] ?></option>
                            <?php foreach ($case_list as $cl) : ?>
                                <option value="<?= $cl['id']; ?>"><?= $cl['name']; ?></option>
                            <?php endforeach ?>
                        </select>

                        <label for="name">Sub Case</label>
                        <select name="sub_case" class="form-control select2bs4" style="width: 100%;">
                            <option selected disabled><?= $job['sub_case_id'] ?></option>
                            <?php foreach ($sub_case_list as $scl) : ?>
                                <option value="<?= $scl['id']; ?>"><?= $scl['name']; ?></option>
                            <?php endforeach ?>
                        </select>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</section>
</div>