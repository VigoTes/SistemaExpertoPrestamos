test :- write( 'Prolog ha sido llamado exitosamente.' ). 

% TODO EN MASCULINO Y MINUSCULAS

%NivelPrestamo
    calcularNivelPrestamo(IMPORTE):-
        IMPORTE<5000,
        IMPORTE>0,
        write('bajo'),
        !.
    calcularNivelPrestamo(IMPORTE):-
        IMPORTE<20000,
        IMPORTE>=5000,
        write('medio'),
        !.
    calcularNivelPrestamo(IMPORTE):-
        IMPORTE>=20000,
        IMPORTE<50000,
        write('alto'),
        !.
    calcularNivelPrestamo(IMPORTE):-
        IMPORTE>=50000,
        write('muy_alto').


%Nivel utilidades
    calcularNivelUtilidades(UTILIDAD):-
        UTILIDAD<(-1000),
        write('muy_bajo'),
        !.
    calcularNivelUtilidades(UTILIDAD):-
        UTILIDAD<2000,
        write('bajo'),
        !.
    calcularNivelUtilidades(UTILIDAD):-
        UTILIDAD<5000,
        UTILIDAD>=2000,
        write('medio'),
        !.
    calcularNivelUtilidades(UTILIDAD):-
        UTILIDAD>=7000,
        write('alto').

        

% REISGO POR EDAD
    calcularRiesgoPorEdad(EDAD):-
        EDAD<20,
        write('no_suficiente'),
        !.
    calcularRiesgoPorEdad(EDAD):-
        EDAD>=20,
        EDAD<65,
        write('suficiente'),
        !.
    calcularRiesgoPorEdad(EDAD):-
        EDAD>=65,
        write('no_suficiente').


% TASA PROBABLE DE RETORNO
    calcularNivelRetorno(TASARETORNO):-
        TASARETORNO=<0.01,
        write('alto'),
        !.
    calcularNivelRetorno(TASARETORNO):-
        TASARETORNO<0.05,
        TASARETORNO>0.01,
        write('regular'),
        !.
    calcularNivelRetorno(TASARETORNO):-
        TASARETORNO>=0.05,
        write('bajo').

%Respaldo financiero
    calcularRespaldoFinanciero(FactorRespaldo):-
        FactorRespaldo<20000,
        write('poco'),
        !.
    calcularRespaldoFinanciero(FactorRespaldo):-
        FactorRespaldo<80000,
        FactorRespaldo>=20000,
        write('regular'),
        !.
    calcularRespaldoFinanciero(FactorRespaldo):-
        FactorRespaldo>=80000,
        write('bastante').


% CAPACIDAD FINANCIERA
    calcularCapacidadFinanciera(NivelUtilidades,CondicionMorosidad,NivelRiesgoPorEdad,NivelRetorno):-
        tablaCapacidadFinanciera(NivelUtilidades,CondicionMorosidad,NivelRiesgoPorEdad,NivelRetorno,'pequeno'),
        write('pequeno'),
        !.
    calcularCapacidadFinanciera(NivelUtilidades,CondicionMorosidad,NivelRiesgoPorEdad,NivelRetorno):-
        tablaCapacidadFinanciera(NivelUtilidades,CondicionMorosidad,NivelRiesgoPorEdad,NivelRetorno,'mediano'),
        write('mediano'),
        !.
    calcularCapacidadFinanciera(NivelUtilidades,CondicionMorosidad,NivelRiesgoPorEdad,NivelRetorno):-
        tablaCapacidadFinanciera(NivelUtilidades,CondicionMorosidad,NivelRiesgoPorEdad,NivelRetorno,'grande'),
        write('grande'),
        !.
    calcularCapacidadFinanciera(NivelUtilidades,CondicionMorosidad,NivelRiesgoPorEdad,NivelRetorno):-
        tablaCapacidadFinanciera(NivelUtilidades,CondicionMorosidad,NivelRiesgoPorEdad,NivelRetorno,'muy_grande'),
        write('muy_grande'),
        !.
    calcularCapacidadFinanciera('muy_bajo',_,_,_):-
        write('pequeno').
        

% decision final

    evaluarPrestamo(NivelRespaldoFinanciero,NivelCapacidadFinanciera,NivelPrestamo):-
        tablaDecisionCompleta(NivelRespaldoFinanciero,NivelCapacidadFinanciera,NivelPrestamo,'aprobado'),
        write('aprobado'),
        !.
    evaluarPrestamo(NivelRespaldoFinanciero,NivelCapacidadFinanciera,NivelPrestamo):-
        tablaDecisionCompleta(NivelRespaldoFinanciero,NivelCapacidadFinanciera,NivelPrestamo,'no_aprobado'),
        write('no_aprobado'),
        !.
    evaluarPrestamo(_,_,'muy_alto'):-
        write('no_aprobado').
% LOS CRÉDITOS muy_altoS (MAYORES A 50 000 NO APROBAMOS)
    


% TABLA GRANDE DE CAPACIDAD FINANCIERA

    tablaCapacidadFinanciera('bajo','con_antecedentes','suficiente','bajo','pequeno').%A1
    tablaCapacidadFinanciera('bajo','con_antecedentes','suficiente','regular','pequeno').%A2
    tablaCapacidadFinanciera('bajo','con_antecedentes','suficiente','alto','pequeno').%A3
    tablaCapacidadFinanciera('bajo','con_antecedentes','no_suficiente','bajo','pequeno').%A4
    tablaCapacidadFinanciera('bajo','con_antecedentes','no_suficiente','regular','pequeno').%A5
    tablaCapacidadFinanciera('bajo','con_antecedentes','no_suficiente','alto','pequeno').%A6
    tablaCapacidadFinanciera('bajo','sin_antecedentes','suficiente','bajo','pequeno').%A7
    tablaCapacidadFinanciera('bajo','sin_antecedentes','suficiente','regular','mediano').%A8
    tablaCapacidadFinanciera('bajo','sin_antecedentes','suficiente','alto','mediano').%A9
    tablaCapacidadFinanciera('bajo','sin_antecedentes','no_suficiente','bajo','pequeno').%A10
    tablaCapacidadFinanciera('bajo','sin_antecedentes','suficiente','regular','pequeno').%A11
    tablaCapacidadFinanciera('bajo','sin_antecedentes','no_suficiente','alto','pequeno').%A12
    tablaCapacidadFinanciera('medio','con_antecedentes','suficiente','bajo','pequeno').%A13
    tablaCapacidadFinanciera('medio','con_antecedentes','suficiente','regular','pequeno').%A14
    tablaCapacidadFinanciera('medio','con_antecedentes','suficiente','alto','pequeno').%A15
    tablaCapacidadFinanciera('medio','con_antecedentes','no_suficiente','bajo','pequeno').%A16
    tablaCapacidadFinanciera('medio','con_antecedentes','no_suficiente','regular','pequeno').%A17
    tablaCapacidadFinanciera('medio','con_antecedentes','no_suficiente','alto','pequeno').%A18
    tablaCapacidadFinanciera('medio','sin_antecedentes','suficiente','bajo','mediano').%A19
    tablaCapacidadFinanciera('medio','sin_antecedentes','suficiente','regular','grande').%A20
    tablaCapacidadFinanciera('medio','sin_antecedentes','suficiente','alto','grande').%A21
    tablaCapacidadFinanciera('medio','sin_antecedentes','no_suficiente','bajo','pequeno').%A22
    tablaCapacidadFinanciera('medio','sin_antecedentes','no_suficiente','regular','pequeno').%A23
    tablaCapacidadFinanciera('medio','sin_antecedentes','no_suficiente','alto','pequeno').%A24
    tablaCapacidadFinanciera('alto','con_antecedentes','suficiente','bajo','pequeno').%A25
    tablaCapacidadFinanciera('alto','con_antecedentes','suficiente','regular','pequeno').%A26
    tablaCapacidadFinanciera('alto','con_antecedentes','suficiente','alto','pequeno').%A27
    tablaCapacidadFinanciera('alto','con_antecedentes','no_suficiente','bajo','pequeno').%A28
    tablaCapacidadFinanciera('alto','con_antecedentes','no_suficiente','regular','pequeno').%A29
    tablaCapacidadFinanciera('alto','con_antecedentes','no_suficiente','alto','pequeno').%A30
    tablaCapacidadFinanciera('alto','sin_antecedentes','suficiente','bajo','mediano').%A31
    tablaCapacidadFinanciera('alto','sin_antecedentes','suficiente','regular','grande').%A32
    tablaCapacidadFinanciera('alto','sin_antecedentes','suficiente','alto','grande').%A33
    tablaCapacidadFinanciera('alto','sin_antecedentes','no_suficiente','bajo','pequeno').%A34
    tablaCapacidadFinanciera('alto','sin_antecedentes','no_suficiente','regular','pequeno').%A35
    tablaCapacidadFinanciera('alto','sin_antecedentes','no_suficiente','alto','pequeno').%A36




% tabla grande de decision final prestamo
    tablaDecisionCompleta('poco','pequeno','bajo','no_aprobado').%X1
    tablaDecisionCompleta('poco','pequeno','medio','no_aprobado').%X2
    tablaDecisionCompleta('poco','pequeno','alto','no_aprobado').%X3
    tablaDecisionCompleta('poco','mediano','bajo','aprobado').%X4
    tablaDecisionCompleta('poco','mediano','medio','no_aprobado').%X5
    tablaDecisionCompleta('poco','mediano','alto','no_aprobado').%X6
    tablaDecisionCompleta('poco','grande','bajo','aprobado').%X7
    tablaDecisionCompleta('poco','grande','medio','aprobado').%X8
    tablaDecisionCompleta('poco','grande','alto','no_aprobado').%X9
    tablaDecisionCompleta('poco','muy_grande','bajo','aprobado').%X10
    tablaDecisionCompleta('poco','muy_grande','medio','aprobado').%X11
    tablaDecisionCompleta('poco','muy_grande','alto','aprobado').%X12
    tablaDecisionCompleta('regular','pequeno','bajo','no_aprobado').%X13
    tablaDecisionCompleta('regular','pequeno','medio','no_aprobado').%X14
    tablaDecisionCompleta('regular','pequeno','alto','no_aprobado').%X15
    tablaDecisionCompleta('regular','mediano','bajo','aprobado').%X16
    tablaDecisionCompleta('regular','mediano','medio','aprobado').%X17
    tablaDecisionCompleta('regular','mediano','alto','no_aprobado').%X18
    tablaDecisionCompleta('regular','grande','bajo','aprobado').%X19
    tablaDecisionCompleta('regular','grande','medio','aprobado').%X20
    tablaDecisionCompleta('regular','grande','alto','aprobado').%X21
    tablaDecisionCompleta('regular','muy_grande','bajo','aprobado').%X22
    tablaDecisionCompleta('regular','muy_grande','medio','aprobado').%X23
    tablaDecisionCompleta('regular','muy_grande','alto','aprobado').%X24
    tablaDecisionCompleta('bastante','pequeno','bajo','no_aprobado').%X25
    tablaDecisionCompleta('bastante','pequeno','medio','no_aprobado').%X26
    tablaDecisionCompleta('bastante','pequeno','alto','no_aprobado').%X27
    tablaDecisionCompleta('bastante','mediano','bajo','aprobado').%X28
    tablaDecisionCompleta('bastante','mediano','medio','aprobado').%X29
    tablaDecisionCompleta('bastante','mediano','alto','aprobado').%X30
    tablaDecisionCompleta('bastante','grande','bajo','aprobado').%X31
    tablaDecisionCompleta('bastante','grande','medio','aprobado').%X32
    tablaDecisionCompleta('bastante','grande','alto','aprobado').%X33
    tablaDecisionCompleta('bastante','muy_grande','bajo','aprobado').%X34
    tablaDecisionCompleta('bastante','muy_grande','medio','aprobado').%X35
    tablaDecisionCompleta('bastante','muy_grande','alto','aprobado').%X36








