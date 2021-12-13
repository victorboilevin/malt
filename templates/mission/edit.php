<form action="<?= $this->url("mission_update_data", ['id' => $mission->getId()])?>" method="post">
    <p>Nom mission : <input type="text" name="name" value="<?= $mission->getTitle()?>"/></p>
    <p>lieu : <input type="text" name="place" value="<?= $mission->getPlace()?>"/></p>
    <p>Durée : <input type="number" name="duree" value="<?= $mission->getDuration()?>"/></p>
    <p>Description : <textarea type="test" name="description"><?= $mission->getDescription()?></textarea>
    <p>Date : <input type="date" name="date" value="<?= $mission->getStartDate()->format('Y-m-d H:i:s')?>"/></p>
    <p><input type="submit" value="OK"></p>
</form>