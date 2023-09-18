<?php






?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>PDO</title>
</head>

<div style="margin-top: 84px;">
    <a href="employee/add" style="font-size: x-large;border: solid;border-radius: 9px;padding: 10px;margin: 151px;"><?= $text_add_employee ?></a>
</div>

<table class="table table-striped table-white" style="width: 70%; margin:auto;margin-top: 100px;">

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
                        <a href="/employee/edit/<?= $employee->id ?>"><button type="button" class="btn btn-info">Edit</button></a>
                        <a href="/employee/delete/<?= $employee->id ?>" onclick="if(!confirm('<?= $text_delete_confirm ?>')) return false;"><i class=" fa fa-time"></i><button type=" button" class="btn btn-danger">Delete</button></a>
                    </td>

                </tr>
            <?php endforeach ?>

        <?php } ?>


    </tbody>
</table>