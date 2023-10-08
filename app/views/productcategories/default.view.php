<title><?= $title ?></title>
<h1 class="header-text"><?= $title ?></h1>
<a style="float: right;padding: 10px;" href="/productcategories/create"><button type="button" class="btn btn-primary"><?= $text_add_category ?></button></a>

<table class="table table-striped table-white">
    <thead>
        <tr class="table-head">
            <th style="width: 85%;" scope="col"><?= $text_lable_category_title ?></th>
            <th scope="col"><?= $text_table_control ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($categories !== false) {
            foreach ($categories as $category) :
        ?>
                <tr>
                    <td><?= $category->name ?></td>

                    <td>
                        <div class="edit-delete">
                            <a class="icon" href="/productcategories/edit/<?= $category->categoryId ?>"><i class="fa-solid fa-pen-to-square fa-lg" style="color: #0043b8;"></i></a>
                            <span class="delete"><a class="icon" href="/productcategories/delete/<?= $category->categoryId ?>" onclick="if(!confirm('<?= $text_table_delete_confirm ?>')) return false;"><i class="fas fa-trash-alt fa-lg" style="color: #b8001c;"></i></a></span>
                        </div>
                    </td>

                </tr>
            <?php endforeach ?>

        <?php } ?>


    </tbody>
</table>
</div>