<div class="content-wrapper" style="min-height: 717px;">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Administrar Partidas</h1>

                </div>



            </div>

        </div><!-- /.container-fluid -->

    </section>



    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-12">

                    <!-- Default box -->
                    <div class="card card-info card-outline">

                        <div class="card-header">
                            <button type="button" class="btn btn-success crear-partida" data-toggle="modal" data-target="#modal-crear-partidas">
                                crear nueva partida
                            </button><br>
                        </div><br>
                        <!-- /.card-header -->

                        <div class="card-body">

                            <table class="table table-bordered table-striped dt-responsive tablaPartidas" width="100%">

                                <thead>

                                    <tr>

                                        <th style="width:10px">#</th>
                                        <th>Nombre</th>
                                        <th>Fecha de nacimiento</th>
                                        <th>Grado de estudio</th>
                                        <th>seccion</th>
                                        <th>N. Madre</th>
                                        <th>N. Padre</th>
                                        <th>Estado</th>
                                        <th>acciones</th>



                                    </tr>

                                </thead>

                                <tbody>

                                    <?php  ?>
                                    <?php
                                    foreach ($partidas as $key => $value) {
                                        $item = "id";
                                        $valor = $value["nombre"];
                                        $partidas = ctrPartidas::ctrMostrarPartidas($item, $valor);
                                    ?>
                                        <tr>
                                            <td><?= ($key + 1)  ?></td>
                                            <td><?= $value["nombre"]  ?></td>
                                            <td><?= $value["fecha"]  ?></td>
                                            <td><?= $value["grado"]  ?></td>
                                            <td><?= $value["seccion"]  ?></td>
                                            <td><?= $value["madre"]  ?></td>
                                            <td><?= $value["padre"]  ?></td>
                                            <td><label style="background:<?=$value["color"]?>; padding: 6px;border-radius: 5px;" ><?=$value["estado"]?></label></td>
                                            <td>
                                                <div class='btn-group'>
                                                    <button class="btn btn-warning btn-sm btnEditarPartida" data-toggle="modal" idPartida="<?php echo $value["id"]  ?>" data-target="#modal-editar-partida">
                                                        <i class="fas fa-pencil-alt text-white"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm eliminarPartida" idPartidaE="<?= $value["id"]  ?>">
                                                        <i class=" fas fa-trash-alt text-white"></i>
                                                    </button>
                                                </div>
                                              </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>


<!--=====================================
Modal Crear partidas
======================================-->
<div class="modal modal-default fade" id="modal-crear-partidas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Agregar nueva partida</h4>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nombre" placeholder="nombre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input id="calendar" type="date" class="form-control" name="fecha" placeholder="Fecha de nacimiento" data-date-format="YYYY-MM-DD">
                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <select class="form-control" name="grado" required>

                    <?php
                   
                    $partidas = ctrPartidas::ctrMostrarGrados($item, $valor);
                    foreach( $partidas as  $partida){
                        
                    ?>
                    <option value="<?php echo $partida["id"] ?>"><?php echo $partida["nombre"] ?></option>
                    <?php
                    }
                    ?>

                    </select>
                </div>
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <select class="form-control" name="seccion" required>

                    <?php
                   
                    $partidas = ctrPartidas::ctrMostrarSecciones($item, $valor);
                    foreach( $partidas as  $partida){
                        
                    ?>
                    <option value="<?php echo $partida["id"] ?>"><?php echo $partida["nombre"] ?></option>
                    <?php
                    }
                    ?>

                    </select>
                </div>
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="madre" placeholder="Nombre de la madre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="padre" placeholder="Nombre del padre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">guardar</button>
                </div>
                <?php
                $guardarpartidas = new ctrPartidas();
                $guardarpartidas->ctrGuardarPartidas();
                ?>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!--=====================================
Modal editar partidas
======================================-->
<div class="modal modal-default fade" id="modal-editar-partida">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">editar partida</h4>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="hidden" name="partida_idE">
                    <input type="text" class="form-control" name="nombreE" placeholder="nombre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input id="calendar" type="date" class="form-control" name="fechaE" placeholder="Fecha de nacimiento" data-date-format="YYYY-MM-DD">
                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <select class="form-control" name="gradoE" required>

                    <?php
                   
                    $partidas = ctrPartidas::ctrMostrarGrados($item, $valor);
                    foreach( $partidas as  $partida){
                        
                    ?>
                    <option value="<?php echo $partida["id"] ?>"><?php echo $partida["nombre"] ?></option>
                    <?php
                    }
                    ?>

                    </select>
                </div>
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <select class="form-control" name="seccionE" required>

                    <?php
                   
                    $partidas = ctrPartidas::ctrMostrarSecciones($item, $valor);
                    foreach( $partidas as  $partida){
                        
                    ?>
                    <option value="<?php echo $partida["id"] ?>"><?php echo $partida["nombre"] ?></option>
                    <?php
                    }
                    ?>

                    </select>
                </div>
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="madreE" placeholder="Nombre de la madre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="padreE" placeholder="Nombre del padre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
              
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary">guardar</button>
                </div>
                <?php
                $editarpartidas = new ctrPartidas();
                $editarpartidas->ctrGuardarPartidas();
                ?>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>