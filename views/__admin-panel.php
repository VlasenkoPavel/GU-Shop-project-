<div class="admin-panel">

    <p class="">Administrator panel</p>
    <div class="main-menu">
        <ul class="main-menu__ul">
            <li class="main-menu__item">
                <a href="#" class="main-menu__item-link">Orders management</a>
                <ul class="main-menu__sub-menu header-sub-menu">
                    <li class="header-sub-menu__item-heading">Item</li>
                    <li><a href="#" class="header-sub-menu__item-link">Item</a></li>
                    <li><a href="#" class="header-sub-menu__item-link">Item</a></li>
                    <li><a href="#" class="header-sub-menu__item-link">Item</a></li>
                </ul>
            </li>
            <li class="main-menu__item">
                <a href="#" class="main-menu__item-link">Products management</a>
                <ul class="main-menu__sub-menu header-sub-menu">
                    <li><a href="#" class="header-sub-menu__item-link">Add new product to data base</a></li>
                    <li><a href="#" class="header-sub-menu__item-link">Remove product rom data base</a></li>
                </ul>
            </li>
            <li class="main-menu__item">
                <a href="#" class="main-menu__item-link">Users management</a>
                <ul class="main-menu__sub-menu header-sub-menu">
                    <li><a href="#" class="header-sub-menu__item-link">Item</a></li>
                    <li><a href="#" class="header-sub-menu__item-link">Item</a></li>
                    <li><a href="#" class="header-sub-menu__item-link">Item</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <section class="admin-panel__info">
        <h3 class="admin-panel__text">Administrator data:</h3>
        <?php foreach ($this->params as $key=>$value): ?>
        <p class="admin-panel__text"><?=$key.': '.$value;?></p>
        <?php  endforeach; ?>
    </section>
</div>
