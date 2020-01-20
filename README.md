# resuelveBackEnd
Prueba BackEnd de Resuelve FC

Este es un repositorio de la prueba de para Back End de Donaldo Samaniego para Resuelve.

La prueba consiste en calcular el sueldo final de los jugadores de Resuelve FC en la cual se envia por JSON los datos.

La prueba de Resuelve FC se encuentra en la la siguiente dirección http://dsamaniego.mx/resuelve

Para hacer uso del API de calcula la nomina de Resuelve CF

1.- Para obtener la información calculada (GET)
ingresar a la direccion http://dsamaniego.mx/calcula
Éste enlace regresa la información calculada previamente en formato json.

Para calcular los salarios de los jugadores, hay que realizar un POST a la siguiente dirección, enviando un objeto en formato JSON con la siguiente estructura:
[  
   {  
      "nombre":"Juan Perez",
      "nivel":"C",
      "goles":10,
      "sueldo":50000,
      "bono":25000,
      "sueldo_completo":null,
      "equipo":"rojo"
   },
   {  
      "nombre":"EL Cuauh",
      "nivel":"Cuauh",
      "goles":30,
      "sueldo":100000,
      "bono":30000,
      "sueldo_completo":null,
      "equipo":"azul"
   },
   {  
      "nombre":"Cosme Fulanito",
      "nivel":"A",
      "goles":7,
      "sueldo":20000,
      "bono":10000,
      "sueldo_completo":null,
      "equipo":"azul"

   },
   {  
      "nombre":"El Rulo",
      "nivel":"B",
      "goles":9,
      "sueldo":30000,
      "bono":15000,
      "sueldo_completo":null,
      "equipo":"rojo"

   }
]

Una vez que se envía la información se calcula el sueldo completo para cada jugador, segun las especificaciones requeridas para resolver el problema.
