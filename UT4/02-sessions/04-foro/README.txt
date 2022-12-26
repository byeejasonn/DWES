-- PROYECTO WEB JASON LONDOÑO --

- AUDIO
El audio esta implementado en la página principal pero a veces no se carga al inciar la página de primeras, entonces para que suene puedes cambiar de página y volver.

-FORMULARIOS
La pseudo-clase :invalid tiene estilos pero no se aplican ya que los campos de correo por ejemplo son type text para poner un patrón y la pseudo-clase solo afecta cuando no sigue patrones de html5 como el que tiene el campo mail por defecto del @.

Para solucionar eso, he hecho que el formulario no se pueda enviar hasta que los datos required esten completos ocultando el botón si el formulario es invalido.