CREATE PROCEDURE SelectAllCustomers @City varchar(30), @PostalCode varchar(10)
AS
	SELECT * FROM Customers WHERE City = @City AND PostalCode = @PostalCode
GO;

EXEC SelectAllCustomers @City = "London", @PostalCode = "WA1 1DP";

------------------------------------------AREAS------------------------------------------
--Crear tabla de administracion de áreas--
CREATE PROCEDURE SelectActiveAreas
AS 
	SELECT * FROM Area WHERE Estatus_Area = 1
GO
--Crear una nueva área--
CREATE PROCEDURE InsertNewArea @area varchar(50)
AS
	IF @area = (SELECT Area FROM Area WHERE Area = @area)
		UPDATE Area 
		SET Estatus_Area = 1
		WHERE Area = @area
	ELSE 
		INSERT INTO Area (Area, Estatus_Area)
		VALUES (@area,1);
GO
-------
--Llamar solo un área por su id--
CREATE PROCEDURE SelectAreaConId @id tinyint,
AS
	SELECT Area FROM Area WHERE Id_Area = @id
GO
-------
--Modificar un área--
CREATE PROCEDURE UpdateArea @id tinyint, @area varchar(100)
AS
	UPDATE Area
	SET Area = @area
	WHERE Id_Area = @id;
GO
-------
--Dar de baja un área--
CREATE PROCEDURE DisableArea @id
AS
	UPDATE Area
	SET Estatus_Area = 0
WHERE Id_Area = @id
GO
------------------------------------------USUARIOS------------------------------------------
--Crear tabla de administracion de usuarios--
CREATE PROCEDURE SelectActiveUsuarios
AS
	SELECT p.Id_Persona,
		u.Id_Usuario,
		CONCAT(p.Nombre, +' '+p.Primer_Apellido, +' '+p.Segundo_Apellido) AS Nombre,
		ctu.Tipo_Usuario,
		u.Estatus
	FROM (((Usuario u
	INNER JOIN Persona p ON u.Id_Persona = p.Id_Persona)
	INNER JOIN det_Tipos_Usuario dtu ON u.Id_Usuario = ctu.Id_Usuario)
	INNER JOIN cat_Tipo_Usuario ctu	ON dtu.Id_Tipo = ctu.Id_Tipo)
	WHERE u.Estatus = 1
	ORDER BY Id_Usuario DESC
GO
-------
--Ingresar un nuevo usuario--
CREATE PROCEDURE InsertNewUsuario @curp varchar(18), @nombre varchar(50), 
	@primer_apellido varchar(30),
	@segundo_apellido varchar(30),
	@tipo_usuario tinyint,
	@id_area tinyint,
	@jefe_inmediato smallint,
	@correo varchar(50),
	@password varchar (250),
	@persona_id int,
	@usuario_id int
AS
	INSERT INTO Persona (CURP,Nombre,Primer_Apellido,Segundo_Apellido,Estatus,Correo)
		VALUES (@curp, @nombre, @primer_apellido, @segundo_apellido,1,@correo);

	SET @persona_id = (SELECT TOP (1) Id_Persona FROM Persona ORDER BY Id_Persona DESC)

	INSERT INTO Usuario (Id_Persona, Correo_Electronico, Password, Estatus)
		VALUES (@persona_id, @correo, @password,1);

	SET @usuario_id = (SELECT TOP (1) Id_Usuario FROM Usuario ORDER BY Id_Usuario DESC);		

	INSERT INTO det_Tipos_Usuario (Id_Usuario, Id_Tipo, Estatus)
		VALUES (@usuario_id, @tipo_usuario,1);

	INSERT INTO Integrante_Empresa (Id_Area, Id_Jefe_Inmediato)
		VALUES (@id_area, @jefe_inmediato);
GO
--Modificar un usuario------------>PENDIENTE---------------------------------------------------
CREATE PROCEDURE UpdateUsuario @curp varchar(18), @nombre varchar(50), 
	@primer_apellido varchar(30),
	@segundo_apellido varchar(30),
	@tipo_usuario tinyint,
	@id_area tinyint,
	@jefe_inmediato smallint,
	@correo varchar(50),
	@password varchar (250),
	@id_persona int,
	@id_usuario int
	
AS
	UPDATE Persona 
	SET CURP = @curp, Nombre = @nombre, Primer_Apellido = @primer_apellido,
		Segundo_Apellido = @segundo_apellido,
		Correo = @correo
	WHERE Id_Persona = @id_persona;

	UPDATE Usuario
	SET Id_Tipo_Usuario = @tipo_usuario, Correo_Electronico = @correo, Password = @password
	WHERE Id_Persona = @id_persona;

	UPDATE det_Tipos_Usuario
	SET Id_Tipo = @tipo_usuario
	WHERE Id_Usuario = @id_usuario

	UPDATE Integrante_Empresa
	SET Id_Area = id_area, Id_Jefe_Inmediato = @jefe_inmediato
	WHERE Id_Persona = @id_persona;
GO
--Obtener datos de un usuario--
CREATE PROCEDURE SelectUsuarioConId @id_usuario int
AS
	SELECT p.CURP, 
		p.Nombre, 
		p.Primer_Apellido,
		p.Segundo_Apellido,
		a.Area,
		u.Correo_Electronico,
		u.Password,
		jefe.Nombre_Jefe
	FROM ((((((Usuario u
		INNER JOIN Persona p ON u.Id_Persona = p.Id_Persona)
		INNER JOIN Integrante_Empresa ie ON p.Id_Persona = ie.Id_Persona)
		INNER JOIN Area a ON ie.Id_Area = a.Id_Area)
		INNER JOIN cat_Temp_Jefes jefe ON ie.Id_Jefe_Inmediato = jefe.Id_Jefe)
		INNER JOIN det_Tipos_Usuario dtu ON u.Id_Usuario = dtu.Id_Usuario)
    	INNER JOIN cat_Tipo_Usuario ctu ON dtu.Id_Tipo = ctu.Id_Tipo)
  	WHERE u.Id_Usuario = @id_usuario;
-------
--Dar de baja un usuario--
CREATE PROCEDURE DisableUsuario @id_usuario int 
AS
	UPDATE Usuario
	SET Estatus = 0
	WHERE Id_Usuario = @id_usuario
GO;
--Llamar procedure--
EXEC DisableUsuario @id_usuario = <>;
------------------------------------------TEMAS------------------------------------------
--insertar un nuevo tema--
CREATE PROCEDURE InsertNewTema 
	@tema varchar(70),
	@id_tema int OUTPUT
AS
	BEGIN
		INSERT INTO Tema(Nombre_Tema,Estatus)
			VALUES (@tema,1);
		SET @id_tema = (SELECT Id_Tema FROM Tema WHERE Nombre_Tema = @tema)
	END
GO
-------
--Crear tabla de subtemas--
CREATE PROCEDURE SelectActiveTemas
AS
	SELECT t.Id_Tema, t.Nombre_Tema, s.Subtema
	FROM Tema t
	LEFT OUTER JOIN Subtema s ON t.Id_Tema = s.Id_Tema
	WHERE t.Estatus = 1
	ORDER BY t.Id_Tema
GO
-------
CREATE PROCEDURE InsertNewSubtema @id_tema int, @subtema varchar(70)
AS
	INSERT INTO Subtema(Id_Tema, Subtema, Estatus)
		VALUES (@id_tema, @subtema, 1)
GO
-------
--Modificar tema--
CREATE PROCEDURE UpdateTema @id_tema int, @tema varchar(70)
AS
	UPDATE Tema
	SET Nombre_Tema = @Tema
	WHERE Id_Tema = @id_tema
GO
-------
--Dar de baja tema--
CREATE PROCEDURE DisableTema @id_tema int
AS
	UPDATE Tema
	SET Estatus = 0
	WHERE id_tema = @id_tema;

	UPDATE Subtema
	SET Estatus = 0
	WHERE Id_Tema = @id_tema;
GO
-------
--Dar de baja subtema--
CREATE PROCEDURE DisableSubtema @id_subtema int
AS
	UPDATE Subtema
	SET Estatus = 0
	WHERE Id_Tema = @id_subtema;
GO
------------------------------------------PREGUNTAS------------------------------------------
--insertar pregunta con imagen--
CREATE PROCEDURE InsertNewPreguntaImagen @id_tipo_pregunta int, @id_tema int, @id_subtema int,
	@pregunta varchar(150),
	@path_correcto varchar (100),
	@path_1	varchar (100),
	@path_2	varchar (100),
	@path_3	varchar (100),
	@id_pregunta int
AS
	INSERT INTO Pregunta (Id_Tipo, Id_Tema,Id_Subtema,Pregunta,Estatus)
		VALUES(@id_tipo_pregunta, @id_tema, @id_subtema, @pregunta, 1);

	SET @id_pregunta = (SELECT TOP (1) Id_Pregunta FROM Pregunta ORDER BY Id_Pregunta DESC)

	INSERT INTO Respuesta (Id_Pregunta, Path_Correcto, Path_1, Path_2, Path_3)
		VALUES (@id_pregunta, @path_correcto, 
			@path_1,
			@path_2,
			@path_3)
GO
--insertar pregunta de opcion multiple--
CREATE PROCEDURE InsertNewPreguntaMultiple @id_tipo_pregunta int, @id_tema int, @id_subtema int,
	@pregunta varchar(150),
	@resp_correcto varchar (100),
	@resp_1	varchar (100),
	@resp_2	varchar (100),
	@resp_3	varchar (100),
	@id_pregunta int
AS
	INSERT INTO Pregunta (Id_Tipo, Id_Tema,Id_Subtema,Pregunta,Estatus)
		VALUES(@id_tipo_pregunta, @id_tema, @id_subtema, @pregunta, 1);

	SET @id_pregunta = (SELECT TOP (1) Id_Pregunta FROM Pregunta ORDER BY Id_Pregunta DESC)

	INSERT INTO Respuesta (Id_Pregunta, Resp_Correcto, Resp_1, Resp_2, Resp_3)
		VALUES (@id_pregunta, @resp_correcto, 
			@resp_1,
			@resp_2,
			@resp_3)
GO
--Modificar una pregunta con imagenes--
CREATE PROCEDURE UpdatePreguntaImagenes @id_pregunta int, @id_tipo_pregunta int, @id_tema int,
	@id_subtema int,
	@pregunta varchar (150),
	@path_correcto varchar (100),
	@path_1	varchar (100),
	@path_2	varchar (100),
	@path_3	varchar (100)
AS
	UPDATE Pregunta 
	SET Id_Tipo = @id_tipo_pregunta, Id_Tema = @id_tema, Id_Subtema = @id_subtema,
		Pregunta = @pregunta
	WHERE Id_Pregunta = @id_pregunta;

	UPDATE Respuesta
	SET Path_Correcto = @path_correcto, Path_1 = @path_1, Path_2 = @path_2, 
		Path_3 = @path_3
	WHERE Id_Pregunta = @id_pregunta;
GO
--Modificar pregunta opcion multiple--
CREATE PROCEDURE UpdatePreguntaMultiple @id_pregunta int, @id_tipo_pregunta int, @id_tema int,
	@id_subtema int,
	@pregunta varchar (150),
	@resp_correcto varchar (100),
	@resp_1	varchar (100),
	@resp_2	varchar (100),
	@resp_3	varchar (100)
AS
	UPDATE Pregunta 
	SET Id_Tipo = @id_tipo_pregunta, Id_Tema = @id_tema, Id_Subtema = @id_subtema,
		Pregunta = @pregunta
	WHERE Id_Pregunta = @id_pregunta;

	UPDATE Respuesta
	SET Path_Correcto = @resp_correcto, Resp_1 = @resp_1, Resp_2 = @resp_2, 
		Resp_3 = @resp_3
	WHERE Id_Pregunta = @id_pregunta;
GO
--Obtener lista de preguntas--
CREATE PROCEDURE SelectPreguntas
AS
	SELECT p.Id_Pregunta,t.Nombre_Tema, s.Subtema,p.Pregunta
	FROM Pregunta p
	INNER JOIN Tema t ON p.Id_Tema = t.Id_Tema
	INNER JOIN Subtema s ON p.Id_Subtema = s.Id_Subtema
	WHERE p.Estatus = 1
GO
--Seleccionar pregunta con imagen por id--
CREATE PROCEDURE SelectPreguntaImagenConId @id_pregunta int
AS
	SELECT ctp.Tipo_Pregunta,t.Nombre_Tema, s.Subtema,
		p.Pregunta,
		r.Resp_Correcta,
		r.Resp_1,
		r.Resp_2,
		r.Resp_3
	FROM Pregunta p
	INNER JOIN cat_Tipo_Pregunta ctp ON p.Id_Tipo = ctp.Id_Tipo_Pregunta 
	INNER JOIN Tema t ON p.Id_Tema = t.Id_Tema
	INNER JOIN Subtema s ON p.Id_Subtema = s.Id_Subtema
	INNER JOIN Respuesta r ON p.Id_Pregunta = r.Id_Pregunta
GO
--Seleccionar pregunta multiple con id--
CREATE PROCEDURE SelectPreguntaMultipleConId @id_pregunta int
AS
	SELECT ctp.Tipo_Pregunta,t.Nombre_Tema, s.Subtema,
		p.Pregunta,
		r.Path_Correcto,
		r.Path_1,
		r.Path_2,
		r.Path_3
	FROM Pregunta p
	INNER JOIN cat_Tipo_Pregunta ctp ON p.Id_Tipo = ctp.Id_Tipo_Pregunta 
	INNER JOIN Tema t ON p.Id_Tema = t.Id_Tema
	INNER JOIN Subtema s ON p.Id_Subtema = s.Id_Subtema
	INNER JOIN Respuesta r ON p.Id_Pregunta = r.Id_Pregunta
GO
--Dar de baja pregunta--
CREATE PROCEDURE DisablePregunta @id_pregunta int
AS
	UPDATE Pregunta
	SET Estatus = 0
	WHERE Id_Pregunta = @id_pregunta
GO
------------------------------------------Examen------------------------------------------
--Insertar nuevo examen--
CREATE PROCEDURE InsertNewExamen @id_area int, @examen varchar (50), @codigo int, 
	@puntaje_min float,
	@intentos int,
	@tiempo time,
	@total_preguntas smallint,
	@uso_tiempo bit,
	@modo_didactico bit,
	@tiempo_reactivacion decimal(9,2)
AS
	INSERT INTO Examen(Id_Area,Titulo_Examen,Codigo,Puntaje_Minimo,
		Intentos,
		Tiempo,
		Total_Preguntas,
		Uso_Tiempo,
		Estatus,
		Modo_Didactico,
		Tiempo_Reactivacion)
	VALUES(@id_area, @examen, @codigo, @puntaje_min, @intentos,
		@tiempo,
		@total_preguntas,
		@uso_tiempo,
		1,
		@modo_didactico,
		@tiempo_reactivacion)
GO
--Insertar bloques de preguntas de un examen--
CREATE PROCEDURE InsertBloquePreguntas @id_examen int, @id_tema int, @id_subtema int,
	@id_tipo_pregunta int,
	@numero_preguntas int
AS
	IF @id_subtema = null
		BEGIN
			INSERT INTO det_Lote_Preguntas(Id_Examen, Id_Tipo_Pregunta, Id_Tema, Numero_Preguntas)
			VALUES (@id_examen, @id_tipo_pregunta, @id_tema, @numero_preguntas)
		END
	ELSE
		BEGIN
			INSERT INTO det_Lote_Preguntas(Id_Examen, Id_Tipo_Pregunta, Id_Tema, Id_Subtema, Numero_Preguntas)
			VALUES (@id_examen, @id_tipo_pregunta, @id_tema, @id_subtema, @numero_preguntas)
		END
GO
--Obtener configuracion del un examen por id--
CREATE PROCEDURE SelectExamenConId	@id_examen int
AS
	SELECT e.Titulo_Examen, e.Codigo, e.Puntaje_Minimo, e.Intentos, e.Tiempo,
		e.Total_Preguntas, 
		e.Uso_Tiempo, 
		e.Modo_Didactico, 
		e.Tiempo_Reactivacion
	FROM Examen e
	WHERE e.Id_Examen = @id_examen;

	SELECT dlp.Id_Lote_Preguntas, t.Nombre_Tema, ctp.Tipo_Pregunta , dlp.Numero_Preguntas
	FROM det_Lote_Preguntas dlp
	INNER JOIN Tema t ON dlp.Id_Tema = t.Id_Tema
	INNER JOIN cat_Tipo_Pregunta ctp ON dlp.Id_Tipo_Pregunta = ctp.Id_Tipo_Pregunta
	WHERE dlp.Id_Examen = @id_examen
GO
--Dar de baja un examen--
CREATE PROCEDURE DisableExamen @id_examen int
AS
	UPDATE Examen
	SET Estatus = 0
	WHERE Id_Examen = @id_examen
GO
--Obtener lista de examenes--
CREATE PROCEDURE SelectActiveExamenes
AS
	SELECT e.Titulo_Examen, e.Puntaje_Minimo, e.Intentos, e.Modo_Didactico
	FROM Examen e
	WHERE e.Estatus = 1
GO
--Modificar un examen--
CREATE PROCEDURE UpdateExamen -->Pendiente<-------------------------------
--Obtener datos de usuario y examen--
CREATE PROCEDURE CheckInfoExamenUsuario @id_usuario int, @id_examen int
AS
	SELECT p.Nombre, p.Primer_Apellido, p.Segundo_Apellido, a.Area
	FROM Usuario u
	INNER JOIN Persona p ON u.Id_Persona = p.Id_Persona
	INNER JOIN Integrante_Empresa ie ON u.Id_Persona = ie.Id_Persona
	INNER JOIN Area a ON ie.Id_Area = a.Id_Area
	WHERE u.Id_Usuario = @id_usuario;

	SELECT e.Titulo_Examen, e.Puntaje_Minimo, e.Tiempo, e.Uso_Tiempo
	FROM Examen e
	WHERE e.Id_Examen = @id_examen
GO
------------------------------------------RESULTADO------------------------------------------
--Mostrar el listado de resultados--
CREATE PROCEDURE SelectResultadosExamen
AS
	SELECT CONCAT (p.Nombre, +' '+ p.Primer_Apellido, +' '+ p.Segundo_Apellido)AS Nombre
		e.Titulo_Examen,
		r.Promedio,
		r.Acreditacion,
		r.Id_Resultado
	FROM Resultado r
	INNER JOIN Usuario u ON r.Id_Usuario = u.Id_Usuario
	INNER JOIN Persona p ON u.Id_Usuario = p.Id_Persona
	INNER JOIN Examen e ON r.Id_Examen = e.Id_Examen
	WHERE r.Resultado < 0
GO
--
------------------------------------------TIPO USUARIOS--------------------------------------
--Mostrar listado de tipo de usuarios
CREATE PROCEDURE SelectActiveTiposUsuario
AS
	SELECT *
	FROM cat_Tipo_Usuario
	WHERE Estatus = 1
GO
--Insertar nuevo tipo de usuario
CREATE PROCEDURE InsertNewTipoUsuario @tipo_usuario varchar(20)
AS
	IF @tipo_usuario = (SELECT Tipo_Usuario FROM cat_Tipo_Usuario WHERE Tipo_Usuario = @tipo_usuario)
		UPDATE cat_Tipo_Usuario
		SET Estatus = 1
		WHERE Tipo_Usuario = @tipo_usuario
	ELSE
		INSERT INTO cat_Tipo_Usuario (Tipo_Usuario,Estatus)
		VALUES (@tipo_usuario,1)
GO

--Dar de baja un examen--
CREATE PROCEDURE DisableTipoUsuario @id_tipo int
AS
	UPDATE cat_Tipo_Usuario
	SET Estatus = 0
	WHERE Id_Tipo = @id_tipo
GO

--actualizar tipo usuario--
CREATE PROCEDURE UpdateTipoUsuario @id_tipo int, @tipo_usuario varchar(70)
AS
	UPDATE cat_Tipo_Usuario
	SET Tipo_Usuario = @tipo_usuario
	WHERE Id_Tipo = @id_tipo
GO
------------------------------------------PROBLEMAS--------------------------------------
--Insertar nuevo problema--
CREATE PROCEDURE InsertNewProblema @problema varchar(200)
AS
	IF @problema = (SELECT Problema FROM cat_Problema WHERE Problema = @problema)
		UPDATE cat_Problema
		SET Estatus = 1
		WHERE Problema = @problema
	ELSE
		INSERT INTO cat_Problema (Problema,Estatus)
		VALUES (@problema,1)
GO

--Mostrar problemas activos--
CREATE PROCEDURE SelectActiveProblemas
AS
	SELECT *
	FROM cat_Problema
	WHERE Estatus = 1
GO

--Update problema--
CREATE PROCEDURE UpdateProblema @id_problema int, @problema varchar(200)
AS
	UPDATE cat_Problema
	SET Problema = @problema
	WHERE Id_Problema = @id_problema
GO

--Delete problema--
CREATE PROCEDURE DisableProblema @id_problema int
AS
	UPDATE cat_Problema
	SET Estatus = 0
	WHERE Id_Problema = @id_problema
GO

------------------------------------------JEFES--------------------------------------
--Mostrar listado de Jefes--
CREATE PROCEDURE SelectActiveJefe
AS
	SELECT *
	FROM cat_Temp_Jefes
	WHERE Estatus = 1
GO
--Insertar nuevo jefe--
CREATE PROCEDURE InsertNewJefe @Jefe varchar(150)
AS
	INSERT INTO cat_Temp_Jefes (Nombre_Jefe,Estatus)
	VALUES (@jefe,1)
GO
--Update Jefe--
CREATE PROCEDURE UpdateJefe @id_jefe int, @nombre_jefe varchar(200)
AS
	UPDATE cat_Temp_Jefes
	SET Nombre_Jefe = @nombre_jefe
	WHERE Id_Jefe = @id_jefe
GO

--Delete jefe--
CREATE PROCEDURE DisableJefe @Id_Jefe int
AS
	UPDATE cat_Temp_Jefes
	SET Estatus = 0
	WHERE Id_Jefe = @id_jefe
GO

--insertar un nuevo tema--
CREATE PROCEDURE InsertNewTema @tema varchar(70)
AS
	BEGIN
		IF @tema = (SELECT Nombre_Tema FROM Tema WHERE Nombre_Tema = @tema)
			UPDATE Tema
			SET Estatus = 1
			WHERE Nombre_Tema = @tema
		ELSE
			INSERT INTO Tema(Nombre_Tema,Estatus)
				VALUES (@tema,1);
			SET @id_tema = (SELECT Id_Tema FROM Tema WHERE Nombre_Tema = @tema)
	END
GO;
--insertar subtema--
CREATE PROCEDURE InsertNewSubtema @id_tema int, @subtema varchar(100)
AS
	BEGIN
		INSERT INTO Subtema (Id_Tema, Subtema, Estatus)
		VALUES (@id_tema, @subtema, 1)
	END
GO;
--borrar subtemas por id de tema
CREATE PROCEDURE DeleteSubtemasPorTema @id_tema int
AS
	BEGIN
		DELETE FROM Subtema WHERE Id_Tema = @id_tema
	END
GO;
--

SELECT r.Id_Resultado,
		CONCAT(p.Nombre,' ',p.Primer_Apellido,' ',p.Segundo_Apellido) AS Nombre,
		e.Titulo_Examen AS Examen,
		r.Numero_Intento,
		r.Promedio,
		a.Area, 
		r.Acreditacion 
	FROM Resultado r
	INNER JOIN Usuario u ON r.Id_Usuario = u.Id_Usuario
	INNER JOIN Persona p ON u.Id_Persona = p.Id_Persona
	INNER JOIN Examen e ON r.Id_Examen = e.Id_Examen
	INNER JOIN Area a ON e.Id_Area = a.Id_Area
	WHERE r.Acreditacion IS NOT NULL



SELECT	CONCAT(p.Nombre,' ',p.Primer_Apellido,' ',p.Segundo_Apellido) AS Nombre,
		e.Titulo_Examen AS Examen,
		r.Numero_Intento,
		r.Duracion,
		r.Fecha_Realizacion,
		r.Resultado AS Correctas,
		r.Promedio,
		a.Area,
		r.Acreditacion
	FROM Resultado r
	INNER JOIN Usuario u ON r.Id_Usuario = u.Id_Usuario
	INNER JOIN Persona p ON u.Id_Persona = p.Id_Persona
	INNER JOIN Examen e ON r.Id_Examen = e.Id_Examen
	INNER JOIN Area a ON e.Id_Area = a.Id_Area
	WHERE e.Titulo_Examen = @examen AND CONCAT(p.Nombre,' ',p.Primer_Apellido,' ',p.Segundo_Apellido) = @nombre