<main>
    <div class="title">
        <h2>Projects</h2>
        <a href="javascript:void(0);">Hello Bob !</a>
    </div>

    <article class="larg">







        <table class="table table-striped table-white">

            <?php if (isset($_SESSION["message"])) : ?>
                <div class="alert alert-primary" role="alert" style="background-color: #d3ffda;">
                    <?php echo $_SESSION["message"];
                    unset($_SESSION["message"]);

                    ?>
                </div>
            <?php endif ?>

            <thead>
                <tr>

                    <th scope="col"><?= $text_table_employee_name ?></th>
                    <th scope="col"><?= $text_table_employee_email ?></th>
                    <th scope="col"><?= $text_table_employee_age ?></th>
                    <th scope="col"><?= $text_table_employee_salary ?></th>
                    <th scope="col"><?= $text_table_employee_address ?></th>
                    <th scope="col"><?= $text_table_employee_control ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($employees !== false) {
                    foreach ($employees as $key => $employee) :
                ?>
                        <tr>
                            <td><?= $employee->name ?></td>
                            <td><?= $employee->email ?></td>
                            <td><?= $employee->age ?></td>
                            <td><?= $employee->salary . " LE" ?></td>
                            <td><?= $employee->address ?></td>
                            <td>
                                <div class="edit-delete" style="margin: 0;text-align: center;">
                                    <a class="icon" href="/employee/edit/<?= $employee->id ?>"><i class="fa-solid fa-pen-to-square fa-lg" style="color: #0043b8;"></i></a>
                                    <a class="icon" href="/employee/delete/<?= $employee->id ?>" onclick="if(!confirm('<?= $text_delete_confirm ?>')) return false;"><i class="fas fa-trash-alt fa-lg" style="color: #b8001c;"></i></a>
                                </div>
                            </td>

                        </tr>
                    <?php endforeach ?>

                <?php } ?>


            </tbody>
        </table>

    </article>
</main>