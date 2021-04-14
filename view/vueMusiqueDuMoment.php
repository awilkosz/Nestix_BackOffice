<h1 class="titresPage">Musiques du moment</h1>

<?php
if(count($lesMusiquesDuMoment) < 10)
{
?>
<form action="./?action=ajouterMusique" method="post" enctype="multipart/form-data">
    <input type="hidden" name="token" value="<?php echo $token; ?>" />
    <select name="musique" required>
    <?php
    foreach($lesMusiques as $uneMusique)
    {
        ?>
        <option value="<?= $uneMusique->media_id; ?>"><?= $uneMusique->media_title; ?></option>
        <?php
    }
    ?>
    </select>
    <br />
    <label for="monfichierMp3">Fichier MP3</label>
    <input type="file" name="monfichierMp3" required/>
    <br />
    <label for="monfichierOgg">Fichier Ogg</label>
    <input type="file" name="monfichierOgg" required/><br />
    <input type="submit" value="Ajouter musique du moment" class="btn btn-primary" />
</form>
<?php
	if($error)
	{
		?>
		<p class="alert alert-warning" style="width: 80%;">L'un des fichiers est trop volumineux ! Veuillez en choisir un autre</p>
		<?php
	}
}
else
{
	?>
	<p class="alert alert-warning" style="width: 80%;">Vous ne pouvez pas définir plus de 10 musiques du moment, veuillez en retirer si vous souhaitez en mettre d'autres !</p>
	<?php
}
?>
<p><a href="./?action=lecteurAudio" target="_blank">Accéder au lecteur audio</a></p>
<table class="border border-dark rounded">
    <?php
    foreach($lesMusiquesDuMoment as $uneMusiqueM)
    {
        ?>
        <tr class="border border-dark">
            <td class="border border-dark"><?= $uneMusiqueM->media_title; ?></td>
            <td class="border border-dark"><a href="./?action=retirerMusique&id=<?= $uneMusiqueM->media_id; ?>" class="btn btn-danger">Enlever</a></td>
			<td class="border border-dark">
			</td>
        </tr>
        <?php
    }
    ?>
</table>