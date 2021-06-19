<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <form method="post">
            <div class="card card-primary">
                <div class="card-header"></div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Sub Case</label>
                            <textarea id="summernote" name="sub_case">
                                <?= $sub_case['name']; ?>
                            </textarea>
                        </div>
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