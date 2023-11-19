<?php require VIEWS . '/incs/header.php' ?>





<main class="main">
    <div class="view__block">
        <div class="view__content">
            <div class="view__link">Title:</div>
            <div class="view__item"><?= $post['title'] ?></div>
        </div>
        <div class="view__content">
            <div class="view__link">Price:</div>
            <div class="view__item"><?= $post['price'] ?></div>
        </div>
        <div class="view__content">
            <div class="view__link">Comment:</div>
            <div class="view__item"><?= $post['comment'] ?></div>
        </div>
    </div>

    <div class="view-comment">
        <ul class="view-comment__list">
            <?php foreach ($comments as $comment) { ?>
                <li class="view-comment__link"><?= $comment['comment'] ?></li>
            <?php } ?>
        </ul>
    </div>

    <div class="view-add">
        <h4>Add comment</h4>
        <form action="create-comments" method="post" class="view-form" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <input type="text" name="comment" class="view-form__com">
            <button class="view-form__btn" type="submit">Submit</button>
        </form>
    </div>
</main>

<?php require VIEWS . '/incs/footer.php' ?>