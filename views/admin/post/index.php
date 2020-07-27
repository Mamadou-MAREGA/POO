<h1>Adminstrations des articles</h1>


<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Titre</th>
      <th scope="col">Publié le</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
        <?php foreach ($params['posts'] as $post) : ?>
            <tr>
                <th scope="row"><?= $post->id ?></th>
                <td><?= $post->title ?></td>
                <td><?= $post->getCreatedAt() ?></td>
                <td>
                    <a href="" class="btn btn-warning">Modifier</a>

                    <form method="POST" action="/admin/posts/delete/<?= $post->id ?>" class="d-inline">
                       <button type="submit"  class="btn btn-danger">Supprimer</button>
                    </form>
                   
                </td>
            </tr>
        <?php endforeach ?>
  </tbody>
</table>
