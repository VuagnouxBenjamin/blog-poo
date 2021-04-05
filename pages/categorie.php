<?php 
    use App\Table\Article; 
    use App\Table\Categorie; 
    use App\App; 

    $categorie = Categorie::find($_GET["id"]);
    if ($categorie === false) {
        App::notFound(); 
    }
    
    $articles = Article::lastByCategory($_GET["id"]); 
    $categories = Categorie::All();  
?> 

<h1><?= ucfirst($categorie->titre); ?></h1>
<div class="row">
    <div class="col-sm-8">
            <?php foreach($articles as $post) : ?> 
                    <h2>
                        <a href="<?= $post->URL; ?>">
                            <?= $post->titre; ?>
                        </a>
                    </h2>
                    <p><em><?= $post->categorie;?></em></p>

                    <p><?= $post->extrait; ?></p>
            <?php endforeach ?>
        
    </div>
    <div class="col-sm-4">
        <h4>Catégories : </h3>
        <ul>
            <?php foreach (Categorie::all() as $categorie) : ?>
                <li>    
                    <a href="<?= $categorie->URL; ?>"><?= $categorie->titre_cat; ?></a>
                </li>
            <?php endforeach ?>
        </ul>


    </div>
</div>






