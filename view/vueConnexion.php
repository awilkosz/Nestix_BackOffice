<div class="centrerBloc">
    <div id="logForm">
        <div>
            <h1>Connexion</h1>
            <form action="./?action=connexion" method="post">
                <input type="hidden" name="token" value="<?php echo $token; ?>" />

                <div class="form-group">
                    <label>Pseudo : <input type="text" id="pseudo" name="pseudo" class="form-control" /></label>
                    <br />

                    <label>Mot de passe : <input type="password" id="mdp" name="mdp" class="form-control" autocomplete="off" /></label>
                    <br />

                    <input type="submit" value="Envoyer" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>