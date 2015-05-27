CREATE VIEW Docente_Licenciatura_View AS
SELECT a.*,b.nombre FROM horario.Docentes_has_Licenciaturas as a
LEFT JOIN Licenciaturas as b on  idLicenciatura = Licenciaturas_idLicenciatura;