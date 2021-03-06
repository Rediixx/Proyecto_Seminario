<?php
    include_once 'header.php'
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/add.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script>
        $(document).ready(function(){
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();
            
            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function(){
                if(this.checked){
                    checkbox.each(function(){
                        this.checked = true;                        
                    });
                } else{
                    checkbox.each(function(){
                        this.checked = false;                        
                    });
                } 
            });
            checkbox.click(function(){
                if(!this.checked){
                    $("#selectAll").prop("checked", false);
                }
            });
        });
        </script>
        <script>
            (function()
                {
                if( window.localStorage )
                {
                    if( !localStorage.getItem('firstLoad') )
                    {
                    localStorage['firstLoad'] = true;
                    window.location.reload();
                    }  
                    else
                    localStorage.removeItem('firstLoad');
                }
                })();
        </script>
    </head>

    <body>
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Lista Actividades <b>En Curso</b></h2>
                            </div>
                            <div class="col-sm-6">
                                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar Actividad</span></a>
                                <a href=trash.php class="btn btn-danger" style= color:black;><i class="material-icons">&#xE872;</i><span>Eliminados</span></a>
                                <a href=completed.php class="btn btn-warning" style= color:black;><i class="material-icons">&#xE5CA;</i><span>Finalizados</span></a>			
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Estatus</th>
                                <th>Horas Estimadas</th>
                                <th>Descripcion</th>
                                <th>Fecha Limite</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            require_once 'includes/dbh.inc.php';

                            $sql = "SELECT * FROM bugs";
                            $result = $conn->query($sql);

                            if (!$result) {
                                die("Invalid query : " . $conn->error);
                            }

                            while ($row = $result->fetch_assoc()) {
                                if ($_SESSION["username"] == "admin") {
                                    echo 
                                        "<tr>
                                            <td style='display:none;''>" . $row["id"] . "</td>
                                            <td>" . $row["owner"] . "</td>
                                            <td>
                                                <div class='progress' style='height: 5px;'>
                                                    <div class='progress-bar' role='progressbar' style='width: $row[status]%;' aria-valuenow='$row[status]' aria-valuemin='0' aria-valuemax='100'></div>
                                                </div>
                                            </td>
                                            <td>" . ceil($row["estimatedHours"]/3600) . "</td>
                                            <td>" . $row["description"] . "</td>
                                            <td>" . $row["date"] . "</td>
                                            <td>
                                                <a href='pomodoro.php?id=$row[id]' class='info'><i class='material-icons' data-toggle='tooltip' title='Iniciar pomodoro'>&#xE037;</i></a>
                                                <a href='#editEmployeeModal' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                                                <a href='includes/delete.inc.php?id=$row[id]' class='delete'><i class='material-icons' data-toggle='tooltip' title='Eliminar'>&#xE872;</i></a>
                                            </td>
                                        </tr>";
                                } else {
                                    if ($row["owner"] == $_SESSION["username"]) {
                                        echo 
                                        "<tr>
                                            <td style='display:none;''>" . $row["id"] . "</td>
                                            <td>" . $row["owner"] . "</td>
                                            <td>
                                                <div class='progress' style='height: 5px;'>
                                                    <div class='progress-bar' role='progressbar' style='width: $row[status]%;' aria-valuenow='$row[status]' aria-valuemin='0' aria-valuemax='100'></div>
                                                </div>
                                            </td>
                                            <td>" . ceil($row["estimatedHours"]/3600) . "</td>
                                            <td>" . $row["description"] . "</td>
                                            <td>" . $row["date"] . "</td>
                                            <td>
                                                <a href='pomodoro.php?id=$row[id]' class='info'><i class='material-icons' data-toggle='tooltip' title='Iniciar pomodoro'>&#xE037;</i></a>
                                                <a href='#editEmployeeModal' class='edit editbtn' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                                                <a href='includes/delete.inc.php?id=$row[id]' class='delete'><i class='material-icons' data-toggle='tooltip' title='Eliminar'>&#xE872;</i></a>
                                            </td>
                                        </tr>";
                                    }
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>        
        </div>
        <!-- Add Modal HTML -->
        <div id="addEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="includes/add.inc.php" method="post">
                        <div class="modal-header">						
                            <h4 class="modal-title">Agregar Actividad</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">					
                            <div class="form-group">
                                <label>Usuario</label>
                                <input type="text" value="<?php echo $_SESSION["username"]; ?>" name="owner" class="form-control" required readonly>
                            </div>
                            <div class="form-group">
                                <label>Horas Estimadas</label>
                                <input type="number" name="estimatedHours" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Descripcion</label>
                                <textarea class="form-control" name="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>					
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" name="submit" class="btn btn-success" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Modal HTML -->
        <script>
            $(document).ready(function () {
                $('.editbtn').on('click', function() {
                    $('#editEmployeeModal').modal('show');

                        $tr = $(this).closest('tr');

                        var data = $tr.children("td").map(function () {
                            return $(this).text();
                        }).get();

                        $('#update_id').val(data[0]);
                        $('#estimatedHours').val(data[3]);
                        $('#description').val(data[4]);
                        $('#date').val(data[5]);
                });
            });
        </script>
        <div id="editEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="includes/update.inc.php" method="post">
                        <div class="modal-header">						
                            <h4 class="modal-title">Editar Actividad</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="modal-body">					
                            <div class="form-group">
                                <label>Usuario</label>
                                <input type="text" value="<?php echo $_SESSION["username"]; ?>" name="owner" id="owner" class="form-control" required readonly>
                            </div>
                            <div class="form-group">
                                <label>Horas Estimadas</label>
                                <input type="number" name="estimatedHours" id="estimatedHours" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Descripcion</label>
                                <textarea class="form-control" name="description" id="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Fecha</label>
                                <input type="date" name="date" id="date" class="form-control" required>
                            </div>					
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" name="submit" class="btn btn-info" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete Modal HTML -->
        <div id="deleteEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="includes/delete.inc.php" method="post">
                        <div class="modal-header">						
                            <h4 class="modal-title">Eliminar Actividad</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">					
                            <p>Esta seguro que desea eliminar esta actividad?</p>
                            <p class="text-warning"><small>Esta accion no puede ser revertida.</small></p>
                        </div>
                        <div class="modal-footer">       
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
                            <input type="submit" name="delete" class="btn btn-danger" value="Eliminar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>