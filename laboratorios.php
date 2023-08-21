<?php

include "header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertical Table with MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <br><br><h1>Laboratórios</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Placeholder data for demonstration purposes -->
                <tr>
                    <td>1</td>
                    <td>Laboratory A</td>
                    <td>
                        <a href="edit_lab.php?id=1" class="btn btn-primary">Edit</a>
                        <a href="delete_lab.php?id=1" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Laboratory B</td>
                    <td>
                        <a href="edit_lab.php?id=2" class="btn btn-primary">Edit</a>
                        <a href="delete_lab.php?id=2" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>

        <!-- Form to add a new laboratory -->
        <br><br><h2>Adicionar novo laboratório</h2>
        <form action="add_lab.php" method="POST">
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" required>
            <button type="submit" class="btn btn-success">Adicionar</button>
        </form>
    </div>
</body>
</html>


<?php

include "footer.php";

?>

