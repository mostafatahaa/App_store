<h1>Hello From employees</h1>

<?php

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>PDO</title>
</head>



<table class="table table-striped table-dark" style="width: 70%; margin:auto;margin-top: 100px;">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email address</th>
            <th scope="col">Age</th>
            <th scope="col">Salary</th>
            <th scope="col">Address</th>
            <th scope="col">Control</th>
        </tr>
    </thead>
    <?php if ($employees === false) : ?>
        <tr>
            <td>
                <div class="alert alert-dark" role="alert" style="background-color: #d3d3d3;">
                    No Information to show
                </div>
            <td>
        </tr>
    <?php endif ?>
    <tbody>
        <?php
        if ($employees !== false) {
            foreach ($employees as $employees => $val) :
        ?>
                <tr>
                    <td><?= $val->name ?></td>
                    <td><?= $val->email ?></td>
                    <td><?= $val->age ?></td>
                    <td><?= $val->salary . " LE" ?></td>
                    <td><?= $val->address ?></td>
                    <td>
                        <a href="/employee/edit/<?= $val->id ?>"><button type="button" class="btn btn-info">Edit</button></a>
                        <a href="/employee/delete/<?= $val->id ?>" onclick="if(!confirm('Do you want to delete this employee ?')) return false;"><i class=" fa fa-time"></i><button type=" button" class="btn btn-danger">Delete</button></a>
                    </td>

                </tr>
            <?php endforeach ?>

        <?php } ?>


    </tbody>
</table>