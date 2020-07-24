<h1>Les derniers articles</h1>
<?php foreach($params['posts'] as $post): ?>
    <div class="card">
        <div class="card-body mb-3">
            <h2><?= $post->title  ?></h2>
            <small class="badge badge-info">Publié le <?= $post->getCreatedAt() ?></small>
            <p><?= $post->getExcerpt() ?></p>
            <a href="/posts/<?= $post->id ?>" class="btn btn-primary">Lire plus</a>
        </div>
    </div>
<?php endforeach ?>