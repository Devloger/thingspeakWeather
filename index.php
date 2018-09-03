<?php
require_once 'vendor/autoload.php';
session_start();

$weather = new Weather;

?>

<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
		  integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	
	<title>Kontrola Pogody!</title>
</head>
<body>

<br>
<div class="container">
	<div class="card">
		<div class="card-header">
			Dodanie Danych Pogody Do Chmury ThingSpeak
		</div>
		<div class="card-body">
            <?php
            if (isset($_SESSION['OK'])) {
                unset($_SESSION['OK']);
                echo '<h1 class="text-center">Wysłano dane pomyślnie!</h1>';
            }
            ?>
			
			<form method="POST" action="send.php">
				<input name="secret" type="hidden" value="1">
				<div class="form-group">
					<label for="temperatura">Temperatura</label>
					<input name="temperatura" type="text" class="form-control" id="temperatura"
						   value="<?= $weather->temperatura ?>">
				</div>
				<div class="form-group">
					<label for="cisnienie">Ciśnienie</label>
					<input name="cisnienie" type="text" class="form-control" id="cisnienie"
						   value="<?= $weather->cisnienie ?>">
				</div>
				<div class="form-group">
					<label for="wilgotnosc">Wilgotność</label>
					<input name="wilgotnosc" type="text" class="form-control" id="wilgotnosc"
						   value="<?= $weather->wilgotnosc ?>">
				</div>
				<div class="form-group">
					<label for="predkosc">Prędkość Wiatru</label>
					<input name="predkosc" type="text" class="form-control" id="predkosc"
						   value="<?= $weather->predkosc ?>">
				</div>
				<div class="form-group">
					<label for="kat">Kąt Wiatru</label>
					<input name="kat" type="text" class="form-control" id="kat" value="<?= $weather->kat ?>">
				</div>
				<div class="form-group">
					<label for="zachmurzenie">Zachmurzenie</label>
					<input name="zachmurzenie" type="text" class="form-control" id="zachmurzenie"
						   value="<?= $weather->zachmurzenie ?>">
				</div>
				
				<button type="submit" class="btn btn-primary d-block w-100">Wyślij do Chmury!</button>
			</form>
		
		
		</div>
	</div>
	
	<br>
	<div class="">
		<div class="card border-primary mb-3">
			<div class="card-header text-center"><h3>© Autorzy ©</h3></div>
			<div class="card-body text-primary">
				<h1 class="text-center">
					<a href="https://devloger.pl/">
						Krystian Bogucki
					</a>
				</h1>
				<h1 class="text-center">
					Patryk Bogusz
				</h1>
			</div>
		</div>
		<h1 class="text-center"></h1>
	</div>
	
	
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
			integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
			crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
			integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
			crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
			integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
			crossorigin="anonymous"></script>
</body>
</html>
