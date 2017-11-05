<p><?= 'Welcome' . $this->params['name'] ?></p><br>

<div class="admin-panel">
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Yuor Data</a></li>
            <li><a href="#tabs-2">Yuor Orders</a></li>

        </ul>
        <div id="tabs-1">
            <?php foreach ($this->params as $key=>$value): ?>
                <p class="admin-panel__text"><?=$key.': '.$value;?></p>
            <?php  endforeach; ?>
        </div>
        <div id="tabs-2">
            <p class="admin-panel__text">Here must be order info</p>
        </div>

</div>
