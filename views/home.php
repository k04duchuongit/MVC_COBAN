<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>ddaay la trang home</h1>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>password</th>
        </tr>
        <?php
        foreach ($dataUser as $key => $data) {
            extract($data) ?>
            <tr>
                <td><?= $id ?></td>
                <td><?= $name ?></td>
                <td><?= $email ?></td>
                <td><?= $password ?></td>
                <td><a href="<?= BASE_URL . '?act=user-detail&id=' . $id ?>">xem chi tiet</a></td>
                <td><a href="<?= BASE_URL . '?act=delete-user&id=' . $id ?>">xem chi tiet</a></td>
            </tr>
        <?php }
        ?>
    </table>
</body>

</html>