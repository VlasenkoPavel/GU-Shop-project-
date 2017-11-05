<p><?= $this->message ?></p>
<form action="http://localhost/index.php/User/Registration" class="form-admin-panel" method="post">
    <legend class="form-admin-panel__legend">Registration data</legend>
    <label class="form-admin-panel__label">Login<input type="text" class="form-admin-panel__input" name="login" value="<?= $_POST['login'] ? $_POST['login'] : ''?>"></label>
    <label class="form-admin-panel__label">Password<input type="text" class="form-admin-panel__input" name="password" value="<?= $_POST['password'] ? $_POST['password'] : ''?>"></label>
    <label class="form-admin-panel__label">Name<input type="text" class="form-admin-panel__input" name="name" value="<?= $_POST['name'] ? $_POST['name'] : ''?>"></label>
    <label class="form-admin-panel__label">Surname<input type="text" class="form-admin-panel__input" name="surname" value="<?= $_POST['surname'] ? $_POST['surname'] : ''?>"></label>
    <label class="form-admin-panel__label">Country<input type="text" class="form-admin-panel__input" name="country" value="<?= $_POST['country'] ? $_POST['country'] : ''?>"></label>
    <label class="form-admin-panel__label">Zip Code<input type="number" class="form-admin-panel__input" name="zipcode" value="<?= $_POST['zipcode'] ? $_POST['zipcode'] : ''?>"></label>
    <label class="form-admin-panel__label">Address<input type="text" class="form-admin-panel__input" name="address" value="<?= $_POST['address'] ? $_POST['address'] : ''?>"></label>
    <label class="form-admin-panel__label">E-mail<input type="text" class="form-admin-panel__input" name="email" value="<?= $_POST['email'] ? $_POST['email'] : ''?>"></label>
    <label class="form-admin-panel__label">Phone<input type="text" class="form-admin-panel__input" name="phone" value="<?= $_POST['phone'] ? $_POST['phone'] : ''?>"></label>
    <input type="submit" class="form-admin-panel__submit form-admin-panel__submit_product" value="registration">
</form>
