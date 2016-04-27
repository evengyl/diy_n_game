
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="js/jquery-2.1.3.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.min.js"></script>


    <link rel="stylesheet/less" type="text/css" href="css/style.less" />
    <link rel="stylesheet/css" type="text/css" href="css/shop-homepage.css"/>
    <script src="js/less.js"></script>
</head>

<body>



<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?page=home">Weller.be</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="?page=home">Home</a></li>
                <li><a href="?page=category">Category List</a></li>
                <li><a href="?page=category">Pormotions</a></li>
                <li><a href="?page=category">Qui somme-nous ?</a></li>
                <li><a href="?page=category">Sélections top des ventes</a></li>
                <li><a href="?page=category">Contactez-nous</a></li>
                <li><a href="?page=category">Index complet</a></li>
                <li><a href="?page=category">Panier</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


        <?php echo $header; ?>

<div class="col-lg-12 col-without-padding breadcumb_lb" style="border-top: black 1px solid; top:0;">
    <?php echo $breadcumb_content; ?>
</div>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="col-lg-12 col-without-padding" style="height: 70px;">
    <div class="jumbotron" style="background: #337AB7; color: white;">

            <h1 style="padding-left:50px; margin-top: 0px; margin-bottom: 0px; font-size: 30px; color:white;"><?php echo $title_page; ?></h1>

    </div>
</div>


    <?php echo $menu_lateral; ?>


<div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
    <?php echo $content; ?>
</div> <!-- /container -->

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <?php echo $random_home_page; ?>
</div>

<div class="col-lg-12">
    <hr>
    <footer>
        <center><p>&copy; Propulsed by Company Matedex S.A - Get's Code 2015 - Weller Home Belgium - Revendeur officiel</p></center>
    </footer>
</div>

</body>
</html>
