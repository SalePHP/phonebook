<?php
	$status = 1;
	$vaucerId = 5589;
	$users = array(
		array(
			"ime"=>"Petar",
			"prezime"=>"Petrovic",
			"telefon"=>"256 589 581"
			),
		array(
			"ime"=>"Jovan",
			"prezime"=>"Jovanovic",
			"telefon"=>"256 589 582"
			),
		array(
			"ime"=>"Milan",
			"prezime"=>"Milanovic",
			"telefon"=>"256 589 583"
			),
		array(
			"ime"=>"Milan",
			"prezime"=>"Markovic",
			"telefon"=>"256 589 588"
		),
		array(
			"ime"=>"Milan",
			"prezime"=>"Ninic",
			"telefon"=>"256 589 233"
		)
	);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Core PHP - Phonebook</title>
	</head>
	<body>
		<form action="phonebook.php" method="GET">
			<span>Name:</span>
			<input type="text" name="name" placeholder="Ime/prezime"/>
			<input type="text" name="vaucer" placeholder="Vaucer"/>
			<input type="submit" value="Search"/><br>
			<hr>
		</form>
		<?php
			if(isset($_GET['name'])){
			$vaucerStatus = false;
				if(isset($_GET['vaucer'])){
					$vaucer = $_GET['vaucer'];
					if($vaucer == $vaucerId) $vaucerStatus = true;
				}
			$name = $_GET['name'];
			echo "<p>Izvrsena je pretraga za: $name.</p><br>";
			
			$name = strtolower($name);
			$brRezultata = 0;
			for($i=0;$i<count($users);$i++){
				$pripremljenoIme = strtolower($users[$i]['ime']);
				$pripremljenoPrezime = strtolower($users[$i]['prezime']);
				if(($name == $pripremljenoIme) || ($name == $pripremljenoPrezime)){
					echo "Podaci o korisniku:<br>Ime korisnika: " . $users[$i]['ime'] . "<br>";
					echo "Prezime korisnika: " . $users[$i]['prezime'] . "<br>";
					if(($status==1) && (!$vaucerStatus)){	
						echo "Broj telefona:";
						
						for($y=0;$y<strlen($users[$i]['telefon']);$y++){
							if($y<3){
								echo $users[$i]['telefon'][$y];
							}else{
								if($users[$i]['telefon'][$y] == " "){
									echo " ";
								}else{
									echo "*";
								}
							}
						}
						
						
					}else if(($status==2) || $vaucerStatus){
						echo "Broj telefona: " . $users[$i]['telefon'] . "<br>";
					}else{
						echo "Greska! Zabranjen pristup.";
					}
					$img = $users[$i]['ime'] . $users[$i]['prezime'];
					echo "<img width='50px' src='slike/$img.png' alt='slika_korisnika'/><br><hr>";
					$brRezultata++;
					if($vaucerStatus) echo "<p style='color:red'><b>Pretraga izvrsena na osnovu vaucera!</b></p>";
				}
			}
			if($brRezultata==0) echo "Nema rezultata pretrage...";
			}else{
				echo "Unesite ime za pretragu...";
			}
		?>
	</body>
</html>





