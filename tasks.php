<?php
    include_once 'header.php'
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tasks</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/tasks.css" rel="stylesheet" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    </head>

    <body>
        <!--For Page-->
        <div class="page">
            <!--Card-->
            <div class="card">
                <!--Card Header-->
                <div class="card-header">
                    <p> <i class="fa fa-bars"></i> <a href="#addEmployeeModal" data-toggle="modal"> <i class="fa fa-plus ml-4" aria-hidden="true"></i></a> <span class="float-right"> <span class="mr-4 navTask">Task</span> <span class="mr-4">Archive</span></span> </p>
                </div>
                <!--Card Body-->
                <div class="card-body">
                    <p class="heading1"> <span class="today">Today</span> <span class="float-right headingright">7h 15min</span> </p>
                    <p><i class="fa fa-calendar mr-2" aria-hidden="true"></i> <span class="task mt-4">Take kids to school</span> <span class="time ml-2">8:00-8:30AM</span> <span class="float-right">30min</span> </p>
                    <p><i class="	fa fa-circle-thin mr-2"></i> <span class="task">Process email</span> <i class="fa fa-thumb-tack ml-2" aria-hidden="true"></i> <span class="time ml-2">8:00-9:30AM</span><span class="float-right">1h</span> </p>
                    <p><i class="fa fa-calendar mr-2" aria-hidden="true"></i> <span class="task">Daily Stand-Up meeting</span> <span class="time ml-2">9:00-10:00AM</span> <span class="float-right">30min</span> </p>
                    <p><i class="	fa fa-circle-thin mr-2"></i><span class="task">Create new templates</span> <i class="fa fa-thumb-tack ml-2" aria-hidden="true"></i> <i class="fa fa-user ml-2"></i> <span class="time ml-2">10:00-11:45AM</span> <span class="float-right">1h 45min</span> </p>
                    <p><i class="fa fa-calendar mr-2" aria-hidden="true"></i> <span class="task">Lunch with Anna</span> <span class="time ml-2">12:00-12:30PM</span> <span class="float-right">30min</span> </p>
                    <p class="text-muted"><i class="fa fa-plus mr-1" aria-hidden="true"></i> Add Task for Today</p>
                    <p class="heading2"><span class="tomorrow">Tomorrow</span> <span class="float-right headingright">6h 30min</span> </p>
                    <p class="task2 mt-4"><i class="fa fa-calendar mr-2" aria-hidden="true"></i> <span class="task">Breakfast with the Marketing team</span> <span class="time ml-2">8:00-8:30AM</span> <span class="float-right">30min</span></p>
                </div>
            </div>
        </div>
        <!-- Edit Modal HTML -->
        <div id="addEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="includes/add.inc.php" method="post">
                        <div class="modal-header">						
                            <h4 class="modal-title">Agregar Bug</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">					
                            <div class="form-group">
                                <label>Owner</label>
                                <input type="text" name="owner" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="number" name="status" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>					
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" style="color: white;" data-dismiss="modal" value="Cancel">
                            <input type="submit" name="submit" class="btn btn-success" value="Add">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>