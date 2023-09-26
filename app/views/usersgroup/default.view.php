<title><?= $title ?></title>
<div class="main_container">
    <h1 class="header-text"><?= $title ?></h1>
    <a style="float: right;padding: 10px;" href="/privileges/create"><button type="button" class="btn btn-primary"><?= $text_add_group ?></button></a>

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
                <th style="width: 85%;" scope="col"><?= $text_table_group_name ?></th>
                <th scope="col"><?= $text_table_control ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($groups !== false) {
                foreach ($groups as $group) :
            ?>
                    <tr>
                        <td><?= $group->groupName ?></td>
                        <td>
                            <div class="edit-delete">
                                <a class="icon" href="/group/edit/<?= $group->groupId ?>"><i class="fa-solid fa-pen-to-square fa-lg" style="color: #0043b8;"></i></a>
                                <span class="delete"><a class="icon" href="/group/delete/<?= $group->groupId ?>" onclick="if(!confirm('<?= $text_delete_confirm ?>')) return false;"><i class="fas fa-trash-alt fa-lg" style="color: #b8001c;"></i></a></span>
                            </div>
                        </td>

                    </tr>
                <?php endforeach ?>

            <?php } ?>


        </tbody>
    </table>
</div>