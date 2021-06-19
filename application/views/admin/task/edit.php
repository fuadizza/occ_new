<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form method="post">
            <div class="card card-primary">
                <div class="card-header"></div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Task</label>
                        <input type="text" name="task" class="form-control" value="<?= $task['task_name']; ?>">
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