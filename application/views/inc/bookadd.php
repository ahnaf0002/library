<H2>Add Book</h2>
<hr/>

<?php

$msg =  $this->session->flashdata('msg');
if (isset($msg)){
    echo $msg;
}

?>

<div class="panel-body" style="width:600px;">
    <form action="<?php echo base_url();?>book/addBookForm" method="post">
        <div class="form-group">
            <label>Book Name</label>
            <input type="text" name="bookname" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Department</label>
            <select name="dep" id="">
                <option value="">Select One</option>
                <?php
                foreach ($getAllDepartment as $depdata){
                    ?>
                    <option value="<?php echo $depdata->dep_id;?>">
                        <?php echo $depdata->department;?>
                    </option>
                <?php }?>
            </select>


        </div>
        <div class="form-group">
            <label>Author</label>

            <select name="author" id="">
                <option value="">Select One</option>
                <?php
                foreach ($getAllAuthor as $depdata){
                    ?>
                    <option value="<?php echo $depdata->auth_id;?>">
                        <?php echo $depdata->author;?>
                    </option>
                <?php }?>
            </select>

        </div>

        <div class="form-group">
            <input type="submit"class="btn btn-primary" value="Submit">
        </div>

    </form>
</div>