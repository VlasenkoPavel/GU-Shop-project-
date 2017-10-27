<ul class="drop-menu-account header__drop-menu-account">
    <li class="drop-menu-account__item">
        <a href="#" class="drop-menu-account__item-link">
            account
            <b class="drop-menu-account__drop-down-arrow">▼</b>
        </a>
        <ul class="drop-menu-account__sub-menu header-sub-menu">
            <?php if ( !core\Application::$app->user ): ?>
                <li><a href="http://localhost/index.php/User/Login" class="header-sub-menu__item-link">Login</a></li>
                <li><a href="http://localhost/index.php/User/Registration" class="header-sub-menu__item-link">Registration</a></li>
            <?php else: if ( core\Application::$app->user->getPermission() == "user" ): ?>
<!--            <li class="header-sub-menu__item-heading">Account</li>-->
            <li><a href="#" class="header-sub-menu__item-link">Account</a></li>
            <li><a href="http://localhost/index.php/User/Exit" class="header-sub-menu__item-link">Exit</a></li>
            <?php
                endif;
                if ( core\Application::$app->user->getPermission() == "admin" ):
            ?>
                <!--            <li class="header-sub-menu__item-heading">Account</li>-->
                <li><a href="http://localhost/index.php/Admin/ShowAdminPanel" class="header-sub-menu__item-link">Admin Panel</a></li>
                <li><a href="http://localhost/index.php/User/Exit" class="header-sub-menu__item-link">Exit</a></li>
            <?php
                endif;
                endif;
            ?>
        </ul>
    </li>
</ul>
