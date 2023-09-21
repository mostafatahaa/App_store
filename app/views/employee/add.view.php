<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>PDO</title>
</head>


<form method="POST" style="direction:rtl;width: 70%;margin: auto;">
    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_table_employee_name ?></label>
        <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter employee name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_table_employee_email ?></label>
        <input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter employee email">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_table_employee_age ?></label>
        <input type="text" class="form-control" name="age" aria-describedby="emailHelp" placeholder="Enter employee age">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_table_employee_salary ?></label>
        <input type="text" class="form-control" name="salary" aria-describedby="emailHelp" placeholder="Enter employee salary">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_table_employee_address ?></label>
        <input type="text" class="form-control" name="address" aria-describedby="emailHelp" placeholder="Enter employee address">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>