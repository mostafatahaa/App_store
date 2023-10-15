<title><?= $title ?></title>
<a style="float: right;padding: 10px;" href="/suppliers/create"><button type="button" class="btn btn-primary"><?= $text_add_supplier ?></button></a>

<table class="table table-striped table-white">
    <thead>
        <tr class="table-head">

            <th scope="col"><?= $text_table_name ?></th>
            <th scope="col"><?= $text_table_email ?></th>
            <th scope="col"><?= $text_table_phoneNumber ?></th>
            <th scope="col"><?= $text_table_address ?></th>
            <th scope="col"><?= $text_table_control ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($suppliers !== false) {
            foreach ($suppliers as $supplier) :
        ?>
                <tr>
                    <td><?= $supplier->name ?></td>
                    <td><?= $supplier->email ?></td>
                    <td><?= $supplier->phoneNumber ?></td>
                    <td><?= $supplier->address ?></td>
                    <td>
                        <div class="edit-delete">
                            <a class="icon" href="/suppliers/edit/<?= $supplier->supplierId ?>"><i class="fa-solid fa-pen-to-square fa-lg" style="color: #0043b8;"></i></a>
                            <span class="delete"><a class="icon" href="/suppliers/delete/<?= $supplier->supplierId ?>" onclick="if(!confirm('<?= $text_table_delete_confirm ?>')) return false;"><i class="fas fa-trash-alt fa-lg" style="color: #b8001c;"></i></a></span>
                        </div>
                    </td>

                </tr>
            <?php endforeach ?>

        <?php } ?>


    </tbody>
</table>
</div>