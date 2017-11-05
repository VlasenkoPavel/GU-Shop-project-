<div class="admin-panel">
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Products management</a></li>
            <li><a href="#tabs-2">Admin Data</a></li>
<!--            <li><a href="#tabs-3">Users management</a></li>-->
<!--            <li><a href="#tabs-4">Orders management</a></li>-->
        </ul>
        <div id="tabs-1">
            <form action="http://localhost/index.php/Admin/AddProdToDb" class="form-admin-panel" method="post">
                <legend class="form-admin-panel__legend">Add product to Db</legend>
                <label class="form-admin-panel__label">Enter product name <input type="text" class="form-admin-panel__input" name="product_name"></label>
                <label class="form-admin-panel__label">
                    Choose product type
                    <select name="type_id" class="form-admin-panel__select">
                        <?php foreach ($this->types as $typeData): ?>
                            <option value="<?=$typeData['id']?>"><?= $typeData['type']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label class="form-admin-panel__label">
                    Choose product brand
                    <select name="brand_id" class="form-admin-panel__select">
                        <?php foreach ($this->brands as $brandData): ?>
                            <option value="<?=$brandData['id']?>"><?= $brandData['brand']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label class="form-admin-panel__label">
                    Choose product category
                    <select name="category_id" class="form-admin-panel__select">
                        <?php foreach ($this->categoryes as $categoryData): ?>
                            <option value="<?=$categoryData['id']?>"><?= $categoryData['category']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label class="form-admin-panel__label">Enter product price <input type="number" class="form-admin-panel__input" name="price"></label>
                <label class="form-admin-panel__label">Enter product discount <input type="number" class="form-admin-panel__input" name="discount"></label>
                <label class="form-admin-panel__label">Enter product feature <input type="feature" class="form-admin-panel__input" name="feature_id"></label>
                <input type="submit" class="form-admin-panel__submit form-admin-panel__submit_product" value="add product">
            </form>
            <form id="addProdImg" action="http://localhost/index.php/Admin/AddProdImg" class="form-admin-panel" method="post" enctype="multipart/form-data">
                <legend class="form-admin-panel__legend form-admin-panel__legend_category">Add product image</legend>
                <label class="form-admin-panel__label">Enter product id<input type="number" class="form-admin-panel__input" name="product_id"></label>
                <input type="file" name="filename" class="form-admin-panel__input-file" value="Choose product img file" accept="image/jpeg">
                <input type="submit" class="form-admin-panel__submit form-admin-panel__submit_product" value="add product">
            </form>
            <form action="http://localhost/index.php/Admin/AddCategoryToDb" class="form-admin-panel">
                <legend class="form-admin-panel__legend form-admin-panel__legend_category">Add category to Db</legend>
                <div class="form-admin-panel__inner-wrapper">
                    <label class="form-admin-panel__label">Enter category name<input type="text" class="form-admin-panel__input" name="category"></label>
                    <input type="submit" class="form-admin-panel__submit" value="add category">
                </div>
            </form>
            <form action="http://localhost/index.php/Admin/AddTypeToDb" class="form-admin-panel">
                <legend class="form-admin-panel__legend form-admin-panel__legend_type">Add type to Db</legend>
                <div class="form-admin-panel__inner-wrapper">
                    <label class="form-admin-panel__label">Enter type name<input type="text" class="form-admin-panel__input" name="type"></label>
                    <input type="submit" class="form-admin-panel__submit" value="add type">
                </div>
            </form>
            <form action="http://localhost/index.php/Admin/AddBrandToDb" class="form-admin-panel">
                <legend class="form-admin-panel__legend form-admin-panel__legend_brand">Add brand to Db</legend>
                <div class="form-admin-panel__inner-wrapper">
                    <label class="form-admin-panel__label">Enter brand name<input type="text" class="form-admin-panel__input" name="brand"></label>
                    <input type="submit" class="form-admin-panel__submit" value="add brand">
                </div>
            </form>
            <form action="http://localhost/index.php/Admin/DeleteProductFromDb" id="dellProd" class="form-admin-panel">
                <legend class="form-admin-panel__legend form-admin-panel__legend_dell-prod">Delete product from Db</legend>
                <div class="form-admin-panel__inner-wrapper">
                    <label class="form-admin-panel__label">Enter product id<input type="text" class="form-admin-panel__input" name="product_id"></label>
                    <input type="submit" class="form-admin-panel__submit" value="Delete product">
                </div>
                <div class="admin-panel__info">
                </div>
            </form>
            <form action="#" id="prodIdByName" class="form-admin-panel">
                <legend class="form-admin-panel__legend form-admin-panel__legend_dell-prod">Find product id by name</legend>
                <div class="form-admin-panel__inner-wrapper">
                    <label class="form-admin-panel__label">Enter product name<input type="text" class="form-admin-panel__input" name="prod_name"></label>
                    <input type="submit" class="form-admin-panel__submit" value="Show product">
                </div>
                <div class="admin-panel__info">
                </div>
            </form>
        </div>
        <div id="tabs-2">
            <?php foreach ($this->params as $key=>$value): ?>
                <p class="admin-panel__text"><?=$key.': '.$value;?></p>
            <?php  endforeach; ?>
        </div>
<!--        <div id="tabs-3">-->
<!--            <form action="" class="form-admin-panel">-->
<!--                <legend class="form-admin-panel__legend form-admin-panel__legend_user">User data</legend>-->
<!--                <div class="form-admin-panel__inner-wrapper">-->
<!--                    <label class="form-admin-panel__label">Enter user id<input type="number" class="form-admin-panel__input" name="product_price"></label>-->
<!--                    <input type="submit" class="form-admin-panel__submit" value="Show user data">-->
<!--                </div>-->
<!--                <div class="admin-panel__info">-->
<!--                    --><?php //foreach ($this->params as $key=>$value): ?>
<!--                        <p class="admin-panel__text">--><?//=$key.': '.$value;?><!--</p>-->
<!--                    --><?php // endforeach; ?>
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!--        <div id="tabs-4">-->
<!--            <form action="" class="form-admin-panel">-->
<!--                <legend class="form-admin-panel__legend form-admin-panel__legend_order">Order data</legend>-->
<!--                <div class="form-admin-panel__inner-wrapper">-->
<!--                    <label class="form-admin-panel__label">Enter order id<input type="number" class="form-admin-panel__input" name="product_price"></label>-->
<!--                    <input type="submit" class="form-admin-panel__submit" value="Show order details">-->
<!--                </div>-->
<!--                <div class="admin-panel__info">-->
<!--                    --><?php //foreach ($this->params as $key=>$value): ?>
<!--                        <p class="admin-panel__text">--><?//=$key.': '.$value;?><!--</p>-->
<!--                    --><?php // endforeach; ?>
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
    </div>

</div>
