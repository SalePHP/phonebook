<?php
include_once 'connection.php';

if(isset($_GET['kriterijum'])){
    $kriterijum = trim($_GET['kriterijum']);
    if(!empty($kriterijum)){
        $kriterijum = mysqli_real_escape_string($conn,$kriterijum);
        $query = "SELECT * FROM tabela WHERE ime LIKE '%{$kriterijum}%' OR prezime LIKE '%{$kriterijum}%'";
        
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result) > 0){
            while($r = mysqli_fetch_assoc($result)){
                echo "<div class='rezultat'>";
                echo "<img src='img/User.png' />";
                echo "Ime: " . $r['ime'] . " <br />";
                echo "Prezime: " . $r['prezime'] . " <br />";
                echo "Tel: " . $r['tel'] ;
                echo "</div>";
            }
        }else{
            echo "Nema rezultata pretrage.";
        }
        
    }else{
        echo "Kriterijum ne sme biti prazan.";
    }
}
?>