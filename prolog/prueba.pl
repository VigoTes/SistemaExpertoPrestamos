test :- write( 'Prolog was called from PHP successfully.' ).




%NivelPrestamo
    calcularNivelPrestamo(IMPORTE):-
        IMPORTE<5000,
        IMPORTE>0,
        write('BAJO'),
        !.
    calcularNivelPrestamo(IMPORTE):-
        IMPORTE<20000,
        IMPORTE>5000,
        write('MEDIO'),
        !.
    calcularNivelPrestamo(IMPORTE):-
        IMPORTE>20000,
        write('ALTO').


%Nivel utilidades
    calcularNivelUtilidades(UTILIDAD):-
        UTILIDAD<10000,
        UTILIDAD>0,
        write('BAJO'),
        !.
    calcularNivelUtilidades(UTILIDAD):-
        UTILIDAD<15000,
        UTILIDAD>10000,
        write('MEDIO'),
        !.
    calcularNivelUtilidades(UTILIDAD):-
        UTILIDAD>20000,
        write('ALTO').

% REISGO POR EDAD
    calcularRiesgoPorEdad(EDAD):-
        EDAD<65,
        write('BAJO'),
        !.
    calcularRiesgoPorEdad(EDAD):-
        EDAD>=65,
        write('ALTO').


% TASA PROBABLE DE RETORNO
    calcularRiesgoNoRetorno(TASARETORNO):-
        TASARETORNO<1,
        write('ALTO'),
        !.
    calcularRiesgoNoRetorno(TASARETORNO):-
        TASARETORNO<5,
        TASARETORNO>=1,
        write('MEDIO'),
        !.
    calcularRiesgoNoRetorno(TASARETORNO):-
        TASARETORNO>=5,
        write('BAJA').

%Respaldo financiero
    calcularRespaldoFinanciero(FactorRespaldo):-
        FactorRespaldo<50000,
        write('POCO'),
        !.
    calcularRespaldoFinanciero(FactorRespaldo):-
        FactorRespaldo<100000,
        FactorRespaldo>=50000,
        write('REGULAR'),
        !.
    calcularRespaldoFinanciero(FactorRespaldo):-
        FactorRespaldo>=100000,
        write('BASTANTE').


% CAPACIDAD FINANCIERA
    calcularCapacidadFinanciera(NivelUtiliades,CondicionMorosidad,NivelRiesgoPorEdad,RiesgoNoRetorno):-
        tablaCapacidadFinanciera(NivelUtiliades,CondicionMorosidad,NivelRiesgoPorEdad,RiesgoNoRetorno,"pequeña"),
        write('Pequeña'),
        !.
    calcularCapacidadFinanciera(NivelUtiliades,CondicionMorosidad,NivelRiesgoPorEdad,RiesgoNoRetorno):-
        tablaCapacidadFinanciera(NivelUtiliades,CondicionMorosidad,NivelRiesgoPorEdad,RiesgoNoRetorno,"mediana"),
        write('Mediana'),
        !.
    calcularCapacidadFinanciera(NivelUtiliades,CondicionMorosidad,NivelRiesgoPorEdad,RiesgoNoRetorno):-
        tablaCapacidadFinanciera(NivelUtiliades,CondicionMorosidad,NivelRiesgoPorEdad,RiesgoNoRetorno,"grande"),
        write('Grande'),
        !.
    calcularCapacidadFinanciera(NivelUtiliades,CondicionMorosidad,NivelRiesgoPorEdad,RiesgoNoRetorno):-
        tablaCapacidadFinanciera(NivelUtiliades,CondicionMorosidad,NivelRiesgoPorEdad,RiesgoNoRetorno,"muygrande"),
        write('Muy Grande').


% TODO EN MASCULINO
% TABLA GRANDE DE CAPACIDAD FINANCIERA

tablaCapacidadFinanciera("bajo","con antecedentes","suficiente","bajo","pequeño").%A1
tablaCapacidadFinanciera("bajo","con antecedentes","suficiente","regular","pequeño").%A2
tablaCapacidadFinanciera("bajo","con antecedentes","suficiente","alto","pequeño").%A3
tablaCapacidadFinanciera("bajo","con antecedentes","no suficiente","bajo","pequeño").%A4
tablaCapacidadFinanciera("bajo","con antecedentes","no suficiente","regular","pequeño").%A5
tablaCapacidadFinanciera("bajo","con antecedentes","no suficiente","alto","pequeño").%A6
tablaCapacidadFinanciera("bajo","sin antecedentes","suficiente","bajo","mediano").%A7
tablaCapacidadFinanciera("bajo","sin antecedentes","suficiente","regular","mediano").%A8
tablaCapacidadFinanciera("bajo","sin antecedentes","suficiente","alto","mediano").%A9
tablaCapacidadFinanciera("bajo","sin antecedentes","no suficiente","bajo","pequeño").%A10
tablaCapacidadFinanciera("bajo","sin antecedentes","suficiente","regular","pequeño").%A11
tablaCapacidadFinanciera("bajo","sin antecedentes","no suficiente","alto","pequeño").%A12
tablaCapacidadFinanciera("medio","con antecedentes","suficiente","bajo","pequeño").%A13
tablaCapacidadFinanciera("medio","con antecedentes","suficiente","regular","pequeño").%A14
tablaCapacidadFinanciera("medio","con antecedentes","suficiente","alto","pequeño").%A15
tablaCapacidadFinanciera("medio","con antecedentes","no suficiente","bajo","pequeño").%A16
tablaCapacidadFinanciera("medio","con antecedentes","no suficiente","regular","pequeño").%A17
tablaCapacidadFinanciera("medio","con antecedentes","no suficiente","alto","pequeño").%A18
tablaCapacidadFinanciera("medio","sin antecedentes","suficiente","bajo","mediano").%A19
tablaCapacidadFinanciera("medio","sin antecedentes","suficiente","regular","grande").%A20
tablaCapacidadFinanciera("medio","sin antecedentes","suficiente","alto","grande").%A21
tablaCapacidadFinanciera("medio","sin antecedentes","no suficiente","bajo","pequeño").%A22
tablaCapacidadFinanciera("medio","sin antecedentes","no suficiente","regular","pequeño").%A23
tablaCapacidadFinanciera("medio","sin antecedentes","no suficiente","alto","pequeño").%A24
tablaCapacidadFinanciera("alto","con antecedentes","suficiente","bajo","pequeño").%A25
tablaCapacidadFinanciera("alto","con antecedentes","suficiente","regular","pequeño").%A26
tablaCapacidadFinanciera("alto","con antecedentes","suficiente","alto","pequeño").%A27
tablaCapacidadFinanciera("alto","con antecedentes","no suficiente","bajo","pequeño").%A28
tablaCapacidadFinanciera("alto","con antecedentes","no suficiente","regular","pequeño").%A29
tablaCapacidadFinanciera("alto","con antecedentes","no suficiente","alto","pequeño").%A30
tablaCapacidadFinanciera("alto","sin antecedentes","suficiente","bajo","mediano").%A31
tablaCapacidadFinanciera("alto","sin antecedentes","suficiente","regular","grande").%A32
tablaCapacidadFinanciera("alto","sin antecedentes","suficiente","alto","grande").%A33
tablaCapacidadFinanciera("alto","sin antecedentes","no suficiente","bajo","pequeño").%A34
tablaCapacidadFinanciera("alto","sin antecedentes","no suficiente","regular","pequeño").%A35
tablaCapacidadFinanciera("alto","sin antecedentes","no suficiente","alto","pequeño").%A36


tablaDecisionCompleta("poco","pequeño","bajo","no aprobado").%X1
tablaDecisionCompleta("poco","pequeño","medio","no aprobado").%X2
tablaDecisionCompleta("poco","pequeño","alto","no aprobado").%X3
tablaDecisionCompleta("poco","mediano","bajo","aprobado").%X4
tablaDecisionCompleta("poco","mediano","medio","no aprobado").%X5
tablaDecisionCompleta("poco","mediano","alto","no aprobado").%X6
tablaDecisionCompleta("poco","grande","bajo","aprobado").%X7
tablaDecisionCompleta("poco","grande","medio","aprobado").%X8
tablaDecisionCompleta("poco","grande","alto","no aprobado").%X9
tablaDecisionCompleta("poco","muy grande","bajo","aprobado").%X10
tablaDecisionCompleta("poco","muy grande","medio","aprobado").%X11
tablaDecisionCompleta("poco","muy grande","alto","aprobado").%X12
tablaDecisionCompleta("regular","pequeño","bajo","no aprobado").%X13
tablaDecisionCompleta("regular","pequeño","medio","no aprobado").%X14
tablaDecisionCompleta("regular","pequeño","alto","no aprobado").%X15
tablaDecisionCompleta("regular","mediano","bajo","aprobado").%X16
tablaDecisionCompleta("regular","mediano","medio","no aprobado").%X17
tablaDecisionCompleta("regular","mediano","alto","no aprobado").%X18
tablaDecisionCompleta("regular","grande","bajo","aprobado").%X19
tablaDecisionCompleta("regular","grande","medio","aprobado").%X20
tablaDecisionCompleta("regular","grande","alto","aprobado").%X21
tablaDecisionCompleta("regular","muy grande","bajo","aprobado").%X22
tablaDecisionCompleta("regular","muy grande","medio","aprobado").%X23
tablaDecisionCompleta("regular","muy grande","alto","aprobado").%X24
tablaDecisionCompleta("bastante","pequeño","bajo","no aprobado").%X25
tablaDecisionCompleta("bastante","pequeño","medio","no aprobado").%X26
tablaDecisionCompleta("bastante","pequeño","alto","no aprobado").%X27
tablaDecisionCompleta("bastante","mediano","bajo","aprobado").%X28
tablaDecisionCompleta("bastante","mediano","medio","no aprobado").%X29
tablaDecisionCompleta("bastante","mediano","alto","no aprobado").%X30
tablaDecisionCompleta("bastante","grande","bajo","aprobado").%X31
tablaDecisionCompleta("bastante","grande","medio","aprobado").%X32
tablaDecisionCompleta("bastante","grande","alto","aprobado").%X33
tablaDecisionCompleta("bastante","muy grande","bajo","aprobado").%X34
tablaDecisionCompleta("bastante","muy grande","medio","aprobado").%X35
tablaDecisionCompleta("bastante","muy grande","alto","aprobado").%X36








