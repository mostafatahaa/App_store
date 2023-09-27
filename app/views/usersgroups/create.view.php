<title><?= $title ?></title>
<div class="main_container">
    <legend><?= $text_legend ?></legend>
    <h1 class="header-text"><?= $title ?></h1>

    <form method="post" style="width: 50%; margin:auto; padding-top:100px;">

        <div class="form-group">
            <label for="exampleInputEmail1"><?= $text_lable_privilege_title ?></label>
            <input type="text" class="form-control" name="groupName" aria-describedby="emailHelp" placeholder="Enter Privilege" maxlength="20">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"><?= $text_lable_privilege ?></label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Default checkbox
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    Checked checkbox
                </label>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary"><?= $text_lable_privilege_save ?></button>
    </form>
</div>