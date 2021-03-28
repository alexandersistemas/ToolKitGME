<?php
require 'header.php';
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <form name="formularioBA" id="formularioBA" method="POST">
                      <fieldset>
                        <legend>Busqueda avanzada</legend>
                      
                      <table id="tabla1">
                        <tr>
                          <th>Categorias</th>
                          <th></th>
                          <th>Filtros</th>
                          <th></th>
                        </tr>
                        <tr>                      
                          <td width="40%">
                            <br>                           
                            <ul style="list-style: none;" id="categoriasls">
                          
                            </ul>
                          <td> </td>
                          </td>
                          <td width="40%">
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                               <table id="tblfl">
                                <tr>                                
                                  <td></td>
                                </tr>
                               </table>                              
                            </div> 
                          </td>
                        </tr>               
                      </table>
                      </fieldset>                       
                    </form>
                    <div class="form-group" align="center">
                            <h1 class="box-title"><button class="btn btn-primary"  id="btnBuscar" ><i class="fa fa-search"></i> Buscar(avanzado)</button></h1>
                    </div>
                    <br>                    
                    <div class="panel-body table-responsive" id="listadoregistros">
                      <label>Opciones de exportación:</label>
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            
                            <th>Nombre del Archivo</th>
                            <th>Descripción</th>
                        
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            
                            <th>Nombre del Archivo</th>
                            <th>Descripción</th>
                           
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre:</label>
                            <input type="hidden" name="idArchivoTK" id="idArchivoTK">
                            <input type="text" class="form-control" name="nombreArchivoTK" id="nombreArchivoTK" maxlength="50" placeholder="Nombre" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripción:</label>
                            <input type="text" class="form-control" name="descripcionArchivoTK" id="descripcionArchivoTK" maxlength="256" placeholder="Descripción">
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
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
<script type="text/javascript" src="scripts/consultar.js"></script>