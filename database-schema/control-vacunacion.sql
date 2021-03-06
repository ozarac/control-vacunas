USE [master]
GO
/****** Object:  Database [control_vacunacion]    Script Date: 21/08/2021 09:56:45 ******/
CREATE DATABASE [control_vacunacion]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'control_vacunacion', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.MSSQLSERVER\MSSQL\DATA\control_vacunacion.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'control_vacunacion_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.MSSQLSERVER\MSSQL\DATA\control_vacunacion_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
GO
ALTER DATABASE [control_vacunacion] SET COMPATIBILITY_LEVEL = 140
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [control_vacunacion].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [control_vacunacion] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [control_vacunacion] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [control_vacunacion] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [control_vacunacion] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [control_vacunacion] SET ARITHABORT OFF 
GO
ALTER DATABASE [control_vacunacion] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [control_vacunacion] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [control_vacunacion] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [control_vacunacion] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [control_vacunacion] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [control_vacunacion] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [control_vacunacion] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [control_vacunacion] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [control_vacunacion] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [control_vacunacion] SET  DISABLE_BROKER 
GO
ALTER DATABASE [control_vacunacion] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [control_vacunacion] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [control_vacunacion] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [control_vacunacion] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [control_vacunacion] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [control_vacunacion] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [control_vacunacion] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [control_vacunacion] SET RECOVERY FULL 
GO
ALTER DATABASE [control_vacunacion] SET  MULTI_USER 
GO
ALTER DATABASE [control_vacunacion] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [control_vacunacion] SET DB_CHAINING OFF 
GO
ALTER DATABASE [control_vacunacion] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [control_vacunacion] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [control_vacunacion] SET DELAYED_DURABILITY = DISABLED 
GO
EXEC sys.sp_db_vardecimal_storage_format N'control_vacunacion', N'ON'
GO
ALTER DATABASE [control_vacunacion] SET QUERY_STORE = OFF
GO
USE [control_vacunacion]
GO
/****** Object:  User [vacunacion]    Script Date: 21/08/2021 09:56:45 ******/
CREATE USER [vacunacion] FOR LOGIN [vacunacion] WITH DEFAULT_SCHEMA=[dbo]
GO
ALTER ROLE [db_datareader] ADD MEMBER [vacunacion]
GO
ALTER ROLE [db_datawriter] ADD MEMBER [vacunacion]
GO
/****** Object:  Table [dbo].[empleado]    Script Date: 21/08/2021 09:56:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[empleado](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[primer_nombre] [nvarchar](50) NOT NULL,
	[segundo_nombre] [nvarchar](50) NULL,
	[primer_apellido] [nvarchar](50) NOT NULL,
	[segundo_apellido] [nvarchar](50) NULL,
	[vacuna_id] [int] NULL,
	[primera_dosis] [date] NULL,
	[segunda_dosis] [date] NULL,
	[puesto_laboral] [varchar](250) NOT NULL,
 CONSTRAINT [PK_empleado] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[vacuna]    Script Date: 21/08/2021 09:56:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[vacuna](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [nvarchar](50) NOT NULL,
	[dosis_cantidad] [tinyint] NOT NULL,
	[dosis_intervalo_dias] [tinyint] NULL,
 CONSTRAINT [PK_vacuna] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[empleado] ON 

INSERT [dbo].[empleado] ([id], [primer_nombre], [segundo_nombre], [primer_apellido], [segundo_apellido], [vacuna_id], [primera_dosis], [segunda_dosis], [puesto_laboral]) VALUES (28, N'STUART', N'ALEXANDER', N'PÉREZ', N'CARAZO', 3, CAST(N'2021-07-08' AS Date), CAST(N'2021-09-06' AS Date), N'PROGRAMADOR DE SISTEMAS')
SET IDENTITY_INSERT [dbo].[empleado] OFF
GO
SET IDENTITY_INSERT [dbo].[vacuna] ON 

INSERT [dbo].[vacuna] ([id], [nombre], [dosis_cantidad], [dosis_intervalo_dias]) VALUES (1, N'Sinopharm', 2, 28)
INSERT [dbo].[vacuna] ([id], [nombre], [dosis_cantidad], [dosis_intervalo_dias]) VALUES (2, N'AstraZeneca', 2, 56)
INSERT [dbo].[vacuna] ([id], [nombre], [dosis_cantidad], [dosis_intervalo_dias]) VALUES (3, N'Sputnik V', 2, 60)
INSERT [dbo].[vacuna] ([id], [nombre], [dosis_cantidad], [dosis_intervalo_dias]) VALUES (4, N'Pfizer', 2, 21)
INSERT [dbo].[vacuna] ([id], [nombre], [dosis_cantidad], [dosis_intervalo_dias]) VALUES (5, N'Moderna', 2, 28)
INSERT [dbo].[vacuna] ([id], [nombre], [dosis_cantidad], [dosis_intervalo_dias]) VALUES (6, N'Janssen', 1, NULL)
SET IDENTITY_INSERT [dbo].[vacuna] OFF
GO
ALTER TABLE [dbo].[empleado]  WITH CHECK ADD  CONSTRAINT [FK_empleado_vacuna1] FOREIGN KEY([vacuna_id])
REFERENCES [dbo].[vacuna] ([id])
GO
ALTER TABLE [dbo].[empleado] CHECK CONSTRAINT [FK_empleado_vacuna1]
GO
/****** Object:  Trigger [dbo].[fecha_segunda_dosis]    Script Date: 21/08/2021 09:56:45 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TRIGGER [dbo].[fecha_segunda_dosis] 
	ON [dbo].[empleado]
	FOR INSERT, UPDATE
AS
BEGIN
	UPDATE E
	SET E.segunda_dosis = 
	CASE WHEN (dosis_cantidad = 2) AND (segunda_dosis IS NULL)
	 THEN DATEADD(DAY, dosis_intervalo_dias,E.primera_dosis)
	ELSE 
	 CASE WHEN (dosis_cantidad = 1)
		THEN NULL
	 ELSE
		segunda_dosis
		END
	END
	FROM empleado E
	INNER JOIN vacuna V on E.vacuna_id = V.id
END
GO
ALTER TABLE [dbo].[empleado] ENABLE TRIGGER [fecha_segunda_dosis]
GO
USE [master]
GO
ALTER DATABASE [control_vacunacion] SET  READ_WRITE 
GO
