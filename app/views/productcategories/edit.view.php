<title><?= $title ?></title>
<legend><?= $text_legend ?></legend>

<form method="post" enctype="multipart/form-data" style="width: 50%; margin:auto; padding-top:100px;">

    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_lable_category_name ?></label>
        <input type="text" class="form-control" name="name" value="<?= $this->showValue("name", $category) ?>" aria-describedby="emailHelp" maxlength="20">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_lable_category_img ?></label>
        <input type="file" name="image" accept="image/*">
    </div>
    <?php if (!empty($category->image)) : ?>
        <div class="form-group">
            <img src="/uploads/images/<?= $category->image ?>" width="30%">
        </div>
    <?php endif ?>


    <button type="submit" name="submit" class="btn btn-primary"><?= $text_lable_category_save ?></button>
</form>
</div>