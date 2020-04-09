<H2>Edit Department</h2>
<hr/>

<?php

$msg =  $this->session->flashdata('msg');
if (isset($msg)){
    echo $msg;
}

?>

<div class="panel-body" style="width:600px;">
    <form action="<?php echo base_url();?>department/updateDepartment" method="post">
        <input type="hidden" name="dep_id" value="<?php echo $depById->dep_id;?>" class="form-control span12">
        <div class="form-group">
            <label>Department Name</label>
            <input type="text" name="department" value="<?php echo $depById->department;?>" class="form-control span12">
        </div>

        <div class="form-group">
            <input type="submit"class="btn btn-primary" value="Submit">
        </div>

    </form>
</div>