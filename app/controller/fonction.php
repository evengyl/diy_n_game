<?php
##########################################
#	Createur : Evengyl
#	Date de creation : 29-09-2014
#	Version : 1.1
#	Date de modif : 29-10-2014
##########################################

//liste des fonction nécessaire
function is_post_not_ok($key){
    return !isset($_POST[$key]) || trim($key) == '' || strlen($key) <= 2;
}

function print_pre($var_a_print)
{
    $trace = debug_backtrace();
    ?><div class='col-xs-12'><pre><?
        echo $trace[0]['file'] . ' @line ' .$trace[0]['line']."\n";

        print_r($var_a_print);
    ?></pre></div><?
}

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec);
}


function affiche_pre($var_a_print)
{
    ?><div class='col-xs-12' style='margin-bottom:50px;'><pre><?
        print_r($var_a_print);
    ?></pre></div><?
}

function info_php()
{
    echo phpinfo();
}

function paragraphe_style($txt)
{
    echo '<div class="col-lg-12" style="margin-top:10px; margin-bottom:10px;"><p style="font-size:17px; padding:10px; text-align:center;" class="bg-success">'.$txt.'</p></div>';
}


function render_form_update($res_sql)
{
    ?>
    <div class='contenu_compte'>
        <div class="row">
            <div class="col-lg-5 col-lg-offset-4">
                <form class="form-inline" style="margin:auto;" role="form" action="" method="POST">
                    <input type='hidden' name='post_data' value='1'>
                    <br><?php
                    foreach($res_sql as $row)
                    {
                        foreach($row as $key => $values)
                        {?>
                            <div class="form-group <?php echo ($key == 'id')?'has-error':'has-success'; ?>" style="margin-right:30px;">
                                <div class="input-group">
                                    <div style="width: 50%;" class="input-group-addon"><?php echo $key ?></div>
                                    <input style='width:450px;' type="text"
                                        <?php echo ($key == 'id')? 'disabled id="disabledInput"':'id="inputSuccess1"'; ?> class="form-control" name="<?php echo $key ?>" value="<?php echo $values ?>">
                                </div>
                            </div>
                            <br><?php
                        }
                    }?>

                    <button style="width: 296px;" type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
<?php
}

function render_form_insert($res_fx)
{?>
    <div class='contenu_compte'>
        <div class="row">
            <div class="col-lg-12">
                <form class="form-inline" style="margin:auto;" role="form" action="" method="POST">
                    <br><?php
                    foreach($res_fx as $row)
                    {
                        foreach($row as $key => $values)
                        {?>

                            <div class="form-group <?php echo ($values == 'id')?'has-error':'has-success'; ?>" style="margin-right:30px;">
                                <div class="input-group">
                                    <div style="width: 200px;" class="input-group-addon"><?php echo $values ?></div>
                                    <input style='width:450px;' type="text"
                                        <?php echo ($values == 'id')? 'disabled id="disabledInput"':'id="inputSuccess1"'; ?> class="form-control" name="<?php echo $values ?>">
                                </div>
                            </div>
                            <br><?php
                        }
                    }?>

                    <button style="width: 650px; margin-top:15px;" type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
<?php
}

function render_form_insert_champ_uniquement($list_champ)
{
    if(!$list_champ)
    {
        paragraphe_style('Erreur cette table ne contient aucun champs');
        return;
    }
    ?>
    <div class='contenu_compte'>
        <div class="row">
            <div class="col-lg-12">
                <form class="form-inline" style="margin:auto;" role="form" action="" method="POST">
                    <br><?php
                    foreach($list_champ as $key => $value)
                    {
                        foreach($value as $key_2 => $value_2)
                        {?>

                            <div class="form-group
										<?php
                            if(($key_2 == 'id') || ($key_2 ==  'id_category'))
                                echo  'has-error';
                            else
                                echo 'has-success';
                            ?>" style="margin-right:30px;">

                                <div class="input-group">
                                    <div style="width: 200px;" class="input-group-addon"><?php echo $key_2 ?></div>
                                    <input style='width:450px;' type="text"
                                        <?php echo ($key_2 == 'id')? 'disabled id="disabledInput"':'id="inputSuccess1"'; ?>
                                        <?php echo ($key_2 == 'id_category')? 'disabled id="disabledInput" placeholder="'.$value_2.'"':'id="inputSuccess1"'; ?>
                                           class="form-control" name="<?php echo $key_2 ?>">

                                </div>
                            </div>
                            <br><?php
                        }
                    }?>

                    <button style="width: 650px; margin-top:15px;" type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
<?php
}


function cpu_usage()
{
    $buf = file_get_contents('/proc/loadavg');
    $result = explode(' ', $buf, 4);
    // don't need the extra values, only first three
    unset($result[3]);

    $oneM = $result[0];
    $fiveM = $result[1];
    $fiftyM = $result[2];

    $oneM = floatval($oneM)*100;
    $fiveM = floatval($fiveM)*100;
    $fiftyM = floatval($fiftyM)*100;

    ?>
    <table class="table-responsive table table-bordered">
        <tr>
            <th>Server Load Average Last 1 minute</th>

            <th>Server Load Average Last 5 minutes</th>

            <th>Server Load Average Last 15 minutes</th>
        </tr>
        <tr>
            <td><?php echo $oneM."%"; ?></td>

            <td><?php echo $fiveM."%"; ?></td>

            <td><?php echo $fiftyM."%"; ?></td>
        </tr>
    </table>
<?php
}

function mem_info()
{
    $buf = file_get_contents('/proc/meminfo');
    $buf = preg_replace("(\r\n|\n|\r)",'',$buf);

    $results = explode('kB', $buf);
    $i = 3;
    while($i < 34)
    {
        unset($results[$i]);

        $i++;
    }
    ?>
    <table class="table-responsive table table-bordered">
        <tr>
            <th>Memories Server Infos</th>
        </tr>
        <tr>
            <td><?php echo $results[0]; ?></td>
        </tr>
        <tr>
            <td><?php echo $results[1]; ?></td>
        </tr>
        <tr>
            <td><?php echo $results[2]; ?></td>
        </tr>
    </table>
<?php

}

function cpu_info()
{
    $buf = file_get_contents('/proc/cpuinfo');
    $buf = preg_replace("(\r\n|\n|\r)", '\n', $buf);
    $results = explode('\n', $buf);
    unset($results[8]);
    unset($results[10]);

    ?>
    <table class="table-responsive table table-bordered">
        <tr>
            <th>Memories Server Infos</th>
        </tr><?php
        foreach ($results as $row) {
            ?>
            <tr>
                <td><?php echo $row; ?></td>
            </tr>
        <?php
        }
        ?>

    </table>
<?php
}

function render_eval()
{
    $eval = isset($_POST['eval'])?$_POST['eval']:"";

    ?>
    <form method="post" action="">
        <textarea rows="20" cols="100" name="eval"><?php echo htmlentities($eval) ?></textarea>
        <br>
        <input type="submit" value="eval"/>
    </form>
    <pre><?php eval($eval); ?></pre>
<?php

}




?>
