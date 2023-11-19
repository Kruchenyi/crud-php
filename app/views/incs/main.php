<main class="main">
    <div class="block">

        <div class="block__title title-block">
            <ul class="title-block__wrap">
                <li class="title-block__item">Id</li>
                <li class="title-block__item">Title</li>
                <li class="title-block__item">Price</li>
                <li class="title-block__item">Description</li>
                <li class="title-block__item">Options</li>
            </ul>
        </div>
        <div class="block__prod prod-block">


            <?php foreach ($products as $product) { ?>
                <ul class="prod-block__wrap">
                    <li class="prod-block__item"><?= $product['id'] ?></li>
                    <li class="prod-block__item"><?= h($product['title']) ?></li>
                    <li class="prod-block__item"><?= h($product['price']) ?></li>
                    <li class="prod-block__item"><?= h($product['comment']) ?></li>
                    <li class="prod-block__item prod-block__link">
                        <a href="view?id=<?= $product['id'] ?>" class="prod-block__links">Views</a>
                        <a href="update?id=<?= $product['id'] ?>" class="prod-block__links">Update</a>
                        <a href="delete?id=<?= $product['id'] ?>" class="prod-block__links">Delete</a>
                    </li>
                </ul>
            <?php }  ?>

        </div>
    </div>

    <a class="create__link" href="create">Create new Post</a>

</main>