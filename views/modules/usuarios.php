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
                <table class="table table-bordered table-striped dataTable dtr-inline">
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