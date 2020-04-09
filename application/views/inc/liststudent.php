<h2>Student List</h2>
<hr/>
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Department Name</th>
        <th>Roll Number</th>
        <th>Registration Number</th>
        <th>Session</th>
        <th>Batch</th>
        <th style="width: 3.5em;"></th>
    </tr>
    </thead>
    <tbody>

    <?php
    $i=0;
    foreach($getAllStudent as $sdata){
 $i++;

    ?>

    <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $sdata->name;?></td>
        <td>
            <?php
            $sdepid =  $sdata->dep;
            $getDep= $this->department_model->getDepartment($sdepid);
            if (isset($getDep)){
                echo $getDep->department;
            }
            ?>
        </td>
        <td><?php echo $sdata->roll;?></td>
        <td><?php echo $sdata->reg;?></td>
        <td><?php echo $sdata->session;?></td>
        <td><?php echo $sdata->batch;?></td>
        <td>
            <a href="<?php echo base_url();?>student/editstudent/<?php echo $sdata->id;?>"><i class="fa fa-pencil"></i></a>
            <a onclick="return confirm('Are you sure to delete the student data....');" href="<?php echo base_url();?>student/deletestudent/<?php echo $sdata->id;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>