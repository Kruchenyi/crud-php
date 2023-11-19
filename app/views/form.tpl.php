<?php require VIEWS . '/incs/header.php';

/**
 * @var \myfrm\Validator $validation
 */
?>

<main class="main">
    <div class="form">



        <form action="create" enctype="multipart/form-data" method="post">
            <div class="from__wrap" style="margin-bottom: 10px;">
                <p>Enter Title</p>
                <input type="text" name="title" value="<?= old('title') ?>">

                <?= isset($validation) ?  $validation->printError('title') : '' ?>

            </div>
            <div class="from__wrap">
                <p>Enter Price</p>
                <input type="number" name="price" value="<?= old('price') ?>">
                <?= isset($validation) ?  $validation->printError('price') : '' ?>
            </div>
            <div class="from__wrap">
                <p>Enter description</p>
                <textarea name="comment"><?= old('comment') ?></textarea>
                <?= isset($validation) ?  $validation->printError('comment') : '' ?>
            </div>
            <div><button class="form__btn" type="submit">Create new post</button></div>
        </form>
    </div>
</main>

<?php require VIEWS . '/incs/footer.php' ?>