<!-- <span class="bckg"></span>
<header>
    <h1>Dashboard</h1>
    <nav>
        <ul>
            <li>
                <a href="" data-title="Projects"><?= $text_app_manager ?></a>
            </li>
            <li>
                <a href="/employee" data-title="Team"><?= $text_employees ?></a>
            </li>
            <li>
                <a href="javascript:void(0);" data-title="Diary"><?= $text_general_statistics ?></a>
            </li>
            <li>
                <a href="javascript:void(0);" data-title="Timeline"><?= $text_app_manager ?></a>
            </li>
            <li>
                <a href="javascript:void(0);" data-title="Settings"><?= $text_app_manager ?></a>
            </li>
            <li>
                <a href="javascript:void(0);" data-title="Search"><?= $text_log_out ?></a>
            </li>
        </ul>
    </nav>



    <li class="language">
        <a href="/language"><i class="fa-solid fa-language">
                <p class="lang-text">تغيير اللغه</p>

            </i></a>
    </li>
</header> -->


<div class="top_navbar">
    <div class="hamburger">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
    </div>
    <div class="top_menu">
        <div class="logo"><?= $text_dashboard ?></div>
        <ul>
            <li class="language">
                <a href="/language"><i class="fa-solid fa-language"></i></a>
            </li>
            <li><a href="#"><i class="fas fa-search"></i></a></li>
            <li><a href="#"><i class="fas fa-bell"></i></a></li>
            <li><a href="/language"><i class="fas fa-user"></i></a></li>
        </ul>
    </div>
</div>