<title><?= $title ?></title>
<a style="float: right;padding: 10px;" href="/productlist/create"><button type="button" class="btn btn-primary"><?= $text_add_product ?></button></a>

<table class="table table-striped table-white">
    <thead>
        <tr class="table-head">
            <th scope="col"><?= $text_table_name ?></th>
            <th scope="col"><?= $text_table_category ?></th>
            <th scope="col"><?= $text_table_buyPrice ?></th>
            <th scope="col"><?= $text_table_sellPrice ?></th>
            <th scope="col"><?= $text_table_quantity ?></th>
            <th scope="col"><?= $text_table_control ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($products !== false) {
            foreach ($products as $product) :
        ?>
                <tr>
                    <td><?= $product->name ?></td>
                    <td><?= $product->categoryName ?></td>
                    <td><?= $product->buyPrice ?></td>
                    <td><?= $product->sellPrice ?></td>
                    <td><?= $product->quantity ?></td>

                    <td>
                        <div class="edit-delete">
                            <a class="icon" href="/productlist/edit/<?= $product->productId ?>"><i class="fa-solid fa-pen-to-square fa-lg" style="color: #0043b8;"></i></a>
                            <span class="delete"><a class="icon" href="/productlist/delete/<?= $product->productId ?>" onclick="if(!confirm('<?= $text_table_delete_confirm ?>')) return false;"><i class="fas fa-trash-alt fa-lg" style="color: #b8001c;"></i></a></span>
                        </div>
                    </td>

                </tr>
            <?php endforeach ?>

        <?php } ?>


    </tbody>
</table>
</div>