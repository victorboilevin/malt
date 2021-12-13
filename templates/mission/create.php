<form action="<?= $this->url("mission_save")?>" method="post">
    <p>Nom mission : <input type="text" name="name" /></p>
    <p>lieu : <input type="text" name="place" /></p>
    <p>Durée : <input type="number" name="duree" /></p>
    <p>Description : <textarea type="test" name="description"></textarea>
    <p>Date : <input type="date" name="date"/></p>
    <p><input type="submit" value="OK"></p>
</form>