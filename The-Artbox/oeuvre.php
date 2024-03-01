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
        <?php
        //recuperer et valider  $_GET['id']
        $lastElement = end($oeuvres);
        //MAN  end(array|object &$array): mixedend() |déplace le pointeur interne du tableau array jusqu'au dernier élément et retourne sa valeur. 
        if (
            isset($_GET['id'])
            //MAN isset(mixed $var, mixed ...$vars): bool  — Détermine si une variable est déclarée et est différente de null
            && filter_var($_GET['id'], FILTER_VALIDATE_INT)
            //MAN filter_var ($var, FILTER_VALIDATE_INT, $options)   — Filtre une variable avec un filtre spécifique 
                //MAN  FILTER__VALIDATE_INT     — vérifie qu’une donnée a bien la forme d’un nombre entier
            && $_GET['id'] <= $lastElement['id'] && $_GET['id'] > 0
            //   — dernier id tableau > 'id' > 0
        ):?>
            <?php
            $oeuvre = $oeuvres[$_GET['id'] - 1]; 
            if (
                isset($oeuvre['id']) && array_key_exists('id', $oeuvre)
                //MAN  array_key_exists(string|int|float|bool|resource|null $key, array $array): bool — Vérifie si une clé existe dans un tableau
            ):?>
                <article id="detail-oeuvre">
                    <div id="img-oeuvre">
                        <img src="img/<?php echo $oeuvre['visuel']; ?>" alt="<?php echo $oeuvre['title']; ?>">
                    </div>
                    <div id="contenu-oeuvre">
                        <h1><?php echo $oeuvre['title']; ?></h1>
                        <p class="description"><?php echo $oeuvre['author']; ?></p>
                        <p class="description-complete"><?php echo $oeuvre['description']; ?></p>
                    </div>
                </article>
            <?php endif ?>
        <?php else : ?>
            <!-- page d'erreur si URL invalide adaptée à l'identité du site, nommée 404 : terminologie incorrecte, concept correct pour galerie art  -->
            <article id="detail-oeuvre">
                    <div id="img-oeuvre">
                        <img src="img/oeuvre_autre.png" alt="cette oeuvre existe dans un autre espace temps">
                    </div>
                    <div id="contenu-oeuvre">
                        <h1>erreur 404 </h1>
                        <p class="description-complete">Venez découvrir celles que la galerie propose en rejoignant l'<a href="index.php"><strong>accueil</strong></a></p>
                    </div>
                </article>
        <?php endif ?>
    </main>
    
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>
