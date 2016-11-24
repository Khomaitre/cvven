<h2> Créer un nouveau compte utilisateur </h2>

<?php echo validation_errors();?>

<?php echo form_open('FormulaireUtilisateur/formulaireuser');?>

<label for="nomclient">Nom du client: </label>
<input type="input" name="nomclient"/><br/>

<label for="prenomclient">Prenom du Client: </label>
<input type="input" name="prenomclient"/><br/>

<label for="adresseclient">Adresse du Client: </label>
<input type="input" name="adresseclient"/><br/>

<label for="codepostal"> Code Postal du Client: </label>
<input type="input" name="codepostal"/><br/>

<label for="telclient"> Téléphone du Client: </label>
<input type="input" name="telclient"/><br/>

<label for="loginclient"> Votre login : </label>
<input type="input" name="loginclient"/><br/>

<label for="mdpclient"> Votre mot de passe : </label>
<input type="password" name="mdpclient"/><br/>
<?php
    echo form_submit('envoi','Valider');
        echo form_close();


?>
