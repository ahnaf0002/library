<H2>Edit Book</h2>
<hr/>

<?php

$msg =  $this->session->flashdata('msg');
if (isset($msg)){
    echo $msg;
}

?>

<div class="panel-body" style="width:600px;">
    <form action="<?php echo base_url();?>book/updateBook" method="post">
        <input type="hidden" name="book_id" value="<?php echo $bookById->book_id;?>" class="form-control span12">
        <div class="form-group">
            <label>Book Name</label>
            <input type="text" name="bookname" value="<?php echo $bookById->bookname;?>" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Department</label>

            <select name="dep" id="">
                <option value="">Select One</option>
                <?php
                foreach ($getDepartment as $depdata){
                    if ( $bookById->dep == $depdata->dep_id){ ?>
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
            <label>Author</label>

            <select name="author" id="">
                <option value="">Select One</option>
                <?php
                foreach ($getAuthor as $depdata){
                    if ( $bookById->author == $depdata->auth_id){ ?>
                        <option value="<?php echo $depdata->auth_id;?>" selected="selected">
                            <?php echo $depdata->author;?>
                        </option>
                    <?php }
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