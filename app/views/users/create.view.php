<title><?= $title ?></title>
<legend><?= $text_legend ?></legend>
<h1 class="header-text"><?= $title ?></h1>

<form method="post" style="width: 50%; margin:auto; padding-top:100px;">

    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_lable_userName ?></label>
        <input type="text" class="form-control" name="userName" aria-describedby="emailHelp" maxlength="30">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_lable_pasword ?></label>
        <input type="password" class="form-control" name="confirmPassword" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_lable_confirmPassword ?></label>
        <input type="password" class="form-control" name="password" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_lable_email ?></label>
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" maxlength="40">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_lable_confirmEmail ?></label>
        <input type="email" class="form-control" name="confirmEmail" aria-describedby="emailHelp" maxlength="40">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_lable_phoneNumber ?></label>
        <input type="text" class="form-control" name="phoneNumber" aria-describedby="emailHelp">
    </div>
    <select class="form-select" name="groupId" aria-label="Default select example">
        <option selected><?= $text_user_groupId ?></option>
        <?php if ($groups) :;
            foreach ($groups as $group) : ?>
                <option value="<?= $group->groupId ?>"><?= $group->groupName ?></option>
        <?php endforeach;
        endif ?>
    </select>
    <button style="display: block; margin-top: 17px;margin-left: auto;" type="submit" name="submit" class="btn btn-primary"><?= $text_lable_save ?></button>
</form>
</div>