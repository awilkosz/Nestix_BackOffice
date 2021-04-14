<div class="centrerBloc2">
	<div>
        <h1 class="titresPage">Verifier proposition Livre</h1>

        <form method="post" action="./?action=validerLivre">
            <input type="hidden" name="token" value="<?php echo $token; ?>" />

            <div class="form-group">
                <label for="titre">Titre :</label>
                    <input type="text" id="titre" class="form-control" name="titre" value="<?= $leMedia->media_title; ?>" />
                <br />
                <input type="hidden" id="id" name="id" value="<?= $leMedia->media_id; ?>" />

                <label for="synopsis">Synopsis :</label>
                <textarea id="synopsis" name="synopsis" class="form-control" rows="10"><?= $leMedia->book_synop; ?></textarea>
                <br /><br />

                <label for="saga">Saga :</label>
                <input type="text" id="saga" name="saga" class="form-control" value="<?= $leMedia->book_saga; ?>" />
                <br />

                <label for="annee">Année :</label>
                <input type="text" id="annee" name="annee" class="form-control" value="<?= $leMedia->media_year; ?>" />
                <br />

                <label for="ISBN">ISBN :</label>
                <input type="text" id="isbn" name="isbn" class="form-control" value="<?= $leMedia->isbn; ?>" />
                <br />

                <label for="tome">Numéro du Tome :</label>
                <input type="text" id="tome" name="tome" class="form-control" value="<?= $leMedia->book_tome; ?>" />
                <br />

                <label for="lien">Lien :</label>
                <input type="text" id="lien" name="lien" class="form-control" value="<?= $leMedia->media_link; ?>" />
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