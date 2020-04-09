<h2>Book List</h2>
<hr/>
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Book Name</th>
        <th>Department Name</th>
        <th>Author </th>

        <th style="width: 3.5em;"></th>
    </tr>
    </thead>
    <tbody>

    <?php
    $i=0;
    foreach($getAllBook as $sdata){
        $i++;

        ?>

        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $sdata->bookname;?></td>
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


                    $sdepid = $sdata->author;
                    $getDep = $this->author_model->getAuthor($sdepid);
                    if (isset($getDep)) {
                        echo $getDep->author;
                    }

                ?>



            </td>

            <td>
                <a href="<?php echo base_url();?>book/editbook/<?php echo $sdata->book_id;?>"><i class="fa fa-pencil"></i></a>
                <a onclick="return confirm('Are you sure to delete the book data....');" href="<?php echo base_url();?>book/deletebook/<?php echo $sdata->book_id;?>" role="button" data-toggle="modal"><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>

    <?php } ?>
    </tbody>
</table>