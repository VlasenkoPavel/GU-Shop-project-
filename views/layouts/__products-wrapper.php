<div class="products-wrapper products-section__products-wrapper">
    <?php foreach ($this->data as $prod): ?>
        <a href="<?= 'http://localhost/index.php/main/ProductPage'.'?product_id='.$prod['product_id']?>" class="product-link">
            <img src="<?= PROD_IMG_CATALOG.$prod['product_id'].'.jpg' ?>" alt="" class="product-link__product-img">
            <p class="product-link__product-name"><?= $prod['product_name'] ?></p>
            <p class="product-link__product-price"><?= $prod['price'] ?></p>
            <div class="product-link__product-hover-mask">
                <div class="product-link__add-to-cart">add to cart</div>
            </div>
        </a>
    <?php endforeach ?>
</div>
