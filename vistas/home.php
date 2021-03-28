<?php
require 'header.php';
?>
<link rel="stylesheet" type="text/css" href="../public/css/StylosHomeButtons.css">

<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">        
        <!-- Main content -->
        <section class="content" style="background-color: #C3C3C9">
          
        	<table style="width:100%" id="tblBuscador">
            <tr>
              <td align="right">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <img src="../public/img/botonfiltro.png"></a>                
              </td>              
                <td align="left" style="background-color: #C3C3C9">
                  
                 <div class="form-group fg--search">                 
                   <input type="text" id="typeahead" name="typeahead" size="16" class="round" placeholder="Buscar...">
                   <button type="submit"><i class="fa fa-search"></i></button>
                 </div>

                 <div id="display"></div>
              </td> 
            </tr>
          </table>
          <br/>
        <!--   <table border="0">
            <tr>
              <td>Víctor Martín</td>
              <td>+34 695 68 78 90</td>
              <td>Víctor Martín</td>
              <td>+34 695 68 78 90</td>
            </tr>
            <tr>
              <td colspan="4" align="center">
                <table border="0">
                  <tr>
                    <td>Víctor Martín</td>
                    <td>+34 695 68 78 90</td>
                    <td>Víctor Martín</td>
                  </tr>
                </table>
              </td>              
            </tr>            
            </table> -->

          <table style="width:100%">
            <tr>
              <td>
                <img src="../public/img/arandela.png"width="100%" height="50">
              </td>
            </tr>
            <tr>
              <td>                
                <button type="button" class="butoncabecera">Diagnóstico</button>
                <button type="button" class="butoncabecera">Formular</button>
                <button type="button" class="butoncabecera">Experimentar</button>
                <button type="button" class="butoncabecera">Implementar</button>
                <button type="button" class="butoncabecera">Hacer Seguimiento</button>
                <button type="button" class="butoncabecera">Evaluar</button>
              </td>
            </tr>
          </table>
          <br/>

           <table style="width:100%" id="tblRecursos" border="0">
  
		       </table>
      	</section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/home.js"></script>
