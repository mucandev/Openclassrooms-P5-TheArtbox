<?php
require_once(__DIR__ . '/oeuvres.php');
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>The ArtBox</title>
</head>
<body>
    <?php require_once(__DIR__ . '/header.php'); ?>
    <main>
        <div id="liste-oeuvres">
            <?php foreach($oeuvres as $oeuvre): ?>
                <article class="oeuvre">
                    <a href='oeuvre.php?id=<?php echo $oeuvre['id']; ?>'>
                        <img src="img/<?php echo $oeuvre['visuel']; ?>" alt="<?php echo $oeuvre['title']; ?>">
                        <h2><?php echo $oeuvre['title']; ?></h2>
                        <p class="description"><?php echo $oeuvre['author']; ?></p>
                    </a>
                </article>
             <?php endforeach ?>         
        </div>   
    <!-- PRINCIPE
      ALGORITHME/LOGIQUE (POUR/CHAQUE est inventé)
           ETAP1 
           POUR/CHAQUE array $oeuvre du array $oeuvres FAIRE
                <article class="oeuvre"> 
                    <a href="#"> ETAP2 :<a href="ECRIRE oeuvre.php?id=(int=$oeuvres[id])"> 
                       <img src= ECRIRE $oeuvre[visuel]  alt=  ECRIRE $oeuvre[title]>
                        <h2> ECRIRE $oeuvre[title]</h2>
                        <p> ECRIRE $oeuvre[author]</p>
                        FINPOUR/CHAQUE
               </a>
            </article>

    MODELE type
         <article class="oeuvre">
                <a href="oeuvre-1.html">
                    <img src="img/clark-van-der-beken.png" alt="Dodomu">
                    <h2>Dodomu</h2>
                    <p class="description">Mia Tozerski</p>
                </a>
            </article>
         -->            
    </main>
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>

</html>