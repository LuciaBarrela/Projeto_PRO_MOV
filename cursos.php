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
        <br><br><h1>Cursos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Programa</th>
                    <th>Nome do Curso</th>
                    <th>Horas Totais</th>
                    <th>Número de Horas FPCT</th>
                    <th>ID Laboratório</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Placeholder data for demonstration purposes -->
                <tr>
                    <td>1</td>
                    <td>Program A</td>
                    <td>Course A</td>
                    <td>120</td>
                    <td>40</td>
                    <td>1</td>
                    <td>
                        <a href="edit_curso.php?id=1" class="btn btn-primary">Edit</a>
                        <a href="delete_curso.php?id=1" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Program B</td>
                    <td>Course B</td>
                    <td>90</td>
                    <td>30</td>
                    <td>2</td>
                    <td>
                        <a href="edit_curso.php?id=2" class="btn btn-primary">Edit</a>
                        <a href="delete_curso.php?id=2" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>

        <!-- Form to add a new course -->
        <br><br><h2>Adicionar novo curso</h2>
        <form action="add_curso.php" method="POST">
            <label for="program">Programa:</label>
            <input type="text" name="program" id="program" required>
            <label for="courseName">Nome do Curso:</label>
            <input type="text" name="courseName" id="courseName" required>
            <label for="totalHours">Horas Totais:</label>
            <input type="number" name="totalHours" id="totalHours" required><br>
            <label for="fpctHours">Número de Horas FPCT:</label>
            <input type="number" name="fpctHours" id="fpctHours" required>
            <label for="labID">ID Laboratorio:</label>
            <input type="number" name="labID" id="labID" required>
            <button type="submit" class="btn btn-success">Adicionar</button>
        </form>
    </div>
</body>
</html>

<?php

include "footer.php";

?>