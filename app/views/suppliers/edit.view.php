<title><?= $title ?></title>
<legend><?= $text_legend ?></legend>
<h1 class="header-text"><?= $title ?></h1>

<form method="post" style="width: 50%; margin:auto; padding-top:100px;">

    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_lable_name ?></label>
        <input id="ddd" type="text" class="form-control" name="name" value="<?= $this->showValue("name", $supplier) ?>" aria-describedby="emailHelp" maxlength="50">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_lable_email ?></label>
        <input type="email" class="form-control" name="email" value="<?= $this->showValue("email", $supplier) ?>" aria-describedby="emailHelp" maxlength="25">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_lable_phoneNumber ?></label>
        <input type="text" class="form-control" name="phoneNumber" value="<?= $this->showValue("phoneNumber", $supplier) ?>" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_lable_address ?></label>
        <input type="text" class="form-control" name="address" value="<?= $this->showValue("address", $supplier) ?>" aria-describedby="emailHelp">
    </div>
    <button style="display: block; margin-top: 17px;margin-left: auto;" type="submit" name="submit" class="btn btn-primary"><?= $text_lable_save ?></button>
</form>
</div>