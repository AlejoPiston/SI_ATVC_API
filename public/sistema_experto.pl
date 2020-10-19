id_tecnico(2).
id_tecnico(3).
id_tecnico(4).
id_tecnico(5).
id_tecnico(6).
fallo(bajo).
num_ot(2,0).
num_ot(3,0).
num_ot(4,0).
num_ot(5,0).
num_ot(6,0).
meses_trabajo(2,0).
meses_trabajo(3,0).
meses_trabajo(4,0).
meses_trabajo(5,0).
meses_trabajo(6,0).
distancia(2,sin_ubicaciones).
distancia(3,sin_ubicaciones).
distancia(4,sin_ubicaciones).
distancia(5,sin_ubicaciones).
distancia(6,sin_ubicaciones).
tiempo_ots(2,0).
tiempo_ots(3,0).
tiempo_ots(4,0).
tiempo_ots(5,0).
tiempo_ots(6,0).
carga_trabajo_ninguna(X) :- num_ot(X,Y), Y = 0.
carga_trabajo_leve(X) :- num_ot(X,Y), Y > 0, Y =< 2.
carga_trabajo_normal(X) :- num_ot(X,Y), Y > 2, Y =< 5.
carga_trabajo_fuerte(X) :- num_ot(X,Y), Y > 5, Y =< 20.
experiencia_ninguna(X) :- meses_trabajo(X,Y),  Y > 0, Y =< 2.
experiencia_junior(X) :- meses_trabajo(X,Y), Y > 2, Y =< 5.
experiencia_senior(X) :- meses_trabajo(X,Y), Y > 5, Y =< 8.
experiencia_master(X) :- meses_trabajo(X,Y), Y > 8, Y =< 11.
experiencia_profesional(X) :- meses_trabajo(X,Y), Y > 11.
distancia_ninguna(X) :- distancia(X,Y), Y = sin_ubicaciones.
distancia_pendiente(X) :- distancia(X,Y), Y = pendiente.
distancia_muycorta(X) :- distancia(X,Y), Y >= 0, Y =< 2.
distancia_corta(X) :- distancia(X,Y), Y > 2, Y =< 10.
distancia_mediana(X) :- distancia(X,Y), Y > 10, Y =< 20.
distancia_larga(X) :- distancia(X,Y), Y > 20, Y =< 35.
distancia_muylarga(X) :- distancia(X,Y), Y > 35.
tiempo_ots_ninguno(X) :- tiempo_ots(X,Y), Y = 0.
tiempo_ots_muycorto(X) :- tiempo_ots(X,Y), Y > 0, Y =< 30.
tiempo_ots_corto(X) :- tiempo_ots(X,Y), Y > 30, Y =< 60.
tiempo_ots_medio(X) :- tiempo_ots(X,Y), Y > 60, Y =< 180.
tiempo_ots_largo(X) :- tiempo_ots(X,Y), Y > 180, Y =< 300.
tiempo_ots_muylargo(X) :- tiempo_ots(X,Y), Y > 300.
mas_optimo(X):- carga_trabajo_ninguna(X),
                                       (experiencia_profesional(X);experiencia_master(X);experiencia_senior(X);experiencia_junior(X);experiencia_ninguna(X)),
                                       distancia_ninguna(X),
                                       tiempo_ots_ninguno(X),
                                       (fallo(bajo);fallo(medio);fallo(alto);fallo(instalacion)).
optimo(X):- (carga_trabajo_ninguna(X); carga_trabajo_leve(X)),
                                       (experiencia_profesional(X);experiencia_master(X) ),
                                       (distancia_pendiente(X); distancia_muycorta(X)),
                                       (tiempo_ots_ninguno(X); tiempo_ots_muycorto(X)).
medianamente_optimo(X):- carga_trabajo_normal(X),
                                                    (distancia_corta(X); distancia_mediana(X)),
                                                    (tiempo_ots_corto(X); tiempo_ots_medio(X)).
menos_optimo(X):- carga_trabajo_fuerte(X),
                                             (distancia_muylarga(X);distancia_larga(X)),
                                             (tiempo_ots_largo(X);tiempo_ots_muylargo(X)).
