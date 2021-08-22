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



% TABLA GRANDE DE CAPACIDAD FINANCIERA

tablaCapacidadFinanciera("bajo","con antecedentes","suficiente","bajo","pequeña").