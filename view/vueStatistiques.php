<h1 class="titresPage">Statistiques</h1>

<div class="d-flex p-3">
    <div class="m-1 border rounded shadow default-color">
        <h3>Les meilleurs films</h3>
        <table class="stats">
        <?php
        foreach($meilleursFilms as $unFilm)
        {
            ?>
            <tr>
                <td class="m-1"><?= $unFilm->media_title; ?></td>
                <td class="m-1"><?= $unFilm->getNoteMoyenne(); ?></td>
            </tr>
            <?php
        }
        ?>
        </table>
    </div>

    <div class="m-1 border rounded shadow ">
    <h3>Les meilleures musiques</h3>
        <table class="stats">
        <?php
        foreach($meilleuresMusiques as $uneMusique)
        {
            ?>
            <tr>
                <td class="m-1"><?= $uneMusique->media_title; ?></td>
                <td class="m-1"><?= $uneMusique->getNoteMoyenne(); ?></td>
            </tr>
            <?php
        }
        ?>
        </table>
    </div>

    <div class="m-1 border rounded shadow ">
    <h3>Les meilleurs livres</h3>
        <table class="stats">
            <?php
            foreach($meilleursLivres as $unLivre)
            {
                ?>
                <tr>
                    <td class="m-1"><?= $unLivre->media_title; ?></td>
                    <td class="m-1"><?= $unLivre->getNoteMoyenne(); ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>

<div class="m-1 border rounded shadow " style="width: 80%;">
    <h3>Les utilisateurs les plus actifs</h3>
    <table class="stats">
            <?php
            foreach($utilisateursActifs as $unUtilisateur)
            {
                ?>
                <tr>
                    <td class="m-1"><?= $unUtilisateur["user_pseudo"];?></td>
                    <td class="m-1">Messages postés : <?= $unUtilisateur["nbAppreciations"];?></td>
                </tr>
                <?php
            }
            ?>
        </table>
</div>

<div class="m-1 border rounded shadow " style="width: 80%;">
    <h3>Les genres les plus représentés</h3>
    <table class="stats">
            <?php
            foreach($genresRepresentes as $unGenre)
            {
                ?>
                <tr>
                    <td class="m-1"><?= $unGenre->genre_name; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
</div>