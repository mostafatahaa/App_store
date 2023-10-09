<title><?= $title ?></title>
<legend><?= $text_legend ?></legend>
<h1 class="header-text"><?= $title ?></h1>

<form autocomplete="off" method="post" enctype="multipart/form-data" style="width: 50%; margin:auto; padding-top:100px;">

    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_lable_name ?></label>
        <input required type="text" class="form-control" name="name" value="<?= $this->showValue("name", $product) ?>" aria-describedby="emailHelp" maxlength="20">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_table_quantity ?></label>
        <input required type="number" class="form-control" name="quantity" value="<?= $this->showValue("quantity", $product) ?>" min="1" step="1" aria-describedby="emailHelp" maxlength="50">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_table_buyPrice ?></label>
        <input required type="number" class="form-control" name="buyPrice" value="<?= $this->showValue("buyPrice", $product) ?>" min="1" step="0.01" aria-describedby="emailHelp" maxlength="50">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_table_sellPrice ?></label>
        <input required type="number" class="form-control" name="sellPrice" value="<?= $this->showValue("sellPrice", $product) ?>" min="1" step="0.01" aria-describedby="emailHelp" maxlength="50">
    </div>

    <select required class="form-select" name="categoryId" aria-label="Default select example">
        <option selected><?= $text_user_categoryId ?></option>
        <?php if ($categories) :;
            foreach ($categories as $category) : ?>
                <option value="<?= $category->categoryId ?>" <?= $this->selectedIf("categoryId", $category->categoryId, $product) ?>><?= $category->name ?></option>
        <?php endforeach;
        endif ?>
    </select>

    <select required class="form-select" name="unit" aria-label="Default select example">
        <option><?= $text_lable_unit ?></option>
        <option value="1" <?= $this->selectedIf("unit", "1", $product) ?>><?= $text_unit_1 ?></option>
        <option value="2" <?= $this->selectedIf("unit", "2", $product) ?>><?= $text_unit_2 ?></option>
        <option value="3"><?= $this->selectedIf("unit", "3", $product) ?><?= $text_unit_3 ?></option>
        <option value="4"><?= $this->selectedIf("unit", "4", $product) ?><?= $text_unit_4 ?></option>
    </select>

    <div class="form-group">
        <label for="exampleInputEmail1"><?= $text_lable_img ?></label>
        <input type="file" class="form-control" name="image" accept="image/*" aria-describedby="emailHelp">
    </div>
    <?php if ($product->image !== null) : ?>
        <div class="form-group">
            <img src="/uploads/images/<?= $product->image ?>" width="30%">
        </div>
    <?php endif ?>
    <button type="submit" name="submit" class="btn btn-primary"><?= $text_lable_save ?></button>
</form>