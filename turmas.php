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
        <br><br><h1>Turmas</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome da Turma</th>
                    <th>Localização</th>
                    <th>Estado</th>
                    <th>Regime</th>
                    <th>ID Coordenador</th>
                    <th>Data Início</th>
                    <th>Data Fim</th>
                    <th>ID Curso</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Placeholder data for demonstration purposes -->
                <tr>
                    <td>1</td>
                    <td>Turma A</td>
                    <td>Location A</td>
                    <td>Active</td>
                    <td>Full-time</td>
                    <td>1</td>
                    <td>2023-09-01</td>
                    <td>2023-12-15</td>
                    <td>1</td>
                    <td>
                        <a href="edit_turma.php?id=1" class="btn btn-primary">Edit</a>
                        <a href="delete_turma.php?id=1" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Turma B</td>
                    <td>Location B</td>
                    <td>Inactive</td>
                    <td>Part-time</td>
                    <td>2</td>
                    <td>2023-10-01</td>
                    <td>2024-03-31</td>
                    <td>2</td>
                    <td>
                        <a href="edit_turma.php?id=2" class="btn btn-primary">Edit</a>
                        <a href="delete_turma.php?id=2" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>

        <!-- Form to add a new turma -->
        <br><br><h2>Adicionar nova turma</h2>
        <form action="add_turma.php" method="POST">
            <label for="nomeTurma">Nome da Turma:</label>
            <input type="text" name="nomeTurma" id="nomeTurma" required>
            <label for="localizacao">Localização:</label>
            <input type="text" name="localizacao" id="localizacao" required>
            <label for="estado">Estado:</label>
            <input type="text" name="estado" id="estado" required>
            <label for="regime">Regime:</label>
            <input type="text" name="regime" id="regime" required>
            <label for="coordenadorID">ID Coordenador:</label>
            <input type="number" name="coordenadorID" id="coordenadorID" required>
            <label for="dataInicio">Data Início:</label>
            <input type="date" name="dataInicio" id="dataInicio" required>
            <label for="dataFim">Data Fim:</label>
            <input type="date" name="dataFim" id="dataFim" required>
            <label for="cursoID">ID Curso:</label>
            <input type="number" name="cursoID" id="cursoID" required>
            <button type="submit" class="btn btn-success">Adicionar</button>
        </form>
    </div>
</body>
</html>



<?php

include "footer.php";

?>