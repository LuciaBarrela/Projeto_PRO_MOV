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
        <br><br><h1>Cronograma</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome da Turma</th>
                    <th>Data Início</th>
                    <th>Data Fim</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Placeholder data for demonstration purposes -->
                <tr>
                    <td>1</td>
                    <td>Turma A</td>
                    <td>2023-09-01</td>
                    <td>2023-12-15</td>
                    <td>
                        <a href="edit_cronograma.php?id=1" class="btn btn-primary">Edit</a>
                        <a href="delete_cronograma.php?id=1" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Turma B</td>
                    <td>2023-10-01</td>
                    <td>2024-03-31</td>
                    <td>
                        <a href="edit_cronograma.php?id=2" class="btn btn-primary">Edit</a>
                        <a href="delete_cronograma.php?id=2" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>

        <!-- Form to add a new entry to Cronograma -->
        <br><br><h2>Adicionar novo cronograma</h2>
        <form action="add_cronograma.php" method="POST">
            <label for="turmaID">Turma ID:</label>
            <input type="number" name="turmaID" id="turmaID" required>
            <label for="dataInicio">Data Início:</label>
            <input type="date" name="dataInicio" id="dataInicio" required>
            <label for="dataFim">Data Fim:</label>
            <input type="date" name="dataFim" id="dataFim" required>
            <button type="submit" class="btn btn-success">Adicionar</button>
        </form>
    </div>
</body>
</html>


<?php

include "footer.php";

?>