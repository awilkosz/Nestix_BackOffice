<div class="centrerBloc2">
	<div>
        <h1 class="titresPage">Verifier proposition musique</h1>

        <form method="post" action="./?action=validerMusique">
            <input type="hidden" name="token" value="<?php echo $token; ?>" />

            <div class="form-group">
                <label for="titre">Titre :</label>
                <input type="text" id="titre" name="titre" class="form-control" value="<?= $leMedia->media_title; ?>" />
                <br />

                <input type="hidden" id="id" name="id" value="<?= $leMedia->media_id; ?>" />

                <label for="annee">Année :</label>
                <input type="text" id="annee" name="annee" class="form-control" value="<?= $leMedia->media_year; ?>" />
                <br />

                <label for="lien">Lien :</label>
                <input type="text" id="lien" name="lien" class="form-control" value="<?= $leMedia->media_link; ?>" />
                <br />

                <label for="album">Album :</label>
                <input type="text" id="album" name="album" class="form-control" value="<?= $leMedia->song_album; ?>" />
                <br />

                <label for="genres[]">Attribuer des genres à ce média :</label>
                <select name="genres[]" size="10" class="form-control" multiple>
                <?php
                foreach($listeGenres as $unGenre)
                {
                ?>
                    <option value="<?= $unGenre->genre_id; ?>"><?= $unGenre->genre_name; ?></option>
                <?php
                }
                ?>
                </select>
                <br />

                <input type="submit" value="Valider" class="btn btn-primary" />
            </div>
        </form>
    </div>
</div>