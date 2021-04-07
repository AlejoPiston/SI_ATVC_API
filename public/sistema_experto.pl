id_tecnico(14).
id_tecnico(15).
id_tecnico(16).
id_tecnico(17).
fallo(alto).
num_ot(14,2).
num_ot(15,0).
num_ot(16,0).
num_ot(17,1).
meses_trabajo(14,12).
meses_trabajo(15,23).
meses_trabajo(16,8).
meses_trabajo(17,55).
distancia(14,-2).
distancia(15,-2).
distancia(16,8736.86).
distancia(17,-2).
tiempo_ots(14,140).
tiempo_ots(15,0).
tiempo_ots(16,0).
tiempo_ots(17,80).
carga_trabajo_ninguna(X) :- num_ot(X,Y), Y = 0.
carga_trabajo_leve(X) :- num_ot(X,Y), Y > 0, Y =< 2.
carga_trabajo_normal(X) :- num_ot(X,Y), Y > 2, Y =< 5.
carga_trabajo_fuerte(X) :- num_ot(X,Y), Y > 5, Y =< 20.
carga_trabajo(X,ninguna) :- carga_trabajo_ninguna(X).
carga_trabajo(X,leve) :- carga_trabajo_leve(X).
carga_trabajo(X,normal) :- carga_trabajo_normal(X).
carga_trabajo(X,fuerte) :- carga_trabajo_fuerte(X).
experiencia_ninguna(X) :- meses_trabajo(X,Y),  Y >= 0, Y =< 2.
experiencia_junior(X) :- meses_trabajo(X,Y), Y > 2, Y =< 5.
experiencia_senior(X) :- meses_trabajo(X,Y), Y > 5, Y =< 8.
experiencia_master(X) :- meses_trabajo(X,Y), Y > 8, Y =< 11.
experiencia_profesional(X) :- meses_trabajo(X,Y), Y > 11.
experiencia(X,ninguna) :- experiencia_ninguna(X).
experiencia(X,junior) :- experiencia_junior(X).
experiencia(X,senior) :- experiencia_senior(X).
experiencia(X,master) :- experiencia_master(X).
experiencia(X,profesional) :- experiencia_profesional(X).
distancia_ninguna(X) :- distancia(X,Y), Y = -1.
distancia_pendiente(X) :- distancia(X,Y), Y = -2.
distancia_muycorta(X) :- distancia(X,Y), Y >= 0, Y =< 2.
distancia_corta(X) :- distancia(X,Y), Y > 2, Y =< 10.
distancia_mediana(X) :- distancia(X,Y), Y > 10, Y =< 20.
distancia_larga(X) :- distancia(X,Y), Y > 20, Y =< 35.
distancia_muylarga(X) :- distancia(X,Y), Y > 35.
distancia_estado(X,ninguna) :- distancia_ninguna(X).
distancia_estado(X,pendiente) :- distancia_pendiente(X).
distancia_estado(X,muy_corta) :- distancia_muycorta(X).
distancia_estado(X,corta) :- distancia_corta(X).
distancia_estado(X,mediana) :- distancia_mediana(X).
distancia_estado(X,larga) :- distancia_larga(X).
distancia_estado(X,muy_larga) :- distancia_muylarga(X).
tiempo_ots_ninguno(X) :- tiempo_ots(X,Y), Y = 0.
tiempo_ots_muycorto(X) :- tiempo_ots(X,Y), Y > 0, Y =< 30.
tiempo_ots_corto(X) :- tiempo_ots(X,Y), Y > 30, Y =< 60.
tiempo_ots_medio(X) :- tiempo_ots(X,Y), Y > 60, Y =< 180.
tiempo_ots_largo(X) :- tiempo_ots(X,Y), Y > 180, Y =< 300.
tiempo_ots_muylargo(X) :- tiempo_ots(X,Y), Y > 300.
tiempo_ots_estado(X,ninguno) :- tiempo_ots_ninguno(X).
tiempo_ots_estado(X,muy_corto) :- tiempo_ots_muycorto(X).
tiempo_ots_estado(X,corto) :- tiempo_ots_corto(X).
tiempo_ots_estado(X,medio) :- tiempo_ots_medio(X).
tiempo_ots_estado(X,largo) :- tiempo_ots_largo(X).
tiempo_ots_estado(X,muy_largo) :- tiempo_ots_muylargo(X).
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
escribeOptimos([Primera|Personas]):- num_ot(Primera, NO),
                        carga_trabajo(Primera, CT),
                        meses_trabajo(Primera, MT),
                        experiencia(Primera, EX),
                        distancia(Primera, D),
                        distancia_estado(Primera, DE),
                        tiempo_ots(Primera, TOTS),
                        tiempo_ots_estado(Primera, TOTSE),
                        write(Primera),write(","),
                        write(NO),write(","),
                        write(CT),write(","),
                        write(MT),write(","),
                        write(EX),write(","),
                        write(D),write(","),
                        write(DE),write(","),
                        write(TOTS),write(","),
                        write(TOTSE), nl,escribeOptimos(Personas).
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
consulta_general:- findall(X, id_tecnico(X), Personas),escribeOptimos(Personas).
