<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-without-padding header" style="background:#222222; z-index: 10000;">
    <div class="col-lg-3" style="padding-left:25px;">
        <?php
        use \Evengyl\db\App;
        $name_website = App::set_logo_website();

        ?><img class='img-responsive' src='<?php echo $base_path.''.$name_website; ?>'/>
    </div>
</div>

