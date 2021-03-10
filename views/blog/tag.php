<h1><?= $params['tag']->name ?></h1>

<?php foreach ($params['tag']->getPosts() as $post) : ?>
    <div class="card mb-3">
        <div class="card-body">
            <a href="/posts/<?= $post->id ?>"><?= $post->title ?></a>            
        </div>
    </div>
<?php endforeach ?>