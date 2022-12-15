
<form action="mailer.php" method="post">
    <h1>Форма отправки письма</h1>
    <p>Введите адреса для рассылки через запятую</p>
    <p><textarea name="emails"  required rows="10" cols="45"></textarea></p>

    <p><input checked type="radio" name="color" value="red"  id="red"></p>
    <label for="red">Красный</label>
    <p><input type="radio" name="color" value="green"  id="red"></p>
    <label for="green">Зеленый</label>

    <p><input type="submit" value="Отправить"></p>
</form>
