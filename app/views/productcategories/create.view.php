<title><?= $title ?></title>
<legend><?= $text_legend ?></legend>
<h1 class="header-text"><?= $title ?></h1>

<form method="post" enctype="multipart/form-data" style="width: 50%; margin:auto; padding-top:100px;">

    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_table_category_name ?></label>
        <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter Group Name" maxlength="20">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_lable_category_img ?></label>
        <input type="file" name="image" accept="image/*">
    </div>
    <button type="submit" name="submit" class="btn btn-primary"><?= $text_lable_category_save ?></button>
</form>
</div>