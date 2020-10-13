tecnico(alexander).
tecnico(stalin).

edad(stalin, 22).
edad(alexander, 23).
ubicacion(alexander, cerca).
ubicacion(stalin, lejos).
carga_trabajo(alexander, leve).
carga_trabajo(stalin, fuerte).

escribeUbicaciones([]) :- write('No hay mas información sobre ubicaciones.'), nl.
escribeUbicaciones([Primera|Tecnicos]) :-
 ubicacion(Primera, X), write(Primera), write(' está '), write(X), nl, escribeUbicaciones(Tecnicos).

main :-
 write('Ejemplo de Ubicaciones'), nl,
 findall(X, tecnico(X), Tecnicos),
 escribeUbicaciones(Tecnicos).
