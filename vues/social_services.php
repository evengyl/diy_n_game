<div class="col-lg-12">
	<div class="col-xs-12" style="background:#232D3B; color:white;">
		ici on mettre les broles pour les médias, les news et les trip astuce et bonus	
<?		
		if(!empty($news))
		{
			foreach($news as $row_news)
			{
				echo $row_news->titre."</br>";
				echo $row_news->text."</br>";
				echo $row_news->date_now."</br></br></br>";
			}
		}

?>
	</div>	
</div>