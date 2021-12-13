<?php foreach ($missions as $mission) : ?>
    <h1><?= $mission->getTitle() ?></h1>
    <p><?= $mission->getDescription() ?></p>
    <a href="<?= $this->url('mission_show', ['id' => $mission->getId()])?>">Détail</a>
    <a href="<?= $this->url('mission_edit', ['id' => $mission->getId()])?>">Edit</a>
    <a href="<?= $this->url('mission_delete', ['id' => $mission->getId()])?>">Delete</a>
<?php endforeach; ?>