    <title><?= $title ?></title>
    <legend><?= $text_legend ?></legend>
    <h1 class="header-text"><?= $title ?></h1>

    <form method="post" style="width: 50%; margin:auto; padding-top:100px;">

        <div class="form-group">
            <label for="exampleInputEmail1"><?= $text_lable_privilege_title ?></label>
            <input type="text" class="form-control" name="privilegeTitle" aria-describedby="emailHelp" placeholder="Enter Privilege" maxlength="30">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"><?= $text_lable_privilege_url ?></label>
            <input type="text" class="form-control" name="privilege" aria-describedby="emailHelp" placeholder="Enter Privilege" maxlength="30">
        </div>
        <button type="submit" name="submit" class="btn btn-primary"><?= $text_lable_privilege_save ?></button>
    </form>
    </div>