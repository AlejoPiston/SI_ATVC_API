id_tecnico(2).
id_tecnico(3).
id_tecnico(4).
id_tecnico(5).
id_tecnico(6).
fallo(alto).
num_ot(2,2).
num_ot(3,1).
num_ot(4,1).
num_ot(5,1).
num_ot(6,1).
meses_trabajo(2,3).
meses_trabajo(3,3).
meses_trabajo(4,2).
meses_trabajo(5,3).
meses_trabajo(6,3).
distancia(2,pendiente).
distancia(3,pendiente).
distancia(4,pendiente).
distancia(5,pendiente).
distancia(6,pendiente).
tiempo_ots(2,60).
tiempo_ots(3,80).
tiempo_ots(4,60).
tiempo_ots(5,60).
tiempo_ots(6,80).
carga_trabajo_ninguna(X) :- num_ot(X,Y), Y = 0.
carga_trabajo_leve(X) :- num_ot(X,Y), Y > 0, Y =< 2.
carga_trabajo_normal(X) :- num_ot(X,Y), Y > 2, Y =< 5.
carga_trabajo_fuerte(X) :- num_ot(X,Y), Y > 5, Y =< 20.
experiencia_ninguna(X) :- meses_trabajo(X,Y),  Y > 0, Y =< 2.
experiencia_junior(X) :- meses_trabajo(X,Y), Y > 2, Y =< 5.
experiencia_senior(X) :- meses_trabajo(X,Y), Y > 5, Y =< 8.
experiencia_master(X) :- meses_trabajo(X,Y), Y > 8, Y =< 11.
experiencia_profesional(X) :- meses_trabajo(X,Y), Y > 11.
distancia_muycorta(X) :- distancia(X,Y), Y >= 0, Y =< 2.
distancia_corta(X) :- distancia(X,Y), Y > 2, Y =< 10.
distancia_mediana(X) :- distancia(X,Y), Y > 10, Y =< 20.
distancia_larga(X) :- distancia(X,Y), Y > 20, Y =< 35.
distancia_muylarga(X) :- distancia(X,Y), Y > 35.
distancia_pendiente(X) :- distancia(X,Y), Y = pendiente.
tiempo_ots_ninguno(X) :- tiempo_ots(X,Y), Y = 0.
tiempo_ots_muycorto(X) :- tiempo_ots(X,Y), Y > 0, Y =< 30.
tiempo_ots_corto(X) :- tiempo_ots(X,Y), Y > 30, Y =< 60.
tiempo_ots_medio(X) :- tiempo_ots(X,Y), Y > 60, Y =< 180.
tiempo_ots_largo(X) :- tiempo_ots(X,Y), Y > 180, Y =< 300.
tiempo_ots_muylargo(X) :- tiempo_ots(X,Y), Y > 300.