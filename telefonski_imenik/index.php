<html>
    <head>
        <title>Telefonski imenik</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <div id="okvir">
            <div id="pretraga">
                <img src='img/search.png' alt='Slika'>
                <form action="#" method="GET">
                    <input type="text" name="kriterijum" placeholder="Kriterijum.." id="krit">
                    <input type="submit" value="Pretraga"><br/>
                </form>
             </div>
			 <?php include_once 'inc/select.php'; ?>
			 	
         </div>
    </body>
</html>

