<?php

include('./../includes/function.php');

$page_title = "Student List";
$studentData = json_decode(getStudent());

ob_start();

// Content Begin
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            DataTables Advanced Tables
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                            foreach($studentData as $data){
                                echo '<tr>
                                        <td>'.$data->id.'</td>
                                        <td>'.$data->name.'</td>
                                        <td>'.$data->gender.'</td>
                                        <td>'.$data->status.'</td>
                                        <td>
                                            <button type="button" class="btn btn-info">Edit</button>
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </td>
                                    </tr>';
                            }

                        ?>
                        
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->';

<?php 
// Content End

$content = ob_get_contents();

ob_end_clean();

include('./../template/default.php');
?>