<main>
    <div class="title">
        <h2>Projects</h2>
        <a href="javascript:void(0);">Hello Bob !</a>
    </div>

    <article class="larg">
        <form method="post" style="width: 50%; margin:auto; padding-top:100px;">

            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" value="<?= $employee->name ?>" aria-describedby="emailHelp" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" value="<?= $employee->email ?>" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">age</label>
                <input type="number" class="form-control" name="age" value="<?= $employee->age ?>" placeholder="Your age">
            </div>
            <div class="form-group">
                <label>Salary</label>
                <input type="number" name="salary" class="form-control" value="<?= $employee->salary ?>" step="0.1" laceholder=" put your salary">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" value="<?= $employee->address ?>" placeholder="Your Address">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </article>
</main>