<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php if(isset($header)){ echo $header;} ?>
<?php if(isset($sidebar)){ echo $sidebar;} ?>


<div class="content">
    <div class="main-content">
        <?php if(isset($content)){ echo $content;} ?>

    </div>
</div>

<?php if(isset($footer)){ echo $footer;} ?>


