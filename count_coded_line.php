<?php
/*Programme comptant le nombre de lignes cod�es pour le nouveau site
*/
class count_coded_line{
    var $nb_lines=0;
    var $nb_files=0;
    function do_path($dir){
      if (!is_dir($dir)){
        return;
      }
      if ($dh = opendir($dir)){
        while (false !== ($filename = readdir($dh)))
        {
            if (($filename != ".") && ($filename != ".."))
            {
              //echo $filename." [dir=".(is_dir($filename)?1:0)."] [file=".(is_file($filename)?1:0)."] [link=".(is_link($filename)?1:0)."]<br>";
                if(!is_file($dir."/".$filename)){
                  $this->do_path($dir."/".$filename);
                }else{
                  $this->do_file($dir."/".$filename);
                }
            }
        }
        closedir($dh);
      }
      
    }
    
    function do_file($filename){
      if(!is_file($filename)) return;

      $ext_table = explode(".", $filename);
      $ext = array_pop($ext_table);
      switch(strtolower($ext)){
        case "php":
        //case "html":
        //case "css":
        //case "js":
            break;
        default:

            return;
      }
      //
      $this->nb_files++;
      //echo "open [".$filename."]<br>";
      $file = fopen($filename,"r");
      while(!feof($file)){
        $line = fgets($file);
        $this->nb_lines++;
      }
      fclose($file);
    }
    
    function show_result(){
      $dir = "../diy_n_game";
      echo "<h2>Result for ".$dir."</h2>";
      $this->do_path($dir);
      echo "Nb files : ".$this->nb_files."<br>";
      echo "Nb lines : ".$this->nb_lines;
    }
}
$app = new count_coded_line;
$app->show_result();
?>
