<div class="main_container">
    <form method="post" style="width: 50%; margin:auto; padding-top:100px;">

        <div class="form-group">
            <label for="exampleInputEmail1"><?= $text_table_employee_name ?></label>
            <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"><?= $text_table_employee_email ?></label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1"><?= $text_table_employee_age ?></label>
            <input type="number" class="form-control" name="age" placeholder="Your age">
        </div>
        <div class="form-group">
            <label><?= $text_table_employee_salary ?></label>
            <input type="number" name="salary" class="form-control" step="0.1" placeholder=" put your salary">
        </div>
        <div class="form-group">
            <label><?= $text_table_employee_address ?></label>
            <input type="text" class="form-control" name="address" placeholder="Your Address">
        </div>
        <button type="submit" name="submit" class="btn btn-primary"><?= $text_table_submit ?></button>
    </form>
</div>