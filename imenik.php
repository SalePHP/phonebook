<?php
    $users = array(
        array(
            "ime"=>"Petar",
            "prezime"=>"Petrovic",
            "telefon"=>"021 589 581"
        ),
        array(
            "ime"=>"Jovan",
            "prezime"=>"Jovanovic",
            "telefon"=>"021 589 582"
        ),
        array(
            "ime"=>"Marina",
            "prezime"=>"Marinic",
            "telefon"=>"021 589 583"
        )
    );
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Core PHP - Phonebook</title>
</head>
<body>
    <form action="phonebook.php" method="GET">
        <input type="text" name="name" placeholder="Kriterijum..."/>
        <input type="submit" value="Search" />
    </form>
    <hr>
    <?php
    if(isset($_GET['name'])){
        $name = $_GET['name'];
        $name = strtolower($name);
        $brRezultata = 0;
        for($i=0; $i<count($users);$i++){
            $pripremljenoIme = strtolower($users[$i]['ime']);
			$pripremljenoPrezime = strtolower($users[$i]['prezime']);
            if(($name == $pripremljenoIme) || ($name == $pripremljenoPrezime )){
                $brRezultata++;
                echo "Ime: " . $users[$i]['ime'] ."<br />";
                echo "Prezime: " . $users[$i]['prezime'] ."<br />";
                echo "Telefon: " . $users[$i]['telefon'] ."<br /><hr />";
            }
        }
        if($brRezultata){
            echo "Broj rezultata pretrage za kriterijum <b>$name</b> je: $brRezultata.";
        }else{
            echo "Nema rezultata pretrage.";
        }
    }else{
        echo "Unesite kriterijum za pretragu...";
    }   
    ?>
</body>
</html>