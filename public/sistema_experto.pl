id_tecnico(3).
id_tecnico(4).
id_tecnico(5).
id_tecnico(6).
id_tecnico(7).
fallo(alto).
num_ot(3,1).
num_ot(4,1).
num_ot(5,1).
num_ot(6,1).
num_ot(7,1).
meses_trabajo(3,0).
meses_trabajo(4,0).
meses_trabajo(5,0).
meses_trabajo(6,0).
meses_trabajo(7,0).
distancia(3,-2).
distancia(4,-2).
distancia(5,-2).
distancia(6,-2).
distancia(7,-2).
tiempo_ots(3,60).
tiempo_ots(4,80).
tiempo_ots(5,60).
tiempo_ots(6,80).
tiempo_ots(7,80).
carga_trabajo_ninguna(X) :- num_ot(X,Y), Y = 0.
carga_trabajo_leve(X) :- num_ot(X,Y), Y > 0, Y =< 2.
carga_trabajo_normal(X) :- num_ot(X,Y), Y > 2, Y =< 5.
carga_trabajo_fuerte(X) :- num_ot(X,Y), Y > 5, Y =< 20.
experiencia_ninguna(X) :- meses_trabajo(X,Y),  Y >= 0, Y =< 2.
experiencia_junior(X) :- meses_trabajo(X,Y), Y > 2, Y =< 5.
experiencia_senior(X) :- meses_trabajo(X,Y), Y > 5, Y =< 8.
experiencia_master(X) :- meses_trabajo(X,Y), Y > 8, Y =< 11.
experiencia_profesional(X) :- meses_trabajo(X,Y), Y > 11.
distancia_ninguna(X) :- distancia(X,Y), Y = -1.
distancia_pendiente(X) :- distancia(X,Y), Y = -2.
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
optimo1(X):- carga_trabajo_ninguna(X),distancia_ninguna(X).
optimo2(X):- carga_trabajo_leve(X),
                                       (distancia_pendiente(X);distancia_muycorta(X);distancia_corta(X)),
                                       (tiempo_ots_muycorto(X);tiempo_ots_corto(X)).
optimo3(X):- carga_trabajo_leve(X),
                                       (distancia_pendiente(X);distancia_muycorta(X);distancia_corta(X)),
                                       tiempo_ots_medio(X).
optimo4(X):- carga_trabajo_leve(X),
                                       (distancia_mediana(X);distancia_larga(X);distancia_muylarga(X)),
                                       (tiempo_ots_muycorto(X);tiempo_ots_corto(X)).
optimo5(X):- carga_trabajo_leve(X),
                                       (distancia_mediana(X);distancia_larga(X);distancia_muylarga(X)),
                                       tiempo_ots_medio(X).
optimo6(X):- carga_trabajo_normal(X),
                                       (distancia_pendiente(X);distancia_muycorta(X);distancia_corta(X)),
                                       tiempo_ots_medio(X).
optimo7(X):- carga_trabajo_normal(X),
                                       (distancia_pendiente(X);distancia_muycorta(X);distancia_corta(X)),
                                       (tiempo_ots_largo(X);tiempo_ots_muylargo(X)).
optimo8(X):- carga_trabajo_normal(X),
                                       (distancia_mediana(X);distancia_larga(X);distancia_muylarga(X)),
                                       tiempo_ots_medio(X).
optimo9(X):- carga_trabajo_normal(X),
                                       (distancia_mediana(X);distancia_larga(X);distancia_muylarga(X)),
                                       (tiempo_ots_largo(X);tiempo_ots_muylargo(X)).
optimo10(X):- carga_trabajo_fuerte(X),
                                       (distancia_pendiente(X);distancia_muycorta(X);distancia_corta(X)),
                                       tiempo_ots_medio(X).
optimo11(X):- carga_trabajo_fuerte(X),
                                       (distancia_pendiente(X);distancia_muycorta(X);distancia_corta(X)),
                                       (tiempo_ots_largo(X);tiempo_ots_muylargo(X)).
optimo12(X):- carga_trabajo_fuerte(X),
                                       (distancia_mediana(X);distancia_larga(X);distancia_muylarga(X)),
                                       tiempo_ots_medio(X).
optimo13(X):- carga_trabajo_fuerte(X),
                                       (distancia_mediana(X);distancia_larga(X);distancia_muylarga(X)),
                                       (tiempo_ots_largo(X);tiempo_ots_muylargo(X)).
escribeOptimos([]):- write("").
escribeOptimos([Primera|Personas]):- num_ot(Primera, NO),meses_trabajo(Primera, MT),distancia(Primera, D),tiempo_ots(Primera, TOTS),write(Primera),write(","),write(NO),write(","),write(MT),write(","),write(D),write(","),write(TOTS), nl,escribeOptimos(Personas).
consulta_1:- findall(X, optimo1(X), Personas),escribeOptimos(Personas).
consulta_2:- findall(X, optimo2(X), Personas),escribeOptimos(Personas).
consulta_3:- findall(X, optimo3(X), Personas),escribeOptimos(Personas).
consulta_4:- findall(X, optimo4(X), Personas),escribeOptimos(Personas).
consulta_5:- findall(X, optimo5(X), Personas),escribeOptimos(Personas).
consulta_6:- findall(X, optimo6(X), Personas),escribeOptimos(Personas).
consulta_7:- findall(X, optimo7(X), Personas),escribeOptimos(Personas).
consulta_8:- findall(X, optimo8(X), Personas),escribeOptimos(Personas).
consulta_9:- findall(X, optimo9(X), Personas),escribeOptimos(Personas).
consulta_10:- findall(X, optimo10(X), Personas),escribeOptimos(Personas).
consulta_11:- findall(X, optimo11(X), Personas),escribeOptimos(Personas).
consulta_12:- findall(X, optimo12(X), Personas),escribeOptimos(Personas).
consulta_13:- findall(X, optimo13(X), Personas),escribeOptimos(Personas).
