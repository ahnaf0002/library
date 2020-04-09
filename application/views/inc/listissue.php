<script src="<?php echo base_url();?>lib/jquery.dataTables.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>lib/jquery.dataTables.css"/>

<h2>Issue List</h2>
<hr/>

<table class="display " id="table-id" >
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Department Name</th>
        <th>Book Name</th>
        <th>Roll</th>
        <th>Reg No.</th>
        <th>Session</th>
        <th>Batch</th>
        <th>Date</th>
        <th>Action</th>
        <th style="width: 3.5em;"></th>
    </tr>
    </thead>
    <tbody id="table-id">



    <?php


    $i=0;
    foreach($IssueData as $sdata){
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
            <td>

                <?php
                $sdepid =  $sdata->bookname;
                $getBook= $this->book_model->getBookById($sdepid);
                if (isset($getBook)){
                    echo $getBook->bookname;
                }
                ?>

            </td>
            <td><?php echo $sdata->roll;?></td>
            <td><?php echo $sdata->reg;?></td>
            <td><?php echo $sdata->session;?></td>
            <td><?php echo $sdata->batch;?></td>
            <td><?php echo date("d/m/y h:ia", strtotime($sdata->date));?></td>
            <td>

            <td>
                <a href="<?php echo base_url();?>manage/viewIssue/<?php echo $sdata->reg;?>"><i class="fa fa-pencil"></i></a>
                <a onclick="return confirm('Are you sure to delete the issue  data....');" href="<?php echo base_url();?>manage/deleteissue/<?php echo $sdata->issue_id;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>

            </td>

        </tr>
    <?php } ?>


    </tbody>
</table>



<script>
    $(document).ready(function () {
        $("#table-id").DataTable();
    });

    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#table-id tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });





</script>

