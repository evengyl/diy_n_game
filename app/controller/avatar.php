<?
class avatar extends base_module
{
    private $image;

    // Même fonctionnement que create() sauf au moment de l'affichage, se référer aux commentaires faits dans le fichier avatar.php
    public function __construct()
    {
        parent::__construct(__CLASS__);

        
        return $this->render();
    }

    public function construct_image_test()
    {
        $width = 1000;
        $height = 1000;
        $interval = 50;


        $image = imagecreate($width, $height);
        $white = imagecolorallocate($image, 255, 255, 255);
        $black = imagecolorallocate($image, 0, 0, 0);

        $top_x = 0;
        $top_y = 0;
        $bottom_x = $interval;
        $bottom_y = $interval;

        $i = $width/$interval;
        $j = 0;

        while($i > 0)
        {
           

            if($j%2)
            {
                imagefilledrectangle($image, $top_x, $top_y, $bottom_x, $bottom_y, $white);
            }
            else
            {
                 imagefilledrectangle($image, $top_x, $top_y, $bottom_x, $bottom_y, $black);
            }

            if($top_x == ($width-$interval))
            {
                $top_x = 0;
                $top_y += $interval;
                $bottom_x = $interval;
                $bottom_y += $interval;
                $i--;
                $j++;
            }
            else
            {
                $top_x += $interval;    
                $bottom_x += $interval;
            }
            $j++;
        }


        ob_start();
            imagepng($image);
        $buffer = ob_get_clean();
        $img = '<img src="data:image/png;base64,' . base64_encode($buffer) . '" alt="Histogramme">';
        echo $img;
    }
}