CREATE VIEW Docente_Experiencia_View AS
SELECT a.*,b.nombre FROM horario.Docentes_has_Experiencias as a
LEFT JOIN Experiencias as b on  idExperiencia = Experiencias_idExperiencia;