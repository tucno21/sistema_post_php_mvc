<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administrar de Usuarios</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
                    Agregar Usuario
                </button>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped table-responsive dtr-inline tablas">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Foto</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Ultimo Login</th>
                            <th>Aciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <td>1</td>
                        <td>calor</td>
                        <td>admin</td>
                        <td><img src="views/dist/img/avatar.png" alt="avatar" class="img-thumbnail" width="40px"></td>
                        <td>administrador</td>
                        <td><button class="btn btn-success btn-xs">Activado</button></td>
                        <td>2021-12-11 12:05:32</td>
                        <td>
                            <div class="btn-group">
                                <bottom class="btn btn-warning"><i class="fa fa-edit"></i></bottom>
                                <bottom class="btn btn-danger"><i class="fa fa-times"></i></bottom>
                            </div>
                        </td>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                FOOTER
            </div>
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="post" action="" enctype="multipart/form-data">
                <div class="modal-header" style="background:#343a40; color:#fff">
                    <h5 class="modal-title">Agregar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color:#fff">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <!-- NOMBRE -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <spam class="input-group-text"><i class="fa fa-user"></i></spam>
                                </div>
                                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>
                            </div>
                        </div>
                        <!-- USUARIO -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <spam class="input-group-text"><i class="fa fa-key"></i></spam>
                                </div>
                                <input type="text" class="form-control input-lg" name="nuevoUsiario" placeholder="Ingresar Usuario" required>
                            </div>
                        </div>
                        <!-- contraseña -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <spam class="input-group-text"><i class="fa fa-lock"></i></spam>
                                </div>
                                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar Contraseña" required>
                            </div>
                        </div>
                        <!-- Perfil -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <spam class="input-group-text"><i class="fa fa-users"></i></spam>
                                </div>
                                <select class="form-control input-lg" name="nuevoPerfil">
                                    <option value="">Seleccione Perfil</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Especial">Especial</option>
                                    <option value="Vendedor">Vendedor</option>
                                </select>
                            </div>
                        </div>
                        <!-- foto -->
                        <div class="form-group">

                            <div class="border border-secondary">
                                <p CLASS="text-center">SUBIR FOTO</p>

                                <input type="file" class="form-control input-lg" name="nuevoFoto" id="nuevoFoto">
                                <p class=help-block>Peso máximo de 1mb</p>
                                <img src="views/dist/img/avatar.png" alt="avatar" class="img-thumbnail" width="70px">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>