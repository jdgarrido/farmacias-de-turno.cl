Farmacias de turno
=====================

Este script despliega los datos diarios de las farmacias de turno por comuna entregados por el Ministerio de Salud a través Portal de Datos Públicos del Estado.
El Min de Salud cuenta con una implementación de las farmaciás de turno, el cual lo puedes encontrar en http://www.minsal.gob.cl/portal/url/page/minsalcl/g_varios/farmacias_turno/farmacias.html


==Cómo funciona?
Se utiliza la clase PHPExcel para leer las hojas de cálculo que proporciona el Ministerio de Salud, finalizado el proceso, la herramienta entregará solo las filas que correspondan a la fecha en que se visualiza la información.

==Cómo ejecutarlo en mi máquina local?
*Para que esto funcione es necesario descargar PHPExcel y agregar la clase dentro de la carpeta /assets/classes/
*Además es necesario descargar dentro de la carpeta /assets/docs/ las planillas de cálculo que se encuentran en http://datos.gob.cl/datasets/ver/1547
*Si deseas cachear las páginas, te recomeniendo implementar un sistema de cache, como este http://www.tufuncion.com/cache-php
*Si tu servidor usa SuPHP, te recomiendo crear un php.ini en la raiz de tu sitio, definirlo en tu .htaccess y voilá

==Puedo mejorarla?
Claro que puedes!! hazlo!!

==Demo
Lo puedes ver en acción acá http://farmacias-de-turno.josegarrido.net/

==Problemas
Al leer los archivos, nos damos cuenta de que la estandarización que se tiene es muy pobre.
Algunos problemas
*El campo dirección, a veces viene con la comuna incluida, otras veces viene con el nombre del local/galpón/centro comercial en el que se encuentra.
*El valor "N°" dentro del campo Dirección no debiese existir, simplemente "nombre de la calle 123"
*3 Hojas de datos, de los cuales 2 no tienen nformación o contienen información duplicada, con 1 basta :)
*Los datos podrían ser entregados vía json u otro