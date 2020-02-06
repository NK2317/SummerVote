--Limpiar la BD--
-- disable referential integrity
EXEC sp_MSForEachTable 'ALTER TABLE ? NOCHECK CONSTRAINT ALL' 
GO 

EXEC sp_MSForEachTable 'DELETE FROM ?' 
GO 

EXEC sp_MSForEachTable 'DBCC CHECKIDENT(''?'', RESEED, 0)'
GO

-- enable referential integrity again 
EXEC sp_MSForEachTable 'ALTER TABLE ? CHECK CONSTRAINT ALL' 
GO

--Insertar datos base en los catalogos y un usuario administrador
INSERT INTO Area VALUES ('Sin área',0);
INSERT INTO cat_Temp_Jefes VALUES ('Sin jefe',0);
INSERT INTO cat_Tipo_Pregunta VALUES ('Con texto'),('Con imagenes');
INSERT INTO cat_Tipo_Usuario VALUES('Administrador',1),('Solicitante',1);