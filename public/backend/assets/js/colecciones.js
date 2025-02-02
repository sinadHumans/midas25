/* estados de mexico */
const catestadosMexico = [
    { id:"Aguascalientes",  nombre: "Aguascalientes" },
    { id:"Baja California",  nombre: "Baja California" },
    { id:"Baja California Sur",  nombre: "Baja California Sur" },
    { id:"Campeche",  nombre: "Campeche" },
    { id:"Chiapas",  nombre: "Chiapas" },
    { id:"Chihuahua",  nombre: "Chihuahua" },
    { id:"Ciudad de México",  nombre: "Ciudad de México" },
    { id:"Coahuila",  nombre: "Coahuila" },
    { id:"Colima",  nombre: "Colima" },
    { id: "Durango" , nombre: "Durango" },
    { id: "Estado de México" , nombre: "Estado de México" },
    { id: "Guanajuato" , nombre: "Guanajuato" },
    { id: "Guerrero" , nombre: "Guerrero" },
    { id: "Hidalgo" , nombre: "Hidalgo" },
    { id: "Jalisco" , nombre: "Jalisco" },
    { id: "Michoacán" , nombre: "Michoacán" },
    { id: "Morelos" , nombre: "Morelos" },
    { id: "Nayarit" , nombre: "Nayarit" },
    { id: "Nuevo León" , nombre: "Nuevo León" },
    { id: "Oaxaca" , nombre: "Oaxaca" },
    { id: "Puebla" , nombre: "Puebla" },
    { id: "Querétaro" , nombre: "Querétaro" },
    { id: "Quintana Roo" , nombre: "Quintana Roo" },
    { id: "San Luis Potosí" , nombre: "San Luis Potosí" },
    { id: "Sinaloa" , nombre: "Sinaloa" },
    { id: "Sonora" , nombre: "Sonora" },
    { id: "Tabasco" , nombre: "Tabasco" },
    { id: "Tamaulipas" , nombre: "Tamaulipas" },
    { id: "Tlaxcala" , nombre: "Tlaxcala" },
    { id: "Veracruz" , nombre: "Veracruz" },
    { id: "Yucatán" , nombre: "Yucatán" },
    { id: "Zacatecas", nombre: "Zacatecas" }
];
export default catestadosMexico;
/* estados civil */
const catestadosCiviles = [
    { id: "Soltero" , nombre: "Soltero" },
    { id: "Casado" , nombre: "Casado" },
    { id: "Divorciado" , nombre: "Divorciado" },
    { id: "Viudo" , nombre: "Viudo" },
    { id: "Unión libre" , nombre: "Unión libre" },
    { id: "Separado", nombre: "Separado" }
];
export default catestadosCiviles;
/* escolaridad */
const catnivelesEscolaridad = [
    { id: "Sin escolaridad" , nombre: "Sin escolaridad" },
    { id: "Primaria incompleta" , nombre: "Primaria incompleta" },
    { id: "Primaria completa" , nombre: "Primaria completa" },
    { id: "Secundaria incompleta" , nombre: "Secundaria incompleta" },
    { id: "Secundaria completa" , nombre: "Secundaria completa" },
    { id: "Preparatoria o bachillerato incompleto" , nombre: "Preparatoria o bachillerato incompleto" },
    { id: "Preparatoria o bachillerato completo" , nombre: "Preparatoria o bachillerato completo" },
    { id: "Técnico superior" , nombre: "Técnico superior" },
    { id: "Licenciatura incompleta" , nombre: "Licenciatura incompleta" },
    { id:  "Licenciatura completa" , nombre: "Licenciatura completa" },
    { id:  "Maestría incompleta" , nombre: "Maestría incompleta" },
    { id:  "Maestría completa" , nombre: "Maestría completa" },
    { id:  "Doctorado incompleto" , nombre: "Doctorado incompleto" },
    { id:  "Doctorado completo", nombre: "Doctorado completo" }
];v
export default catnivelesEscolaridad;
/* sexo */
const cattiposSexo = [
    { id: "Masculino" , nombre: "Masculino" },
    { id: "Femenino" , nombre: "Femenino" },
    { id: "No binario" , nombre: "No binario" },
    { id: "Prefiero no decirlo", nombre: "Prefiero no decirlo" }
];
export default cattiposSexo;
/* tipo de servicios  */
const servicios = [
    { id: "Estudios socio económico" , nombre: "Estudios socio económico" },
    { id: "Estudio socio laboral" , nombre: "Estudio socio laboral" },
    { id: "Consulta de demanda" , nombre: "Consulta de demanda" },
    { id: "Consulta IMSS", nombre: "Consulta IMSS" }
];
export default catservicios;
/* perdiles en el sistema */
const catperfiles = [
    { id: "Administrador" , nombre: "Administrador" },
    { id: "Coordinador" , nombre: "Coordinador" },
    { id: "Ejecutivo" , nombre: "Ejecutivo" },
    { id: "Encuestador", nombre: "Encuestador" }
    { id: "Cliente Admin", nombre: "Cliente Admin" }
    { id: "Cliente", nombre: "Cliente" }
];
export default catperfiles;
/* tipos de archivos */
const catarchivos = [
    {id="NSS", nombre:"NSS"},
    {id="CURP", nombre:"CURP"},
    {id="Cartilla", nombre:"Cartilla"},
    {id="Ife /INE", nombre:"Ife /INE"},
    {id="Pasaporte", nombre:"Pasaporte"},
    {id="Titulo Profesional", nombre:"Titulo Profesional"},
    {id="Cedula Profesional", nombre:"Cedula Profesional"},
    {id="Comprobante de domicilio", nombre:"Comprobante de domicilio"},
    {id="Comprobante de estudios", nombre:"Comprobante de estudios"},
    {id="Licencia de conducir", nombre:"Licencia de conducir"},
    {id="Carta de antecedentes no penales", nombre:"Carta de antecedentes no penales"},
    {id="Mapa", nombre:"Mapa"},
    {id="Buró de crédito", nombre:"Buró de crédito"},
    {id="Infonavit", nombre:"Infonavit"},
    {id="Aviso de privacidad", nombre:"Aviso de privacidad"},
    {id="Otro", nombre:"Otro"},
];
export default catarchivos;
/* desicion */
const catdesicion = [
    { id: "SI", nombre: "SI" },
    { id: "NO", nombre: "NO" },
];
export default catdesicion;
/* parentescos */
const catparentescosFamiliares = [
    { id: "Padre" , nombre:"Padre"  },
    { id: "Madre" , nombre:"Madre"  },
    { id: "Hijo" , nombre:"Hijo"  },
    { id: "Hija" , nombre:"Hija"  },
    { id: "Hermano" , nombre:"Hermano"  },
    { id: "Hermana" , nombre:"Hermana"  },
    { id: "Abuelo" , nombre:"Abuelo"  },
    { id: "Abuela" , nombre:"Abuela"  },
    { id: "Tío" , nombre:"Tío"  },
    { id:  "Tía" , nombre: "Tía" },
    { id:  "Primo" , nombre: "Primo" },
    { id:  "Prima" , nombre: "Prima" },
    { id:  "Sobrino" , nombre: "Sobrino" },
    { id:  "Sobrina" , nombre: "Sobrina" },
    { id:  "Nieto" , nombre: "Nieto" },
    { id:  "Nieta" , nombre: "Nieta" },
    { id:  "Padrastro" , nombre: "Padrastro" },
    { id:  "Madrastra" , nombre: "Madrastra" },
    { id:  "Hijastro" , nombre: "Hijastro" },
    { id:  "Hijastra" , nombre: "Hijastra" },
    { id:  "Conyugue" , nombre: "Conyugue" },
    { id:  "Otro", nombre: "Otro" }
];
export default catparentescosFamiliares;
/* conceptos */
const catconceptos =[
    {id="Alimentación", nombre: "Alimentación" },
    {id="Renta", nombre: "Renta" },
    {id="Agua", nombre: "Agua" },
    {id="Luz", nombre: "Luz" },
    {id="Tel./cel", nombre: "Tel./cel" },
    {id="Gas", nombre: "Gas" },
    {id="Transporte", nombre: "Transporte" },
    {id="Internet", nombre: "Internet" },
    {id="Otro", nombre: "Otro" },
];
export default catconceptos;
/* tipos de zona de vivienda */
const cattiposZonaVivienda = [
    { id: "Urbana" , nombre: "Urbana" },
    { id: "Suburbana" , nombre: "Suburbana" },
    { id: "Rural" , nombre: "Rural" },
    { id: "Industrial" , nombre: "Industrial" },
    { id: "Comercial" , nombre: "Comercial" },
    { id: "Mixta", nombre: "Mixta" }
];
export default cattiposZonaVivienda;
/* tipos de vivienda */
const cattiposVivienda = [
    { id: "Casa independiente" , nombre: "Casa independiente" },
    { id: "Departamento o piso" , nombre: "Departamento o piso" },
    { id: "Vecindad" , nombre: "Vecindad" },
    { id: "Cuarto en azotea o accesorias" , nombre: "Cuarto en azotea o accesorias" },
    { id: "Casa móvil" , nombre: "Casa móvil" },
    { id: "Refugio o albergue" , nombre: "Refugio o albergue" },
    { id: "Vivienda improvisada" , nombre: "Vivienda improvisada" },
    { id: "Otra", nombre: "Otra" }
];
export default cattiposVivienda;
/* tipos de uso de vivienda */
const cattiposTenenciaVivienda = [
    { id: 1, nombre: "Propia" },
    { id: 2, nombre: "Rentada" },
    { id: 3, nombre: "Prestada" },
    { id: 4, nombre: "En proceso de pago (hipoteca)" },
    { id: 5, nombre: "Otro" }
];
export default cattiposTenenciaVivienda;
/* estatus de candidato */
const catestatusCandidato = [
    { id="Recomendable", nombre: "Recomendable"},
    { id="Recomendable con reserva", nombre: "Recomendable con reserva"},
    { id="No recomendable", nombre: "No recomendable"},
];
export default catestatusCandidato;
/* recomendaciones tipo */
const catrecomendacionesTipo = [
    { id="Deficiente", nombre: "Deficiente"},
    { id="Regular", nombre: "Regular"},
    { id="Bueno", nombre: "Bueno"},
    { id="Excelente", nombre: "Excelente"},
];
export default catrecomendacionesTipo;
/* recomendaciones */
const catrecomendaciones = [
    { id="Si", nombre: "Si"},
    { id="Bajo Reserva", nombre: "Bajo Reserva"},
    { id="No", nombre: "No"},
];
export default catrecomendaciones;
/* tipos de aviso */
const cattipoAvisos = [
    { id: "Normal", nombre: "Normal" },
    { id: "Media", nombre: "Media" },
    { id: "Alta", nombre: "Alta" },
];
export default cattipoAvisos;
