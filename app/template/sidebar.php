<div class="sidebar">
    <ul>
        <li><a href="/statistics">
                <span class="icon"><i class="fa-solid fa-chart-pie"></i></span>
                <span class="title"><?= $text_general_statistics ?></span>
            </a></li>

        <li><a href="/transaction">
                <span class="icon"><i class="fa-solid fa-money-bill-transfer"></i></span>
                <span class="title"><?= $text_transaction ?></span>
            </a></li>

        <li><a href="#">
                <span class="icon"><i class="fa-solid fa-money-bill"></i></span>
                <span class="title"><?= $text_expenses ?></span>
            </a></li>

        <li><a href="#">
                <span class="icon"><i class="fa-solid fa-circle" style="color: #e4cf67;"></i></span>
                <span class="title"><?= $text_expenses_types ?></span>
            </a></li>

        <li><a href="#">
                <span class="icon"><i class="fa-solid fa-circle" style="color: #e4cf67;"></i></span>
                <span class="title"><?= $text_expenses_daily ?></span>
            </a></li>

        <li><a href="store">
                <span class="icon"><i class="fa-solid fa-shop"></i></span>
                <span class="title"><?= $text_store ?></span>
            </a></li>

        <li><a href="store">
                <span class="icon"><i class="fa-solid fa-circle" style="color: #e4cf67;"></i></span>
                <span class="title"><?= $text_store_products ?></span>
            </a></li>

        <li><a href="store">
                <span class="icon"><i class="fa-solid fa-circle" style="color: #e4cf67;"></i></span>
                <span class="title"><?= $text_store_products_type ?></span>
            </a></li>

        <li><a href="clients">
                <span class="icon"><i class="fa-solid fa-users-rectangle"></i></span>
                <span class="title"><?= $text_clients ?></span>
            </a></li>

        <li class="<?= $this->matchUrl('/supliers') === true ? ' selected' : '' ?>"><a href="/supliers">
                <span class="icon"><i class="fa-solid fa-user-group"></i></span>
                <span class="title"><?= $text_suppliers ?></span>
            </a></li>

        <li class="<?= $this->matchUrl('/users') === true ? ' selected' : '' ?>"><a href="/users">
                <span class="icon"><i class="fa-solid fa-users"></i></span>
                <span class="title"><?= $text_users ?></span>
            </a></li>

        <li><a href="/users">
                <span class="icon"><i class="fa-solid fa-circle" style="color: #e4cf67;"></i></span>
                <span class="title"><?= $text_users_list ?></span>
            </a></li>

        <li class="<?= $this->matchUrl('/usersgroups') === true ? ' selected' : '' ?>"><a href="/usersgroups">
                <span class="icon"><i class="fa-solid fa-circle" style="color: #e4cf67;"></i></span>
                <span class="title"><?= $text_users_group ?></span>
            </a></li>
        <li><a href="/privileges">
                <span class="icon">
                    <i class="fa-solid fa-circle" style="color: #e4cf67;"></i>
                </span>
                <span class="title"><?= $text_users_privileges ?></span>
            </a></li>
        <li><a href="reports">
                <span class="icon"><i class="fa-solid fa-chart-column"></i></i></span>
                <span class="title"><?= $text_reports ?></span>
            </a></li>

        <li><a href="notifications">
                <span class="icon"><i class="fa-solid fa-bell"></i></span>
                <span class="title"><?= $text_notifications ?></span>
            </a></li>

        <li><a href="auth/logout">
                <span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                <span class="title"><?= $text_logout ?></span>
            </a></li>

    </ul>

</div>
<!-- this will be at the start of the view files -->
<div class="main_container">
    <?php $messages = $this->messenger->getMessage();
    if (!empty($messages)) : foreach ($messages as $message) : ?>
            <div class="alert alert-primary t<?= $message[1] ?>" role="alert" style="color:white;">
                <?php echo $message[0] ?>
            </div>
    <?php endforeach;
    endif; ?>