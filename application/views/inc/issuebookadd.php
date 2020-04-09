<script>
    $(document).ready(function () {
        $(".department").change(function () {

            var dep = $(".department").val();
            $.ajax({
                type:"POST",
                url:"<?php echo base_url();?>manage/getBookByDepId/"+dep,
                success:function (data) {
                    $("#book").html(data);
                }
            })

        })
    })

</script>



<H2>Issue Book</h2>
<hr/>

<?php

$msg =  $this->session->flashdata('msg');
if (isset($msg)){
    echo $msg;
}

?>

<div class="panel-body" style="width:600px;">
    <form action="<?php echo base_url();?>manage/addIssueForm" method="post">
        <div class="form-group">
            <label>Student Name</label>
            <input type="text" name="name" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Department</label>
            <select name="dep" class="department">
                <option value="">Select One</option>
                <?php
                foreach ($getAllDepartment as $depdata){
                    ?>
                    <option value="<?php echo $depdata->dep_id;?>"><?php echo $depdata->department;?></option>
                <?php }?>
            </select>


        </div>


        <div class="form-group">
            <label>Book Name</label>
            <select name="bookname" id="book">

            </select>

        </div>

<!--        <div class="form-group">-->
<!--            <label>Author Name</label>-->
<!--            <select name="author" id="author">-->
<!--                <option value="authorvalue">    Select One</option>-->
<!--            </select>-->
<!---->
<!--        </div>-->


        <div class="form-group">
            <label>Roll No.</label>
            <input type="text" name="roll" class="form-control span12">
        </div>



        
        <div class="form-group">
            <label>Reg. No.</label>
            <input type="text" name="reg" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Session</label>
            <input type="text" name="session" class="form-control span12">
        </div>
        <div class="form-group">
            <label>Batch</label>
            <input type="text" name="batch" class="form-control span12">
        </div>
        <div class="form-group">
            <input type="submit"class="btn btn-primary" value="Submit">
        </div>

    </form>
</div>
