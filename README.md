Farmacias de turno
=====================

Este script despliega los datos diarios de las farmacias de turno por comuna entregados por el Ministerio de Salud a través Portal de Datos Públicos del Estado.
El Min de Salud cuenta con una implementación de las farmaciás de turno, el cual lo puedes encontrar en http://www.minsal.gob.cl/portal/url/page/minsalcl/g_varios/farmacias_turno/farmacias.html


###Cómo funciona?

*Obtenemos la información del portal de datos del estado
*la procesamos, a un formato simple separado por comas (CSV)
*la desplegamos :)

###Cómo ejecutarlo en mi máquina local?

*Además es necesario descargar dentro de la carpeta /assets/csv/ las planillas de cálculo procesadas y guardadas en formato CSV que se encuentran en http://datos.gob.cl/datasets/ver/1547
*Si deseas cachear las páginas, te recomeniendo implementar un sistema de cache
*Si tu servidor usa SuPHP, te recomiendo crear un php.ini en la raiz de tu sitio, definirlo en tu .htaccess y voilá

###Puedo mejorarla?

Claro que puedes!! hazlo!!

###Demo

Lo puedes ver en acción <a href="http://farmacias-de-turno.josegarrido.net/">acá</a>

###Problemas

Al leer los archivos, nos damos cuenta de que la estandarización que se tiene es muy pobre.
Algunos problemas
*El campo dirección, a veces viene con la comuna incluida, otras veces viene con el nombre del local/galpón/centro comercial en el que se encuentra.
*El valor "N°" dentro del campo Dirección no debiese existir, simplemente "nombre de la calle 123"
*3 Hojas de datos, de los cuales 2 no tienen nformación o contienen información duplicada, con 1 basta :)
*Los datos podrían ser entregados vía json u otro

### Licencia

<a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.es_CL"><img alt="Licencia Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" /></a><br />Este obra está bajo una <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/deed.es_CL">Licencia Creative Commons Atribución-NoComercial-CompartirIgual 3.0 Unported</a>.