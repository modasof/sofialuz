<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Recuperacion De Contraseña</title>
  </head>
  <body>
    
                
                <img class="img-fluid mx-auto d-block" align="center" src="logo.png" style="width: 320px; height: 150px;">
            

<div class="card w-50 mx-auto bg-info" align="center" style="box-shadow: 4px 4px 4px 4px rgba(0, 0, 0, 0.3);">
  <h5 class="card-header">Cambia tu clave de Acceso</h5>
  <div class="card-body">
    <form class="form-horizontal" action="restaurar.php" method="post">
                        <fieldset>
                          <label class="block clearfix">
                            <span class="block input-icon input-icon-right">
                              <input type="password" name="pass"  class="form-control" placeholder="Nueva clave" />
                               <input type="hidden" name="id_usuario"  class="form-control" value="<?php echo $_GET['fp_code'];?>" />
                              <i class="ace-icon fa fa-user"></i>
                            </span>
                          </label>


                          <div class="space"></div>

                          <div class="clearfix">
                            <!-- <label class="inline">
                              <input type="checkbox" name="alargar_session" class="ace" />
                              <span class="lbl"> Recuerdame</span>
                            </label> -->

                            <button type="submit" class="width-35 pull-right btn btn-sm btn-primary mt-3">
                              <i class="ace-icon fa fa-key"></i>
                              <span class="bigger-110">Cambiar Clave</span>
                            </button>
                          </div>

                          <div class="space-4"></div>
                        </fieldset>
                      </form>
  </div>
</div>
              

                     
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>