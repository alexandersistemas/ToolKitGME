
<?php
require 'header.php';
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content" style="background-color: #C3C3C9">
            
            <div class="row">

              <div class="col-md-12">
                  <div class="box" style="background-color: #C3C3C9">


                    <div class="box-header with-border">
                          <h1 class="box-title">Cargar/Editar Recurso <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Que es?</th>
                            <th>Estado</th>
                            <th>Ver</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                         <!--  <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Que es?</th>
                            <th>Estado</th>
                            <th>ver</th>
                          </tfoot> -->
                        </table>
                    </div>
                    <div class="panel-body" style="height: 1500px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST" enctype="multipart/form-data">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre Recurso:</label>
                            <input type="hidden" name="idArchivoTK" id="idArchivoTK">
                            <input type="text" class="form-control" name="nombreArchivoTK" id="nombreArchivoTK" maxlength="50" placeholder="Nombre" required="required">
                          </div>
                         <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Autor Recurso:</label>
                            <textarea name="autorArchivoTK" id="autorArchivoTK" class="form-control" rows="4" cols="40" placeholder="Autor"></textarea> 
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Que es?:</label>
                            <textarea name="definicionArchivoTK" id="definicionArchivoTK" class="form-control" rows="4" cols="40" placeholder="Que es?"></textarea>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Para que sirve?:</label>
                            <textarea name="utilidadArchivoTK" id="utilidadArchivoTK" class="form-control" rows="4" cols="40" placeholder="Para que sirve?"></textarea>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Paso a paso:</label>
                            <textarea name="planArchivoTK" id="planArchivoTK" class="form-control" rows="4" cols="40" placeholder="Paso a paso"></textarea>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Adaptado?:</label>
                             <textarea name="adaptadoArchivoTK" id="adaptadoArchivoTK" class="form-control" rows="4" cols="40" placeholder="Adaptado?"></textarea>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Tipo Recurso:</label><br/>
                            <select name="tiporecursols" id="tiporecursols">

                            </select>
                          </div>
                          
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Categoria:</label>
                            <br>
                            <ul style="list-style: none;" id="categoriasls">

                            </ul>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Filtro:</label><br/>
                            <br>                            
                            <table id="tblfl">
                              <tr>                                
                                <td></td>
                              </tr>
                             </table>                              
                          </div>                        
                          <br/>
                          <div  class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Cargar Archivo:</label>
                            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="100000" /> -->
                            <input type="file" name="uploadedfile"  />
                          </div>
                           <div  class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Hashtags:</label>
                             <textarea name="hashtagsArchivoTK" id="hashtagsArchivoTK" class="form-control" rows="4" cols="40" maxlength="500" placeholder="Hashtags separados por comas (,)"></textarea>
                          </div>
                          <br/>
                          <br/>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <br/>
                            <br/>
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                            <br/>
                            <br/>
                    <!--         <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button> -->
                          </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/archivotk.js"></script>
