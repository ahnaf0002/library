<h2>Department List</h2>
<hr/>
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Department Name</th>
        <th>Action</th>

        <th style="width: 3.5em;"></th>
    </tr>
    </thead>
    <tbody>

    <?php
    $i=0;
    foreach($getAllDepartment as $ddata){
        $i++;

        ?>

        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $ddata->department;?></td>

            <td>
                <a href="<?php echo base_url();?>department/editdepartment/<?php echo $ddata->dep_id;?>"><i class="fa fa-pencil"></i></a>
                <a onclick="return confirm('Are you sure to delete the department data....');" href="<?php echo base_url();?>department/deletedepartment/<?php echo $ddata->dep_id;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>