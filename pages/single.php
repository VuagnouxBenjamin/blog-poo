<?php 
use App\App;

$post = App::getDb()->prepare('SELECT * FROM article WHERE id= ?', [$_GET['id']], 'App\Table\Article', true); 

?>

<h1 class="mb-5"><?= $post->titre; ?></h1>
<?= $post->contenu; ?>
