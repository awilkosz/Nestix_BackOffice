<div class="centrerBloc2">
	<div>
        <h1 class="titresPage">Verifier proposition film</h1>

        <form method="post" action="./?action=validerFilm">
            <input type="hidden" name="token" value="<?php echo $token; ?>" />

            <div class="form-group">
                <label for="titre">Titre :</label>
                <input type="text" id="titre" name="titre" class="form-control" value="<?= $leMedia->media_title; ?>" />
                <br />

                <input type="hidden" id="id" name="id" class="form-control" value="<?= $leMedia->media_id; ?>" />

                <label for="saga">Synopsis :</label>
                <textarea id="synopsis" name="synopsis" class="form-control" rows="10"><?= $leMedia->movie_synop; ?></textarea>
                <br /><br />

                <label for="saga">Saga :</label>
                <input type="text" id="saga" name="saga" class="form-control" value="<?= $leMedia->movie_saga; ?>" />
                <br />

                <label for="annee">Année :</label>
                <input type="text" id="annee" name="annee" class="form-control" value="<?= $leMedia->media_year; ?>" />
                <br />

                <label for="visa">Visa :</label>
                <input type="text" id="visa" name="visa" class="form-control" value="<?= $leMedia->visa; ?>" />
                <br />

                <label for="lien">Lien :</label>
                <input type="text" id="lien" name="lien" class="form-control" value="<?= $leMedia->media_link; ?>" />
                <br />

                <label for="runtime">Durée (en minutes) :</label>
                <input type="text" id="runtime" name="runtime" class="form-control" value="<?= $leMedia->movie_runtime; ?>" />
                <br />

                <label for="trailer">Trailer :</label>
                <input type="text" id="trailer" name="trailer" class="form-control" value="<?= $leMedia->movie_trailer; ?>" />
                <br />

                <label for="budget">Budget :</label>
                <input type="text" id="budget" name="budget" class="form-control" value="<?= $leMedia->movie_budget; ?>" />
                <br />

                <label for="genres[]">Attribuer des genres à ce média :</label>
                <select name="genres[]" class="form-control" size="10" multiple>
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