

/*Tablas maestras*/


/*categoria*/
INSERT INTO categoria (nombreCategoria, estadoCategoria)
VALUES ('Descubrir Oportunidades', 1);

INSERT INTO categoria (nombreCategoria, estadoCategoria)
VALUES ('Generar Ideas', 1);

INSERT INTO categoria (nombreCategoria, estadoCategoria)
VALUES ('Desarrollar y aprobar', 1);

INSERT INTO categoria (nombreCategoria, estadoCategoria)
VALUES ('Planear la acción(Estratégia)', 1);

INSERT INTO categoria (nombreCategoria, estadoCategoria)
VALUES ('Escalar y difundir', 1);


/*filtros*/
INSERT INTO filtro (nombreFiltro, estadoFiltro)
VALUES ('Nivel de dificultad', 1);

INSERT INTO filtro (nombreFiltro, estadoFiltro)
VALUES ('Tipo de desafio organizacional', 1);

INSERT INTO filtro (nombreFiltro, estadoFiltro)
VALUES ('Enfoque', 1);

INSERT INTO filtro (nombreFiltro, estadoFiltro)
VALUES ('Usado en proyectos públicos', 1);

INSERT INTO filtro (nombreFiltro, estadoFiltro)
VALUES ('Adaptabilidad', 1);



/*subfiltros */

INSERT INTO subfiltro (idFiltro, nombreSubfiltro, estadoSubfiltro)
VALUES (1, 'Inexperto',1);

INSERT INTO subfiltro (idFiltro, nombreSubfiltro, estadoSubfiltro)
VALUES (1, 'Competente',1);

INSERT INTO subfiltro (idFiltro, nombreSubfiltro, estadoSubfiltro)
VALUES (1, 'Domina el tema',1);



INSERT INTO subfiltro (idFiltro, nombreSubfiltro, estadoSubfiltro)
VALUES (2, 'Externos',1);

INSERT INTO subfiltro (idFiltro, nombreSubfiltro, estadoSubfiltro)
VALUES (2, 'Internos',1);



INSERT INTO subfiltro (idFiltro, nombreSubfiltro, estadoSubfiltro)
VALUES (3, 'Centrado en las personas',1);

INSERT INTO subfiltro (idFiltro, nombreSubfiltro, estadoSubfiltro)
VALUES (3, 'Cocreación',1);


INSERT INTO subfiltro (idFiltro, nombreSubfiltro, estadoSubfiltro)
VALUES (5, 'Acceso intermitente a internet',1);

INSERT INTO subfiltro (idFiltro, nombreSubfiltro, estadoSubfiltro)
VALUES (5, 'Baja educación digital',1);

INSERT INTO subfiltro (idFiltro, nombreSubfiltro, estadoSubfiltro)
VALUES (5, 'Recursos humanos limitados',1);

INSERT INTO subfiltro (idFiltro, nombreSubfiltro, estadoSubfiltro)
VALUES (5, 'Insumo de papelería limitados',1);



/*archivoTk*/

INSERT INTO archivotk (nombreArchivoTK, descripcionArchivoTK, rutaArchivoTK)
VALUES ('Archivo prueba 1','Descripcion', '../files/');

INSERT INTO archivotk (nombreArchivoTK, descripcionArchivoTK, rutaArchivoTK)
VALUES ('Archivo prueba 2','Descripcion', '../files/');

INSERT INTO archivotk (nombreArchivoTK, descripcionArchivoTK, rutaArchivoTK)
VALUES ('Archivo prueba 3','Descripcion', '../files/');



