<!-- <div class="sidebar">
    <div class="user-text">
        <h3><?= $this->session->u->profile->firstName ?> <?= $this->session->u->profile->lastName ?></h3>
        <h4><?= $this->session->u->groupName ?></h4>
    </div>
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

        <li><a href="/productlist">
                <span class="icon"><i class="fa-solid fa-circle" style="color: #e4cf67;"></i></span>
                <span class="title"><?= $text_store_products ?></span>
            </a></li>

        <li><a href="/productcategories">
                <span class="icon"><i class="fa-solid fa-circle" style="color: #e4cf67;"></i></span>
                <span class="title"><?= $text_store_products_type ?></span>
            </a></li>

        <li><a href="/clients">
                <span class="icon"><i class="fa-solid fa-users-rectangle"></i></span>
                <span class="title"><?= $text_clients ?></span>
            </a></li>

        <li class="<?= $this->matchUrl('/suppliers') === true ? ' selected' : '' ?>"><a href="/suppliers">
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

        <li><a href="/auth/logout">
                <span class="icon"><i class="fa-solid fa-right-from-bracket"></i></span>
                <span class="title"><?= $text_logout ?></span>
            </a></li>

    </ul>

</div> -->
<!-- this will be at the start of the view files -->


<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-text mx-3"><?= $this->session->u->profile->firstName ?> <?= $this->session->u->profile->lastName ?></div>
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user"></i>
        </div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span><?= $this->session->u->groupName ?></span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->


    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-chart-area"></i>
            <span><?= $text_expenses ?></span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span><?= $text_store ?></span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/productlist"><?= $text_store_products ?></a>
                <a class="collapse-item" href="/productcategories"><?= $text_store_products_type ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/clients">
            <i class="fas fa-fw fa-chart-area"></i>
            <span><?= $text_clients ?></span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/suppliers">
            <i class="fas fa-fw fa-chart-area"></i>
            <span><?= $text_suppliers ?></span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span><?= $text_users ?></span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="/users"><?= $text_users_list ?></a>
                <a class="collapse-item" href="/usersgroups"><?= $text_users_group ?></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/privileges">
            <i class="fas fa-fw fa-chart-area"></i>
            <span><?= $text_users_privileges ?></span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span><?= $text_reports ?></span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span><?= $text_notifications ?></span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/auth/logout">
            <i class="fas fa-fw fa-chart-area"></i>
            <span><?= $text_logout ?></span></a>
    </li>




</ul>