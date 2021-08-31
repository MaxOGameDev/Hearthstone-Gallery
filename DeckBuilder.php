<!DOCTYPE html>

<?php  
session_start();
if (!isset($_POST['searchbar']) || $_POST['searchbar'] == "") {
$name = "legend";	
} else {
	$name = $_POST['searchbar'];
	$name =  urlencode($name);
}		
?>

<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="website-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>   
        h1 {text-align: center;}
        .topnav{
                width: 100%;
                text-align: center;
        }
		
		body {background-color: #995c33;}
		
		.card {background-color: chocolate}
    </style>
        <title>Hearthstone Card Gallery</title>
</head>
<body>
<!-- Call cardscript to grab API info -->
    <header>
        <h1><b>Hearthstone Card Gallery</b></h1>
    </header>
<!-- Creates a search box and button -->
	<div class="topnav">
		<form class="search_box" role="search" method="post" action="DeckBuilder.php">
		<input type="search" name="searchbar" id="searchbar" placeholder="Search Terms Here">
		<button type="submit" class="button" id="searchbutton">Search Cards</button>
		</form>
	</div>
	
		<?php include'cardscript.php'; ?>
<!-- Displays cards in rows of 4 -->
<div class='container'>
	<div class='row'>
		<?php 
			$counter = 0;
			foreach ($results as $cards) { 
				if ($counter > 3) { 
					echo "</div>";
					echo "<div class='row'>";
					$counter = 0;
				}
				?>
				<div class='col'>
					<div class="card" style="width: 20rem; height: 38rem; margin-bottom: 10px"> 
						<img class="card-img-top" src="hearthstone.png" alt="Card Art">
						<div class="card-title">
							<b><?php echo $cards['name'] ?></b>
						</div>
						<div class="card-body">
							<i><?php echo $cards['cardSet'] ?></i>
						</div>
					</div>
				</div>
				<?php
					$counter++;	
			}
		?>
	</div>
</div>
</body>
</html>