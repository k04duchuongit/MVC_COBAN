<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chi tiết người dùng</title>
</head>

<body>
    <h1>Chi tiết người dùng : <?= $user['name']  ?></h1>
    <table>
        <tr>
            <th>Tên trường</th>
            <th>Giá trị </th>
        </tr>
        <tr>
            <td>name</th>
            <td> <?= $user['name']  ?> </th>
        </tr>
        <tr>
            <td>Email</th>
            <td> <?= $user['email']  ?></th>
        </tr>
    </table>
</body>

</html>