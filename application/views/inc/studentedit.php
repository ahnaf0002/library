<H2>Edit Student</h2>
<hr/>

<?php

$msg =  $this->session->flashdata('msg');
if (isset($msg)){
    echo $msg;
}

?>

<div class="panel-body" style="width:600px;">
    <form action="<?php echo base_url();?>student/updateStudent" method="post">
        <input type="hidden" name="id" value="<?php echo $stuById->id;?>" class="form-control span12">
        <div class="form-group">
            <label>Student Name</label>
            <input type="text" name="name" value="<?php echo $stuById->name;?>" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Department</label>

            <select name="dep" id="">
                <option value="">Select One</option>
                <?php
                foreach ($getDepartment as $depdata){
                    if ( $stuById->dep == $depdata->dep_id){ ?>
                        <option value="<?php echo $depdata->dep_id;?>" selected="selected">
                            <?php echo $depdata->department;?>
                        </option>
                    <?php }
                    ?>
                    <option value="<?php echo $depdata->dep_id;?>">
                        <?php echo $depdata->department;?>
                    </option>
                <?php }?>
            </select>




        </div>
        <div class="form-group">
            <label>Roll No.</label>
            <input type="text" name="roll" value="<?php echo $stuById->roll;?>" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Reg. No.</label>
            <input type="text" name="reg" value="<?php echo $stuById->reg;?>" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Session</label>
            <input type="text" name="session" value="<?php echo $stuById->session;?>" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Batch</label>
            <input type="text" name="batch" value="<?php echo $stuById->batch;?>" class="form-control span12">
        </div>
        <div class="form-group">
            <input type="submit"class="btn btn-primary" value="Submit">
        </div>

    </form>
</div>