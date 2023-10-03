<title><?= $title ?></title>
<h1 class="header-text"><?= $title ?></h1>
<a style="float: right;padding: 10px;" href="/user/add"><button type="button" class="btn btn-primary"><?= $text_add_user ?></button></a>

<table class="table table-striped table-white">
    <?php if (isset($_SESSION["message"])) : ?>
        <div class="alert alert-primary" role="alert" style="background-color: #d3ffda;">
            <?php echo $_SESSION["message"];
            unset($_SESSION["message"]);

            ?>
        </div>
    <?php endif ?>


    <thead>
        <tr class="table-head">

            <th scope="col"><?= $text_header ?></th>
            <th scope="col"><?= $text_new_item ?></th>
            <th scope="col"><?= $text_table_username ?></th>
            <th scope="col"><?= $text_table_group ?></th>
            <th scope="col"><?= $text_table_email ?></th>
            <th scope="col"><?= $text_table_subscription_date ?></th>
            <th scope="col"><?= $text_table_last_login ?></th>
            <th scope="col"><?= $text_table_control ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($users !== false) {
            foreach ($users as $user) :
        ?>
                <tr>
                    <td><?= $user->useId ?></td>
                    <td><?= $user->username ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->phoneNumber ?></td>
                    <td><?= $user->subscriptionDate ?></td>
                    <td><?= $user->lastLogin ?></td>
                    <td><?= $user->groupId ?></td>
                    <td>
                        <div class="edit-delete">
                            <a class="icon" href="/user/edit/<?= $user->id ?>"><i class="fa-solid fa-pen-to-square fa-lg" style="color: #0043b8;"></i></a>
                            <span class="delete"><a class="icon" href="/user/delete/<?= $user->id ?>" onclick="if(!confirm('<?= $text_delete_confirm ?>')) return false;"><i class="fas fa-trash-alt fa-lg" style="color: #b8001c;"></i></a></span>
                        </div>
                    </td>

                </tr>
            <?php endforeach ?>

        <?php } ?>


    </tbody>
</table>
</div>