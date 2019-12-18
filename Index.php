<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AgendaBBDD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>


<div class="w-100 m-0">
		<div class="col-lg-12">
			<h1 class='d-flex justify-content-center align-items-center'>Agenda</h1>
			<form action="#" method="post">
				<table class='table table-responsive d-flex justify-content-center align-items-center'>
					<tr>
						<td><label for="name">Nombre </label></td>
						<td><input type='text' name='name' class='form-control' id="name" /></td>
					</tr>
					<tr>
						<td><label for='newName'>Selecciona un nuevo nombre </label></td>
						<td><input type='text' name='newName' class='form-control' id='newName' /></td>
					</tr>
					<tr>
						<td><label for="phone">Numero de telefono</label></td>
						<td><input type="tel" name="phone" class='form-control' id="phone"></td>
					</tr>
					<tr>
						<td>
                        <div  class=' d-flex justify-content-around'>
							<input type='submit' value='Save' name='save' class='btn btn-primary ' />
							<input type='submit' value='Delete' name="delete" class='btn btn-danger ' />
                        </div>

						</td>
                        <td>
                        <div  class=' d-flex justify-content-around'>
							<input type='submit' value='Update' name="update" class='btn btn-secondary' />
							<input type='submit' value='Show' name="show" class='btn btn-success' />
                            </div>
						</td>
					</tr>
				</table>
			</form>
<?php
    require_once "./config/config.php";
    require_once "./db/AgendaPDO.php";

    $DB = new Database();
    $diary = new AgendaPDO($DB->getConnection());

    if (isset($_POST['show']) && $_POST['show'] == 'Show'){
        $diary->showAllResults();
    }
    
    if (isset($_POST['delete']) && $_POST['delete'] == 'Delete'){
        $diary->deleteData($_POST['phone']);
    }
    
    if (isset($_POST['save']) && $_POST['save'] == 'Save'){
        $diary->insertData($_POST['name'], $_POST['phone']);
    }
    
    if (isset($_POST['update']) && $_POST['update'] == 'Update'){
        $diary->updateData($_POST['name'],$_POST['newName']);
    }
   
    
?>   
    
</body>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</html>