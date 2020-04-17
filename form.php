
<form action="form2.php" method="post">
    <p>Votre nom : <input type="text" name="nom" /></p>
    <p>Votre âge : <input type="text" name="age" /></p>
    <p>Votre mot de passe : <input type="password" name="mdp" /></p>

    <select name="choix">
        <option value="choix1">Choix 1</option>
        <option value="choix2">Choix 2</option>
        <option value="choix3">Choix 3</option>
        <option value="choix4" selected="selected">Choix 4</option>
    </select>

    <div>
        <input type="checkbox" name="case" id="case" /> <label for="case">Fille</label>
        <input type="checkbox" name="case" id="case" checked="checked"/> <label for="case">Garçon</label>
    </div>

    <div>
        Aimez-vous les frites ?
        <input type="radio" name="frites" value="oui" id="oui" checked="checked"/> <label for="oui">Oui</label>
        <input type="radio" name="frites" value="non" id="non"/> <label for="non">Non</label>
    </div>

    <textarea name="message" rows="8" cols="45">Votre message ici.</textarea>

    <p><input type="submit" name="valider" value="OK"></p>
</form>




<?php


