# proyectofinal
<!-- DIVISIÓN DE TAREAS. TODAS LAS ACTUALIZACIONES/CAMBIOS/DEBBUGS DE LAS ÁREAS SE SUBIRÁN AL REPOSITORIO
https://github.com/Luisx97/proyectofinal, RESPETANDO LAS RAMAS (BRACHS) DEL EQUIPO Y MAIN.

LAS ACTIVIDADES DE CADA ELEMENTO PUEDE AUMENTAR CON LA MARCHA DEL PROYECTO, MÁS SIN EMBARGO, NO PUEDEN 
SER ELIMINADAS:(EN CASO DE QUE UN ELEMENTO DEL EQUIPO NO ESTE CONFORME CON LA ACTIVIDAD, PLATICARLO CON EL EQUIPO Y DAR EL PORQUE DE LA SITUACIÓN, PARA PODER DAR UNA SOLUCIÓN AL CONFLICTO).

CADA ELEMENTO ES RESPONSABLE DE MOVER LAS ACTIVIDADES CON NATURALEZA NO-REPETITIVAS CON TODAS LAS INSTRUCCIONES/DESCRIPCIONES (CREACIÓN DE ALTAS, TABLAS, FORMULARIOS, ETC) EN EL APARTADO DE "TAREAS FINALIZADAS" EN EL ARCHIVO README.md DE ESTE PROYECTO, EN DADO CASO QUE LA TAREA FINALIZADA CUENTE CON FALLOS O CONFLICTOS, EL ÁREA TESTING ES RESPONSABLE DE AVISAR AL REPRESENTANTE CORRESPONDIENTE Y CAMBIAR EL STATUS DE LA ACTIVIDAD (MOVERLO DE "TAREAS FINALIZADAS" > "TAREAS PENDIENTES") EN SU LUGAR RESPECTIVAMENTE.

HERRAMIENTAS ADICIONALES:
    https://ninjamock.com/s/GG8K2Jx (MOCKUP DADO POR EL MAESTRO)
    GIT_BASH.EXE (TERMINAL GITHUB)
        COMANDOS BÁSICOS PARA GIT BASH
            git checkout -b nombre_rama (CREACIÓN DE NUEVA RAMA)
            git checkout nombre_rama (CAMBIARTE DE RAMA)
            git checkout (VER MODIFICACIONES REALIZADAS EN LA RAMA)
            git branch (VER EN QUE RAMA ESTÁS, IGUALMENTE PUEDES SABER ESO ESTANDO EN GIT BASH ALADO DE TU DIRECCIÓN)
            git fetch origin (VER LAS RAMAS DE NUESTROS COMPAÑEROS, SI RAMA_1 FUE CREADA POR NATALIA Y YA LO
                SUBIO AL REPOSITORIO, MARIELA PUEDE MOVER/DESCARGAR/ACTUALIZAR RAMA_1 USANDO DICHO COMANDO)
            git add . (EMPAQUETAR LOS CAMBIOS REALIZADOS EN LA RAMA)
            git commit -m "<mensaje>" (PONERLE UN MENSAJE REFERENTE A LA RAMA, NO ES INDISPENSABLE PERO NOS AYUDA A ENTENDER
                LO QUE HACE DICHA RAMA)
            git push origin nombre_rama (SUBER LA RAMA AL REPOSITORIO)
            git pull origin nombre_rama (DESCARGAR LA RAMA NOMBRADA DEL REPOSITORIO, UNA BUENA PRACTICA ES DESCARGAR EL
                CONTENIDO DE LA RAMA EN LA QUE ESTAS POSICIONADA, EJEMPLO: SI VAS A DESCARGAR RAMA_4 POSICIONATE EN 
                RAMA_4 PARA NO GENERAR CONFLICTOS)
    -->    
<!--                                           TAREAS PENDIENTES                                                           -->
<!-- Nat [Back-End : Ciudadano]: 
         CREACIÓN DE TABLA CIUDADANO > para esta actividad se trabaja en extra > bd_pj.sql. La idea es hacer el código sql dentro del proyecto, para evitar incompatibilidades entre PC a PC exportando la base de datos en phpMyAdmin. Puedes basarte de las tablas creadas en dicho archivo bd_pj.php.

         LOGIN CIUDADANO > en la view ya creada "calificador.php" (entiendo que se tiene que registrar en una tabla ciudadano)

         CAPTCHA CIUDADANO > instalar el captcha en la view ya creada "calificador.php" (puedes apoyarte del captcha
         de administrador o preguntarle a Luis)

         PÁGINA TERMINOS Y CONDICIONES > crear una nueva view donde se redacte los terminos y condiciones
         que el ciudadano debe de aceptar déspues de haber ingresado.

Cristy [Front-End : Ciudadano]: "LAS ACTIVIDADES SERÁN DADAS POR NAT"

Luis [Back-End : Administrador]: 
         ALTA DE PREGUNTAS > conectar la base de datos bd_pj.sql con el formulario preguntas

         CREACIÓN DE TABLA RESPUESTAS > elaborar la tabla para poder almacenar los datos de las respuestas

         ALTA DE RESPUESTAS > conectar la base de datos bd_pj.sql con el formulario respuestas

Mariela [Front-End : Administrador]: 
         FORMULARIO DE PREGUNTAS > en la view ya creada "admin_catalogo_preg.php" elaborar el formulario que
         se dicta en el mockup del maestro.

         FORMULARIO DE RESPUESTAS > en la view ya creada "admin_respuestas.php" elaborar el formulario y extructura 
         que se dicta en el mockup del maestro.

Mariana [Testing : Administrador|Ciudadano]: 
         ORDENAR PROYECTO > algunos archivos/view están fuera de carpetas, entender la
         estructura del proyecto y agrupar los archivos en carpetas con el nombre referente a los archivos
         ejemplo CARPETA: admin_view
                                admin_login.php
                                admin_inicio.php
                                admin_respuestas.php
         es posible que los links o los includes se destruyan pero se necesita ajustar las direcciones, en caso 
         de que no se pueda, regresar el archivo donde estaba y mantener la carpeta creada en el proyecto.

         PRUEBAS COMPLETAS DE PROYECTOFINAL > revisar que los links esten correctos, modulos en funcionamiento, colores
         imagenes e imperfecciones en diseño|operativo.

		 SOLUCIÓN RÁPIDA > en dado caso que se identifique el error y la solución es rápida, procurar hacerlo.

		 ANOTAR LAS OBSERVACIONES > se necesita ser clara, señalar sección ejemp; dentro del "<body> </body>" linea 3 el 
		 diseño es confligtivo, informar dirección o el archivo, ejemp; nombre_archivo.php.

		 INFORMAR EN EL GRUPO Y EN PRIV: cada área tiene representantes, las áreas se dividen en 3
		 					Front-end: {Natalia, Luis}
							Back-end: {Cristy, Mariela}
                            Testing: {Mariana}
		 las observaciones recaudadas se les informará a los representantes del área, tanto en el grupo como en privado, 
         ejemp: error en alta_pregunta, no guarda los datos correctamente informar a Luis del error. -->

<!--                                        TAREAS FINALIZADAS
    Nat [Back-End : Ciudadano]:{

    }
    Cristy [Front-End : Ciudadano]:{

    }
    Luis [Back-End : Administrador]:{

    }
    Mariela [Front-End : Administrador]:{

    }
    Mariana [Testing : Administrador|Ciudadano]:{

    } -->

    <!-- Instrucciones que necesita el proyecto, dividido en modulos (cliente/admin) 
    
    mockops, documentos, colores
    -->