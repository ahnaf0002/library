<h2>Author List</h2>
<hr/>
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Author Name</th>
        <th>Action</th>

        <th style="width: 3.5em;"></th>
    </tr>
    </thead>
    <tbody>

    <?php
    $i=0;
    foreach($getAllAuthor as $adata){
        $i++;

        ?>

        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $adata->author;?></td>

            <td>
                <a href="<?php echo base_url();?>author/editauthor/<?php echo $adata->auth_id;?>"><i class="fa fa-pencil"></i></a>
                <a onclick="return confirm('Are you sure to delete the author data....');" href="<?php echo base_url();?>author/deleteauthor/<?php echo $adata->auth_id;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>