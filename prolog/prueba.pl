test :- write( 'Prolog was called from PHP successfully.' ).


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



calcularNivelUtilidades(UTILIDAD):-
    UTILIDAD<10000,
    UTILIDAD>0,
    write('BAJO'),
    !.
calcularNivelUtilidades(UTILIDAD):-
    IMPORTE<15000,
    IMPORTE>10000,
    write('MEDIO'),
    !.
calcularNivelUtilidades(UTILIDAD):-
    IMPORTE>20000,
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
    TASARETORNO<5,
    TASARETORNO>=1,
    write('MEDIO'),
    !.
    TASARETORNO>=5,
    write('BAJA').

calcularRespaldoFinanciero(FactorRespaldo):-
    FactorRespaldo<50000,
    write('POCO'),
    !.
    FactorRespaldo<100000,
    FactorRespaldo>=50000,
    write('REGULAR'),
    !.
    FactorRespaldo>=100000,
    write('BASTANTE').


