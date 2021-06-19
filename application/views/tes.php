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
                        <table id="example1" class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Task</th>
                                    <th>Case</th>
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
                            	<tr>
                            		<td>1</td>
                            		<td><input type="text" name="case" class="form-control"></td>
                            		<td><input type="text" name="subcase" class="form-control"></td>
                                    <?php 
                                    for ($s = 1; $s <= 8; $s++) {
                                    echo "<td class='text-center'><input name='value[]' type='checkbox' value='jam".$s."'></td>";
                                    }
                                     ?>
                            	</tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div >
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