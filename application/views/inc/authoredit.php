<H2>Edit Author</h2>
<hr/>

<?php

$msg =  $this->session->flashdata('msg');
if (isset($msg)){
    echo $msg;
}

?>

<div class="panel-body" style="width:600px;">
    <form action="<?php echo base_url();?>author/updateAuthor" method="post">
        <input type="hidden" name="auth_id" value="<?php echo $authById->auth_id;?>" class="form-control span12">
        <div class="form-group">
            <label>Department Name</label>
            <input type="text" name="author" value="<?php echo $authById->author;?>" class="form-control span12">
        </div>

        <div class="form-group">
            <input type="submit"class="btn btn-primary" value="Submit">
        </div>

    </form>
</div>