<?php
require VIEWS . '/incs/header.php';




$id = $_GET['id'];
$post = $db->query("SELECT * FROM `posts` WHERE id = ?", [$id])->find();



?>
<main class="main">
    <div class="form">
        <form action="update?id=<?= $id ?>" enctype="multipart/form-data" method="post">
            <input type="hidden" name="postid">
            <p>Change Title</p>
            <input type="text" name="title" value="<?= $post['title'] ?>">
            <p>Change Price</p>
            <input type="number" name="price" value="<?= $post['price'] ?>">
            <p>Change description</p>
            <textarea name="comment"><?= $post['comment'] ?></textarea>
            <div><button class="form__btn" type="submit">Change post</button></div>
        </form>
    </div>


</main>



<?php require VIEWS . '/incs/footer.php'; ?>