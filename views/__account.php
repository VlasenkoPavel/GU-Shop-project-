<p><?= $this->message?></p><br>

<?php foreach ($this->params as $key=>$value): ?>

        <p><?=$key.': '.$value;?></p><br>

<?php  endforeach; ?>