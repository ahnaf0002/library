<H2>Add Department</h2>
<hr/>

<?php

$msg =  $this->session->flashdata('msg');
if (isset($msg)){
    echo $msg;
}

?>

<div class="panel-body" style="width:600px;">
    <form action="<?php echo base_url();?>department/addDepForm" method="post">

        <div class="form-group">
            <label>Department</label>
            <input type="text" name="department" class="form-control span12">
        </div>

        <div class="form-group">
            <input type="submit"class="btn btn-primary" value="Submit">
        </div>

    </form>
</div>