-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2026 a las 18:47:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_mistica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorios`
--

CREATE TABLE `accesorios` (
  `id_accesorio` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `accesorios`
--

INSERT INTO `accesorios` (`id_accesorio`, `nombre`) VALUES
(34, 'amuletos de guerra'),
(37, 'anillo de ceniza'),
(18, 'anillo de protección'),
(7, 'arpa diminuta'),
(2, 'bolsa de monedas encantadas'),
(6, 'bolsita de semillas'),
(30, 'botas ligeras'),
(25, 'cadena rota'),
(3, 'capa de hollín'),
(38, 'capa de tinieblas'),
(10, 'cinturón de cuero'),
(8, 'collar de viento'),
(36, 'delantal encantado'),
(16, 'diadema de algas'),
(35, 'escoba pequeña'),
(17, 'escudo rúnico'),
(27, 'esfera solar'),
(33, 'espada diminuta'),
(15, 'frasco de agua pura'),
(19, 'frasco de rocío'),
(4, 'gema lunar'),
(24, 'hojas encantadas'),
(5, 'hoz de cobre'),
(11, 'linterna solar'),
(12, 'manto brillante'),
(29, 'mapa encantado'),
(9, 'martillo encantado'),
(22, 'martillo sagrado'),
(39, 'moneda dorada'),
(14, 'monedas ilusorias'),
(13, 'nariz falsa'),
(26, 'ojo de cristal'),
(31, 'orbe de visión'),
(20, 'piedra curativa'),
(28, 'pulsera de cobre'),
(23, 'ramita de roble'),
(32, 'runas antiguas'),
(1, 'sombrero de trébol'),
(40, 'trébol de cinco hojas'),
(21, 'yunque miniatura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blogs`
--

CREATE TABLE `blogs` (
  `id_blog` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `autor` varchar(120) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `categoria` varchar(80) DEFAULT NULL,
  `imagen_portada` varchar(255) DEFAULT NULL,
  `descripcion_corta` varchar(300) DEFAULT NULL,
  `contenido` mediumtext DEFAULT NULL,
  `popularidad` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `blogs`
--

INSERT INTO `blogs` (`id_blog`, `titulo`, `slug`, `autor`, `fecha_publicacion`, `categoria`, `imagen_portada`, `descripcion_corta`, `contenido`, `popularidad`) VALUES
(1, 'El origen secreto de los duendes irlandeses', 'origen-de-los-duendes-irlandeses', 'Maeve Ó Riordan', '2025-09-12', 'mitologia', 'https://misticshop.com/blogs/origen_duendes.png', 'Descubrí cómo los antiguos espíritus del bosque dieron origen a los duendes irlandeses modernos, qué rol cumplían en la mitología celta y por qué hoy siguen asociados a la fortuna, el oro oculto y algún que otro caos doméstico.', '<p>Cuando pensamos en duendes irlandeses, solemos imaginar pequeñas criaturas de ropa verde, sombrero de ala ancha y una sonrisa pícara que se esconde detrás de una olla de oro. Pero la historia de estas entidades mágicas es mucho más antigua y profunda que las postales turísticas o las películas de fantasía. Sus raíces se hunden en la mitología celta, en una Irlanda cubierta de bosques, niebla y relatos que se transmitían alrededor del fuego.</p>\r\n<p>En los primeros relatos orales, los duendes no eran simplemente seres juguetones: eran espíritus vinculados a la naturaleza, custodios de tesoros y guardianes de ciertos límites entre el mundo humano y el mundo invisible. Su figura condensaba respeto, temor y fascinación. No se los invocaba a la ligera, y tratar con uno de ellos implicaba entender que siempre habría un precio a pagar.</p>\r\n<h2>Los orígenes celtas: más que criaturas traviesas</h2>\r\n<p>En la tradición celta se hablaba de un pueblo antiguo y misterioso que habitaba Irlanda antes de la llegada de los humanos: los seres feéricos. Dentro de esa gran familia de criaturas mágicas, los duendes ocupaban un rol particular. No estaban tan asociados a la belleza etérea de las hadas, sino al trabajo, la artesanía y, sobre todo, a la custodia del oro y los bienes materiales.</p>\r\n<p>Se decía que muchos de estos duendes eran expertos zapateros y herreros, capaces de fabricar zapatos para las hadas, hebillas encantadas y pequeños objetos de metal con propiedades mágicas. Esta relación con el oficio manual los conectó con la prosperidad, la abundancia y, por supuesto, con los tesoros enterrados lejos de las miradas indiscretas.</p>\r\n<h2>Guardianes del oro oculto y del destino humano</h2>\r\n<p>Los viejos cuentos advierten que donde hay un arcoíris, puede haber un duende y, donde hay un duende, quizá haya una olla llena de oro. Pero alcanzar ese tesoro nunca fue tarea sencilla. El duende siempre aparece como un negociador astuto, un maestro de los acertijos y las trampas psicológicas. Puede conceder deseos, pero siempre literaliza las palabras del humano, torciendo a su favor cualquier descuido o ambigüedad.</p>\r\n<p>Por eso, en la tradición popular irlandesa, los duendes también simbolizan la importancia de la palabra, el compromiso y la claridad de intención. Tratar con un duende mal dispuesto podía significar terminar con suerte alterada, pérdidas imprevistas o pequeñas desgracias domésticas que se repetían una y otra vez.</p>\r\n<h2>Del folclore al imaginario moderno</h2>\r\n<p>Con el paso de los siglos, la figura del duende fue transformándose. La cristianización de Irlanda, la llegada de nuevas culturas y la migración de los irlandeses a otros continentes llevaron estas historias más allá de la Isla Esmeralda. En el viaje, muchos aspectos oscuros o temibles de los duendes se fueron suavizando, dando lugar a versiones más simpáticas, cercanas al juego y la celebración.</p>\r\n<p>Las fiestas como el Día de San Patricio consolidaron la imagen del duende vestido de verde, asociado a la suerte, las monedas brillantes y el humor pícaro. Sin embargo, bajo esa apariencia festiva, aún late la idea original: la de un guardián que premia a quienes respetan la naturaleza, honran los pactos y actúan con astucia y corazón valiente.</p>\r\n<h2>Duendes en tu vida cotidiana</h2>\r\n<p>Hoy, tener una figura de duende en casa no es solo un adorno: es una forma simbólica de invitar a esa energía de ingenio, trabajo constante y buena fortuna. Muchos los ubican cerca de la puerta de entrada, en estanterías con plantas o junto a pequeñas cajas de monedas, como recordatorio de que la abundancia no llega solo por suerte, sino por la combinación de esfuerzo, intuición y un toque de magia.</p>\r\n<p>Al conectarte con la historia ancestral de los duendes irlandeses, podés transformar un objeto decorativo en un pequeño altar a la prosperidad, la creatividad y la protección del hogar. Porque, al final, cada duende cuenta una historia que empezó hace siglos en los bosques de Irlanda y hoy sigue viva en tu espacio cotidiano.</p>', 87),
(2, 'Rituales de la suerte con tréboles y monedas encantadas', 'rituales-de-la-suerte', 'Finn O’Malley', '2025-09-25', 'rituales', 'https://misticshop.com/blogs/rituales_suerte.png', 'Aprendé paso a paso los rituales más antiguos de la Isla Esmeralda con tréboles, monedas encantadas y velas doradas para atraer buena fortuna, proteger tu casa y abrir caminos de abundancia en lo cotidiano.', '<p>En Irlanda, la suerte nunca fue algo completamente casual. Se la invocaba, se la honraba y, sobre todo, se la trabajaba a través de pequeños rituales que mezclaban elementos naturales, símbolos antiguos y una intención muy clara. Tréboles, monedas, velas doradas y pequeños gestos cotidianos podían convertir un día común en una jornada cargada de magia.</p>\r\n<p>En este artículo te proponemos recuperar algunos de esos rituales de la tradición irlandesa, adaptados a la vida moderna. No necesitás ser experto en magia ni tener grandes conocimientos esotéricos: solo hace falta respeto, foco y unas ganas genuinas de abrirte a nuevas oportunidades.</p>\r\n<h2>El trébol como imán de oportunidades</h2>\r\n<p>El trébol, incluso cuando tiene tres hojas, es un símbolo poderoso de equilibrio y protección. Representa la unión de cuerpo, mente y espíritu, y se lo usa desde hace siglos como amuleto para atraer buena suerte, especialmente en decisiones importantes o comienzos de etapa.</p>\r\n<h3>Ritual del trébol para nuevos comienzos</h3>\r\n<ul>\r\n  <li>Elegí un trébol (natural o representado en una lámina o amuleto) y colocalo sobre una superficie limpia.</li>\r\n  <li>Encendé una vela verde y tomá tres respiraciones profundas, visualizando la situación que querés destrabar.</li>\r\n  <li>Pasá suavemente el trébol por encima de la llama (sin quemarlo) y repetí en voz baja una afirmación de apertura, como por ejemplo: Estoy listo para recibir nuevas oportunidades.</li>\r\n  <li>Guardá el trébol en tu billetera, bolso o cerca de tu espacio de trabajo.</li>\r\n</ul>\r\n<p>Este gesto simple funciona como un ancla simbólica. Cada vez que veas el trébol, recordarás tu intención inicial y mantendrás activa la energía del ritual.</p>\r\n<h2>Monedas encantadas para la abundancia</h2>\r\n<p>Las monedas siempre estuvieron ligadas a los duendes y al oro escondido al final del arcoíris. Pero más allá del mito, en la tradición irlandesa se usaban monedas consagradas para bendecir el flujo del dinero, agradecer lo que ya se tenía y abrir caminos a nuevas formas de prosperidad.</p>\r\n<h3>Ritual de la moneda dorada</h3>\r\n<ul>\r\n  <li>Elegí una moneda que sea significativa para vos. No hace falta que sea valiosa, pero sí que te resulte especial.</li>\r\n  <li>Limpiá la moneda físicamente y, si querés, pasala por humo de sahumo suave (como lavanda o romero) para purificar su energía.</li>\r\n  <li>Colocala sobre un paño dorado o amarillo junto a una vela del mismo color.</li>\r\n  <li>Mientras la vela se consume, agradecé en voz alta por al menos tres cosas materiales que ya estén presentes en tu vida.</li>\r\n  <li>Cuando termine el ritual, guardá la moneda en un lugar fijo: puede ser una alcancía, un cofrecito o cerca de tu espacio donde manejás dinero.</li>\r\n</ul>\r\n<p>La moneda se convierte en un recordatorio de que la abundancia se construye desde la gratitud y la confianza, no desde la carencia.</p>\r\n<h2>Protección del hogar con velas y símbolos</h2>\r\n<p>Además de atraer suerte, muchos rituales irlandeses buscaban proteger la casa de energías densas, envidias o simples malas rachas. Un método clásico consistía en combinar velas, símbolos celtas y la figura del duende como guardián de la entrada.</p>\r\n<p>Podés crear tu propio ritual de protección así:</p>\r\n<ol>\r\n  <li>Ubicá una figura de duende o un amuleto irlandés cerca de la puerta principal.</li>\r\n  <li>Encendé una vela blanca y una vela verde, pidiendo mentalmente protección para quienes habitan ese espacio.</li>\r\n  <li>Visualizá cómo una luz suave se expande desde la puerta hacia el interior, limpiando y armonizando cada rincón.</li>\r\n  <li>Dejá que las velas se consuman en un lugar seguro y ventilado.</li>\r\n</ol>\r\n<h2>Traer la tradición a tu día a día</h2>\r\n<p>No hace falta vivir en Irlanda ni esperar ocasiones especiales para conectar con estos rituales. Podés incorporar pequeños gestos simbólicos en tu rutina: llevar un trébol en la billetera, usar una moneda encantada en tu altar personal o encender una vela verde cuando necesites claridad financiera.</p>\r\n<p>La magia irlandesa siempre estuvo muy cerca de la vida cotidiana. Al retomar estos rituales, recordás que la suerte no es solo cuestión de azar, sino también de intención, pequeños actos conscientes y la disposición a creer que lo extraordinario puede filtrarse en lo de todos los días.</p>', 91),
(3, 'Cómo cuidar a tu duende místico en casa', 'cuidado-de-tu-duende', 'Brigid Flynn', '2025-10-03', 'guia-practica', 'https://misticshop.com/blogs/cuidado_duende.png', 'Los duendes necesitan respeto, espacio y, sobre todo, no ser ignorados. En esta guía práctica te contamos dónde ubicarlos, qué ofrendas dejarles y qué errores evitar para mantener su energía equilibrada en casa.', '<p>Tener un duende místico en casa es invitar a la suerte, al juego y a una pizca de caos encantador. Pero, como todo guardián mágico, un duende necesita ciertos cuidados simbólicos para sentirse cómodo y colaborar con la armonía del hogar. No se trata de rituales complicados, sino de gestos sencillos que expresan respeto y atención.</p>\r\n<p>En esta guía vas a encontrar recomendaciones prácticas para elegir su lugar ideal, crear pequeñas ofrendas, entender sus señales y evitar los errores más comunes que pueden despertar su mal humor.</p>\r\n<h2>Elegir el rincón perfecto para tu duende</h2>\r\n<p>El primer paso es decidir dónde va a habitar tu duende. No es un simple objeto decorativo: es un símbolo vivo dentro de la energía de tu casa.</p>\r\n<ul>\r\n  <li><strong>Cerca de la entrada:</strong> muchos eligen ubicarlo junto a la puerta principal, como guardián de las personas que entran y salen.</li>\r\n  <li><strong>En espacios de abundancia:</strong> otro sitio clásico es cerca de una alcancía, un estante con libros importantes o una repisa donde se guardan llaves, billeteras y objetos de valor.</li>\r\n  <li><strong>Evitar lugares caóticos:</strong> no es buena idea relegarlo a un rincón desordenado, un cajón olvidado o un espacio donde se acumulan cosas rotas.</li>\r\n</ul>\r\n<p>La clave es que tu duende pueda ver el movimiento de la casa, pero también tenga un lugar estable donde se lo reconozca como presencia importante.</p>\r\n<h2>Ofrendas y pequeños gestos cotidianos</h2>\r\n<p>Los duendes, según la tradición, valoran mucho las ofrendas simbólicas. No hace falta exagerar: lo que cuenta es la intención y la constancia.</p>\r\n<h3>Ideas de ofrendas simples</h3>\r\n<ul>\r\n  <li>Monedas brillantes o pequeños objetos dorados.</li>\r\n  <li>Un vasito con agua fresca o, en ocasiones especiales, una gota de alguna bebida dulce.</li>\r\n  <li>Tréboles, hojas secas bonitas o flores pequeñas.</li>\r\n  <li>Un papelito con un agradecimiento por escrito.</li>\r\n</ul>\r\n<p>Podés renovar estas ofrendas una vez por semana, especialmente los domingos o en fechas que para vos sean importantes. Cada vez que lo hagas, agradecé mentalmente por la protección, la creatividad y las oportunidades que llegaron a tu vida.</p>\r\n<h2>Señales de que tu duende está activo</h2>\r\n<p>En el imaginario mágico, un duende que se siente ignorado o molesto puede manifestarse a través de pequeñas travesuras: cosas que se pierden y reaparecen, llaves que cambian de lugar, luces que parpadean o sensaciones de que el tiempo se estira en ciertos días.</p>\r\n<p>Lejos de asustarte, podés tomar estas señales como un recordatorio: es momento de limpiar su espacio, renovar las ofrendas o dedicarle unos minutos de atención consciente.</p>\r\n<h2>Errores comunes al convivir con un duende</h2>\r\n<p>Para evitar conflictos innecesarios, conviene tener en cuenta algunos errores habituales:</p>\r\n<ul>\r\n  <li><strong>Cambiarlo de lugar todo el tiempo:</strong> los duendes valoran la estabilidad; si lo movés sin sentido, puede incomodarse.</li>\r\n  <li><strong>Usarlo solo como decoración:</strong> ignorar su presencia simbólica debilita su rol como amuleto y guardián.</li>\r\n  <li><strong>Acumular polvo y desorden a su alrededor:</strong> un entorno descuidado transmite abandono.</li>\r\n  <li><strong>Bromas irrespetuosas:</strong> reírte de su figura de manera despectiva no es una buena idea en ningún sistema simbólico.</li>\r\n</ul>\r\n<h2>Crear un pequeño altar para tu duende</h2>\r\n<p>Si querés ir un paso más allá, podés armar un mini altar donde tu duende sea la figura central. Sumá una vela verde, una piedra que te guste, alguna planta pequeña y uno o dos símbolos de prosperidad. No hace falta que sea perfecto, solo que tenga coherencia para vos.</p>\r\n<p>De esta forma, cada vez que pases por ese rincón, vas a recordar tu conexión con la magia cotidiana, la gratitud y el juego. Tu duende se convierte, entonces, en un aliado silencioso que te ayuda a mantener vivo el encanto en medio de la rutina.</p>', 94),
(4, 'La alquimia detrás de los amuletos irlandeses', 'alquimia-de-amuletos', 'Declan Murphy', '2025-08-30', 'arte-magico', 'https://misticshop.com/blogs/amuletos_irlandeses.png', 'Los amuletos irlandeses combinan metalurgia ancestral, símbolos celtas y hechizos de protección. Descubrí cómo nacen estas joyas con alma, qué materiales potencian cada intención y cómo elegir el talismán perfecto para vos.', '<p>Los amuletos irlandeses no son simples accesorios: son pequeñas obras de alquimia cotidiana. Cada pieza combina símbolos antiguos, metales cuidadosamente elegidos y una intención clara que los convierte en talismanes de protección, suerte o transformación personal.</p>\r\n<p>Detrás de cada colgante, anillo o medallón hay una historia que empieza en los tiempos de los herreros sagrados y las druidesas que consagraban objetos bajo la luz de la luna. Hoy, esa tradición resurge en amuletos que podés llevar cerca del corazón, en tu mano o en un rincón especial de tu casa.</p>\r\n<h2>Simbolismo celta: más que diseños decorativos</h2>\r\n<p>Muchos amuletos irlandeses incorporan nudos celtas, espirales y cruces con formas entrelazadas. Estos símbolos no tenían principio ni fin, representando la continuidad de la vida, la conexión entre mundos y el equilibrio entre fuerzas opuestas.</p>\r\n<ul>\r\n  <li><strong>Nudos infinitos:</strong> asociados a la protección y a los vínculos que trascienden el tiempo y la distancia.</li>\r\n  <li><strong>Espirales:</strong> símbolos de crecimiento, evolución y viajes interiores.</li>\r\n  <li><strong>Cruces celtas:</strong> unión de lo espiritual y lo material, de la tierra con el cielo.</li>\r\n</ul>\r\n<p>Al elegir un amuleto, muchas personas se dejan guiar primero por la estética. Sin embargo, conocer el significado de estos símbolos te permite conectar de forma más profunda con la pieza que va a acompañarte día a día.</p>\r\n<h2>La elección de los materiales: metal y magia</h2>\r\n<p>En la alquimia de los amuletos, el material es tan importante como el diseño. Cada metal tiene su propia energía:</p>\r\n<ul>\r\n  <li><strong>Cobre:</strong> asociado a la circulación de la energía, la creatividad y la conexión con la tierra.</li>\r\n  <li><strong>Bronce:</strong> vinculado a la fuerza, la resiliencia y la protección en procesos de cambio.</li>\r\n  <li><strong>Plata:</strong> tradicionalmente ligada a la intuición, las emociones y los ciclos lunares.</li>\r\n  <li><strong>Oro:</strong> símbolo de abundancia, poder personal y luz interior.</li>\r\n</ul>\r\n<p>Muchos amuletos irlandeses combinan metales o los acompañan con piedras que potencian determinadas intenciones. Una espiral celta en cobre con piedra lunar, por ejemplo, puede ser ideal para quienes están transitando procesos de cambio emocional o comienzos de etapa.</p>\r\n<h2>Consagrar un amuleto: el paso alquímico final</h2>\r\n<p>Más allá del diseño y del material, lo que termina de transformar un objeto en amuleto es la consagración: ese momento en el que definís con claridad para qué lo vas a usar y lo cargás con tu propia energía.</p>\r\n<h3>Ritual simple para consagrar tu amuleto</h3>\r\n<ol>\r\n  <li>Limpialo físicamente y, si querés, pasalo por humo de sahumo suave (como salvia o romero).</li>\r\n  <li>Sostenelo entre tus manos y cerrá los ojos, respirando profundo tres veces.</li>\r\n  <li>Visualizá una luz suave rodeando el amuleto y pensá con detalle qué querés que represente: protección, claridad, valentía, abundancia.</li>\r\n  <li>Decí en voz alta una frase de intención, por ejemplo: Consagro este amuleto para que me acompañe con protección y lucidez en cada decisión que tome.</li>\r\n  <li>Usalo encima durante algunos días seguidos o colocalo en un lugar especial para que vaya sintonizando con vos.</li>\r\n</ol>\r\n<h2>Cómo elegir el talismán perfecto para vos</h2>\r\n<p>A la hora de elegir un amuleto irlandés, podés combinar intuición y conocimiento:</p>\r\n<ul>\r\n  <li>Observá cuál diseño te atrae de inmediato, sin racionalizar demasiado.</li>\r\n  <li>Leé el significado del símbolo y verificá si se alinea con lo que estás buscando en este momento de tu vida.</li>\r\n  <li>Tené en cuenta el metal y las piedras, pensando en cómo se vinculan con tu energía y tus necesidades.</li>\r\n</ul>\r\n<p>Tal vez estés atravesando una etapa en la que necesitás más coraje para tomar decisiones; en ese caso, podrías inclinarte por un amuleto con nudo celta en bronce. Si buscás protección emocional y una conexión más profunda con tu intuición, uno en plata con espiral y piedra lunar puede ser la opción ideal.</p>\r\n<h2>Un puente entre lo ancestral y lo cotidiano</h2>\r\n<p>Usar un amuleto irlandés es, en cierto modo, llevar un pedacito de historia antigua con vos. Es recordar que, desde hace siglos, las personas encontraron en estos objetos una forma de materializar sus deseos, sus miedos y sus esperanzas.</p>\r\n<p>Cuando colgás un talismán en tu cuello o lo apoyás en tu altar personal, estás tejiendo un puente entre la tradición celta y tu vida actual. Ese pequeño objeto se vuelve un recordatorio diario de que merecés protección, guía y un camino propio iluminado por la magia de quienes caminaron antes que vos.</p>', 88);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_etiquetas`
--

CREATE TABLE `blog_etiquetas` (
  `id_blog` int(10) UNSIGNED NOT NULL,
  `id_etiqueta` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `blog_etiquetas`
--

INSERT INTO `blog_etiquetas` (`id_blog`, `id_etiqueta`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(3, 9),
(4, 10),
(4, 11),
(4, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_relaciones`
--

CREATE TABLE `blog_relaciones` (
  `id_blog` int(10) UNSIGNED NOT NULL,
  `id_blog_recomendado` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `blog_relaciones`
--

INSERT INTO `blog_relaciones` (`id_blog`, `id_blog_recomendado`) VALUES
(2, 1),
(3, 2),
(4, 1),
(4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `id_carrito` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED DEFAULT NULL,
  `estado` enum('activo','pendiente','convertido','cancelado') NOT NULL DEFAULT 'activo',
  `creado_en` datetime NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carritos`
--

-- (datos de `carritos` omitidos: datos personales/transaccionales de desarrollo)

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_items`
--

CREATE TABLE `carrito_items` (
  `id_carrito` int(10) UNSIGNED NOT NULL,
  `id_duende` int(10) UNSIGNED NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `precio_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carrito_items`
--

-- (datos de `carrito_items` omitidos: datos personales/transaccionales de desarrollo)

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id_contacto` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `asunto` varchar(150) DEFAULT NULL,
  `mensaje` text NOT NULL,
  `fecha_envio` datetime NOT NULL DEFAULT current_timestamp(),
  `leido` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `duendes`
--

CREATE TABLE `duendes` (
  `id_duende` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `color_principal` varchar(60) DEFAULT NULL,
  `altura_cm` decimal(5,2) DEFAULT NULL,
  `personalidad` varchar(255) DEFAULT NULL,
  `id_rareza` tinyint(3) UNSIGNED DEFAULT NULL,
  `precio_en_oro` decimal(10,2) DEFAULT NULL,
  `efecto_magico` text DEFAULT NULL,
  `id_elemento` tinyint(3) UNSIGNED DEFAULT NULL,
  `nivel_maldad` tinyint(3) UNSIGNED DEFAULT NULL,
  `nivel_suerte` tinyint(3) UNSIGNED DEFAULT NULL,
  `origen_mitologico` varchar(150) DEFAULT NULL,
  `id_material` smallint(5) UNSIGNED DEFAULT NULL,
  `disponible` tinyint(1) DEFAULT 1,
  `fecha_creacion` date DEFAULT NULL,
  `popularidad` tinyint(3) UNSIGNED DEFAULT NULL,
  `recomendado_para` varchar(150) DEFAULT NULL,
  `advertencias` varchar(255) DEFAULT NULL,
  `imagen_url` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `duendes`
--

INSERT INTO `duendes` (`id_duende`, `nombre`, `tipo`, `color_principal`, `altura_cm`, `personalidad`, `id_rareza`, `precio_en_oro`, `efecto_magico`, `id_elemento`, `nivel_maldad`, `nivel_suerte`, `origen_mitologico`, `id_material`, `disponible`, `fecha_creacion`, `popularidad`, `recomendado_para`, `advertencias`, `imagen_url`, `descripcion`) VALUES
(1, 'Finn el Tramposo', 'duende del oro', 'verde esmeralda', 32.00, 'astuto y amante de las apuestas', 3, 120.50, 'atrae riqueza inesperada pero genera pequeños enredos financieros', 1, 4, 9, 'Colinas de Tara', 1, 1, '2025-10-06', 89, 'atraer fortuna', 'No apostar contra él durante luna nueva', 'uploads/duendes/finn-el-tramposo-6914b23b6a5f67.33029018.png', 'Finn es famoso entre los duendes por su sonrisa torcida y su habilidad para convertir un penique en fortuna... o en deuda. Quien lo posea verá dinero venir, pero también tentaciones. Ideal para quienes disfrutan del riesgo calculado.'),
(2, 'Morgra la Sombría', 'duende nocturno', 'negro carbón', 40.00, 'enigmática y silenciosa', 4, 320.00, 'otorga invisibilidad parcial durante la noche', 5, 7, 6, 'Bosques de Doolin', 2, 1, '2025-10-06', 94, 'proteger secretos', 'No pronunciar su nombre después del anochecer', 'uploads/duendes/morgra-la-sombr-ia-6914b1db756da6.35496345.png', 'Morgra camina entre las sombras y habla con los búhos. Guarda secretos antiguos y no teme al silencio. Ideal para quienes necesitan mantener su vida privada… literalmente invisible.'),
(3, 'Bram el Cosechador', 'duende del campo', 'marrón musgo', 45.00, 'trabajador y sereno', 1, 45.00, 'incrementa la fertilidad de los cultivos', 1, 1, 7, 'Tierras de Meath', 3, 1, '2025-10-06', 73, 'bendecir cosechas', 'Nunca dejarlo sin tierra bajo los pies', 'uploads/duendes/bram-el-cosechador-6914b30789cf43.00504609.png', 'Con olor a tierra húmeda y sonrisa de labrador, Bram bendice jardines y huertas. Si le ofrecés pan recién horneado, susurra fórmulas que hacen florecer hasta las piedras.'),
(4, 'Lira Danzarina', 'duende de la música', 'azul zafiro', 27.00, 'alegre y melodiosa', 2, 80.30, 'atrae alegría y elimina tensiones del hogar', 4, 2, 8, 'Cliffs of Moher', 4, 1, '2025-10-06', 92, 'armonizar ambientes', 'Evitar el silencio total, puede desaparecer', 'uploads/duendes/lira-danzarina-6914b1f3c09191.47340670.png', 'Su música no se oye con los oídos, sino con el alma. Lira toca acordes invisibles que limpian el aire de discusiones y traen risas a las cocinas.'),
(5, 'Doran el Zapatero', 'duende artesano', 'verde olivo', 38.00, 'preciso y gruñón', 1, 55.20, 'fortalece los negocios artesanales y manuales', 1, 3, 6, 'Cork', 5, 1, '2025-10-06', 68, 'artesanos y emprendedores', 'Nunca tocar sus herramientas sin permiso', 'uploads/duendes/doran-el-zapatero-6914b315d4d5e3.42514986.png', 'Doran trabaja toda la noche creando cosas pequeñas y perfectas. Si lo tratás bien, mejorará tu habilidad para fabricar o vender. Si no, tus cordones se anudarán solos.'),
(6, 'Eithne la Luminosa', 'duende de la luz', 'dorado', 29.00, 'compasiva y radiante', 4, 310.00, 'purifica el ambiente y ahuyenta energías negativas', 6, 1, 10, 'Valle de Glendalough', 1, 1, '2025-10-06', 98, 'hogares con energía pesada', 'No dejarla en lugares oscuros por largos periodos', 'uploads/duendes/eithne-la-luminosa-6914b0bac733a1.87856195.png', 'Eithne emite una luz suave incluso cuando duerme. Su sola presencia aclara pensamientos y repele la tristeza. Colocarla cerca de una ventana potencia su efecto.'),
(7, 'Seamus el Burlón', 'duende bromista', 'verde lima', 35.00, 'travieso y parlanchín', 2, 75.80, 'causa confusión divertida en reuniones', 4, 6, 5, 'Dublín', 1, 1, '2025-10-06', 84, 'fiestas y eventos', 'Puede esconder tus llaves', 'uploads/duendes/seamus-el-burl-on-6914b2b5f33577.47730308.png', 'Donde Seamus aparece, nadie se aburre. Provoca risas, confusiones y algún que otro tropiezo cómico. Perfecto para animar celebraciones o desarmar tensiones laborales.'),
(8, 'Nuala del Arroyo', 'duende acuático', 'turquesa', 28.00, 'serena y reflexiva', 3, 150.00, 'limpia las emociones y atrae claridad mental', 2, 1, 9, 'Río Shannon', 1, 1, '2025-10-06', 90, 'sanación emocional', 'No mantenerla lejos de fuentes de agua', 'uploads/duendes/nuala-del-arroyo-6914b21e8c6756.10470759.png', 'Susurra como el agua sobre piedras. Nuala trae calma a la mente inquieta y limpia el aire emocional. Un vaso de agua junto a ella amplifica su poder.'),
(9, 'Tadhg el Guardián', 'duende protector', 'gris piedra', 50.00, 'firme y silencioso', 3, 200.00, 'protege el hogar de intrusos y malos espíritus', 1, 1, 8, 'Castillo de Blarney', 1, 1, '2025-10-06', 87, 'protección del hogar', 'Debe colocarse mirando la entrada principal', 'uploads/duendes/tadhg-el-guardi-an-6914b260024fa2.24509394.png', 'Inmóvil pero vigilante, Tadhg percibe intenciones ajenas. Se dice que quien lo mire a los ojos siente una calma protectora. Colócalo frente a la puerta principal para máxima defensa.'),
(10, 'Brigid la Curandera', 'duende sanadora', 'blanco perlado', 26.00, 'tranquila y maternal', 3, 185.70, 'mejora el descanso y la energía vital', 2, 1, 10, 'Lago Corrib', 1, 1, '2025-10-06', 95, 'salud y equilibrio emocional', 'No exponer a luz directa durante eclipses', 'uploads/duendes/brigid-la-curandera-6914b145ab3f19.93470609.png', 'Brigid destila paz. Su presencia suaviza los sueños y equilibra el cuerpo. Ideal para colocar en dormitorios o consultorios de sanación.'),
(11, 'Cathal el Forjador', 'duende herrero', 'rojo cobre', 42.00, 'dedicado y fuerte', 2, 110.40, 'forja amuletos de poder y suerte duradera', 3, 2, 9, 'Montes Wicklow', 1, 1, '2025-10-06', 82, 'reforzar amuletos', 'No tocarlo con manos mojadas', 'uploads/duendes/cathal-el-forjador-69384b6cc37d47.32192734.png', 'Entre chispas diminutas, Cathal da forma a la suerte. Quienes trabajan con metales o herramientas sienten su inspiración al alcance de la mano.'),
(12, 'Aoife la Verde', 'duende del bosque', 'verde bosque', 30.00, 'pacífica y protectora de la naturaleza', 2, 95.00, 'atrae armonía ecológica y prosperidad natural', 1, 1, 8, 'Bosque de Killarney', 1, 1, '2025-10-06', 91, 'protección ambiental', 'No separarla de plantas vivas', 'uploads/duendes/aoife-la-verde-6914b20c634e94.96200217.png', 'Los pájaros parecen cantar más cerca cuando Aoife está presente. Su energía reverdece ambientes y estimula la conexión con la naturaleza.'),
(13, 'Declan el Burlado', 'duende maldito', 'gris plomo', 33.00, 'resentido pero leal', 3, 155.00, 'convierte desgracias en aprendizajes valiosos', 5, 5, 7, 'Ruinas de Cashel', 1, 1, '2025-10-06', 79, 'superar malas rachas', 'Nunca burlarse de su pasado', 'uploads/duendes/declan-el-burlado-6914b2eea24c09.11490174.png', 'Declan fue traicionado hace siglos y aún carga con su historia. Acompaña a quienes aprenden del dolor, transformando cicatrices en fortaleza.'),
(14, 'Sorcha la Centelleante', 'duende solar', 'naranja brillante', 25.00, 'optimista y vivaz', 3, 165.30, 'potencia la creatividad y el entusiasmo', 3, 1, 9, 'Montes Slieve Bloom', 1, 1, '2025-10-06', 97, 'creadores y artistas', 'No exponer a lluvias prolongadas', 'uploads/duendes/sorcha-la-centelleante-6914b0d2eb7325.66164370.png', 'Donde Sorcha pasa, la inspiración florece. Irradia entusiasmo y luz cálida. Perfecta para talleres, estudios o espacios de creación.'),
(15, 'Ruairí el Errante', 'duende viajero', 'azul marino', 37.00, 'curioso y aventurero', 2, 105.00, 'protege a los viajeros de accidentes y pérdidas', 4, 2, 9, 'Isla Achill', 1, 1, '2025-10-06', 85, 'viajeros frecuentes', 'Debe guardarse en bolsos de viaje', 'uploads/duendes/ruair-i-el-errante-6914b2a267d9e1.78858590.png', 'Amante del movimiento, Ruairí trae buena estrella en rutas largas. Protege maletas, evita desvíos y asegura regresos con historias nuevas.'),
(16, 'Maeve la de los Susurros', 'duende oracular', 'violeta oscuro', 31.00, 'misteriosa y sabia', 4, 350.00, 'revela señales ocultas y guía decisiones', 5, 3, 10, 'Cuevas de Knocknarea', 1, 1, '2025-10-06', 99, 'lecturas y adivinación', 'No interrumpir sus visiones', 'uploads/duendes/maeve-la-de-los-susurros-6914b06db5df22.61766748.png', 'Maeve habla en sueños y murmullos. Si la escuchás con calma, puede revelar lo que aún no sabés que sabés. Ideal para tarotistas y buscadores del destino.'),
(17, 'Padraig el Rojo', 'duende guerrero', 'rojo escarlata', 48.00, 'valiente y feroz', 3, 210.00, 'infunde coraje y fuerza ante desafíos', 3, 2, 8, 'Montes Mourne', 1, 1, '2025-10-06', 88, 'personas con nuevos comienzos', 'Evitar provocarlo en discusiones', 'uploads/duendes/padraig-el-rojo-6914b24e4940e5.14394643.png', 'Guardián de los valientes, Padraig brinda impulso a quienes dudan. Su espíritu guerrero fortalece la voluntad y aleja los miedos.'),
(18, 'Ciara la Dulce', 'duende doméstica', 'rosa pastel', 22.00, 'dulce y colaborativa', 1, 40.00, 'atrae armonía y unión familiar', 6, 1, 9, 'Casas de Donegal', 1, 1, '2025-10-06', 83, 'hogares y parejas', 'No dejarla sin tareas domésticas', 'uploads/duendes/ciara-la-dulce-6914b2c8e54a41.91032676.png', 'Ciara ordena más que casas: ordena corazones. Su dulzura suaviza las discusiones y fomenta la cooperación. Ideal para familias con niños o mascotas.'),
(19, 'Aedan el Oscuro', 'duende vengativo', 'negro azabache', 44.00, 'rencoroso y serio', 4, 280.00, 'devuelve el mal a quien lo envía', 5, 8, 6, 'Abadía de Clonmacnoise', 1, 1, '2025-10-06', 86, 'protección contra maldiciones', 'No usar con fines egoístas', 'uploads/duendes/aedan-el-oscuro-6914b274da9968.09225858.png', 'Aedan observa desde las sombras y equilibra la balanza. Su justicia es implacable: quien daña, recibe lo propio. Protector ideal para quienes enfrentan envidias o traiciones.'),
(20, 'Oisín el Alegre', 'duende de la fortuna', 'verde brillante', 33.00, 'optimista y generoso', 1, 1750.00, 'atrae oportunidades y buena suerte constante', 6, 1, 10, 'Praderas de Louth', 1, 1, '2025-10-06', 100, 'nuevos comienzos y negocios', 'Nunca prometerle algo y no cumplirlo', 'uploads/duendes/ois-in-el-alegre-693846d462b606.33264465.png', 'Oisín sonríe incluso bajo la lluvia. Lleva consigo la suerte pura de Irlanda. Ideal para quienes inician proyectos, negocios o aventuras de vida.'),
(22, 'duendecito', 'jodon', 'Oro', 232.00, 'no tengo la menor idea', 3, 344.00, 'prueba de efecto', 4, 1, 5, 'origen', 2, 1, '2025-11-17', 21, 'recomendacion', 'advertencia', 'uploads/duendes/duendecito-691b310df12390.02088134.png', 'descripcion ewxtensa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `duende_accesorios`
--

CREATE TABLE `duende_accesorios` (
  `id_duende` int(10) UNSIGNED NOT NULL,
  `id_accesorio` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `duende_accesorios`
--

INSERT INTO `duende_accesorios` (`id_duende`, `id_accesorio`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(4, 7),
(4, 8),
(5, 9),
(5, 10),
(6, 11),
(6, 12),
(7, 13),
(7, 14),
(8, 15),
(8, 16),
(9, 17),
(9, 18),
(10, 19),
(10, 20),
(11, 21),
(11, 22),
(12, 23),
(12, 24),
(13, 25),
(13, 26),
(14, 27),
(14, 28),
(15, 29),
(15, 30),
(16, 31),
(16, 32),
(17, 33),
(17, 34),
(18, 35),
(18, 36),
(19, 37),
(19, 38),
(20, 39),
(20, 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos`
--

CREATE TABLE `elementos` (
  `id_elemento` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `elementos`
--

INSERT INTO `elementos` (`id_elemento`, `nombre`) VALUES
(2, 'agua'),
(4, 'aire'),
(8, 'ale'),
(3, 'fuego'),
(6, 'luz'),
(5, 'sombra'),
(1, 'tierra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id_etiqueta` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id_etiqueta`, `nombre`) VALUES
(5, 'amuletos'),
(10, 'artesania'),
(12, 'duendes-artesanos'),
(8, 'espiritualidad'),
(2, 'folklore'),
(1, 'historia celta'),
(7, 'hogar'),
(3, 'irlanda antigua'),
(6, 'magia blanca'),
(11, 'metalurgia'),
(9, 'proteccion'),
(4, 'suerte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `id_material` smallint(5) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`id_material`, `nombre`) VALUES
(13, 'acero oscuro'),
(21, 'ale'),
(7, 'arcilla encantada'),
(17, 'bronce celta'),
(19, 'ceniza mágica'),
(6, 'cristal bendecido'),
(10, 'cristal de cuarzo'),
(14, 'cristal ígneo'),
(4, 'cristal sonoro'),
(15, 'cuero de hada'),
(1, 'cuero encantado'),
(11, 'hierro celta'),
(5, 'madera de fresno'),
(3, 'madera de roble'),
(12, 'madera viva'),
(16, 'obsidiana pulida'),
(20, 'oro encantado'),
(8, 'perla de río'),
(9, 'piedra lunar'),
(2, 'piedra volcánica'),
(18, 'tela bendecida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` enum('pendiente','pagado','enviado','cancelado') NOT NULL DEFAULT 'pendiente',
  `fecha_pedido` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

-- (datos de `pedidos` omitidos: datos personales/transaccionales de desarrollo)

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_items`
--

CREATE TABLE `pedido_items` (
  `id_pedido_item` int(10) UNSIGNED NOT NULL,
  `id_pedido` int(10) UNSIGNED NOT NULL,
  `id_duende` int(10) UNSIGNED NOT NULL,
  `cantidad` int(10) UNSIGNED NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedido_items`
--

-- (datos de `pedido_items` omitidos: datos personales/transaccionales de desarrollo)

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rareza`
--

CREATE TABLE `rareza` (
  `id_rareza` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rareza`
--

INSERT INTO `rareza` (`id_rareza`, `nombre`) VALUES
(6, 'ale'),
(1, 'común'),
(3, 'épico'),
(4, 'legendario'),
(2, 'raro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id_seccion` int(10) UNSIGNED NOT NULL,
  `vinculo` varchar(80) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `menu` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id_seccion`, `vinculo`, `titulo`, `descripcion`, `menu`) VALUES
(1, 'inicio', 'Inicio', 'Sección principal con bienvenida, llamado a la acción y elementos mágicos animados.', 1),
(2, 'catalogo', 'Catálogo\r\n', 'Galería completa de duendes con filtros por rareza, afinidad, suerte o propósito.', 1),
(4, 'nosotros', 'Sobre Nosotros', 'Historia, misión y el mito detrás de los duendes que vendemos.', 1),
(5, 'blog', 'Crónicas', 'Artículos sobre mitología celta, rituales de suerte, leyendas y cuvinculoado de duendes.', 1),
(6, 'detalle_blog', 'Artículo del Blog', 'Vista individual de cada artículo del blog con su contenido, imágenes y comentarios.', 0),
(7, 'contacto', 'Contacto', 'Formulario para consultas, colaboraciones o adopciones mágicas personalizadas.', 1),
(8, 'carrito', 'Carrito Mágico', 'Resumen de los duendes seleccionados, con cálculo automático en monedas de oro.', 0),
(9, 'checkout', 'Finalizar Compra', 'Página de confirmación donde se elige el método de envío y pago.', 0),
(10, 'cuenta', 'Mi Cuenta', 'Zona del usuario con historial de compras, deseos y configuraciones.', 0),
(11, 'login', 'Ingresar', 'Pßgina de inicio de sesi¾n para usuarios registrados.', 0),
(12, 'registro', 'Registrarse', 'Formulario de registro para nuevos usuarios.', 0),
(13, 'logout', 'Cerrar Sesi¾n', 'Acci¾n para cerrar la sesi¾n del usuario.', 0),
(14, 'detalle_duende', 'Detalle del Duende', 'Vista detallada de un duende especÝfico con toda su informaci¾n.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones_admin`
--

CREATE TABLE `secciones_admin` (
  `id_seccion_admin` int(10) UNSIGNED NOT NULL,
  `vinculo` varchar(80) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `menu` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `secciones_admin`
--

INSERT INTO `secciones_admin` (`id_seccion_admin`, `vinculo`, `titulo`, `descripcion`, `menu`) VALUES
(1, 'inicio', 'Inicio', 'Sección principal del panel administrativo con resumen general.', 1),
(2, 'catalogo', 'Gestión de Duendes', 'Catálogo completo de duendes, permite alta, baja y modificación.', 1),
(3, 'detalle_producto', 'Detalle del Duende', 'Vista individual con información y atributos mágicos.', 0),
(5, 'blog', 'Gestión de Blogs', 'Creación y edición de artículos del blog.', 1),
(6, 'detalle_blog', 'Detalle de Blog', 'Vista interna para edición o revisión de artículos.', 0),
(7, 'contacto', 'Consultas & Mensajes', 'Gestión de contactos o mensajes recibidos.', 1),
(8, 'carrito', 'Gestión de Carritos', 'Revisión de carritos activos o abandonados.', 0),
(9, 'checkout', 'Pedidos Confirmados', 'Visualización de pedidos y estados de pago/envío.', 0),
(10, 'cuenta', 'Usuarios & Cuentas', 'Administración de cuentas registradas y permisos.', 1),
(1, 'inicio', 'Inicio', 'Sección principal del panel administrativo con resumen general.', 1),
(2, 'catalogo', 'Gestión de Duendes', 'Catálogo completo de duendes, permite alta, baja y modificación.', 1),
(3, 'detalle_producto', 'Detalle del Duende', 'Vista individual con información y atributos mágicos.', 0),
(5, 'blog', 'Gestión de Blogs', 'Creación y edición de artículos del blog.', 1),
(6, 'detalle_blog', 'Detalle de Blog', 'Vista interna para edición o revisión de artículos.', 0),
(7, 'contacto', 'Consultas & Mensajes', 'Gestión de contactos o mensajes recibidos.', 1),
(8, 'carrito', 'Gestión de Carritos', 'Revisión de carritos activos o abandonados.', 0),
(9, 'checkout', 'Pedidos Confirmados', 'Visualización de pedidos y estados de pago/envío.', 0),
(10, 'cuenta', 'Usuarios & Cuentas', 'Administración de cuentas registradas y permisos.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `rol` enum('usuario','admin') NOT NULL DEFAULT 'usuario',
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp(),
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

-- (datos de `usuarios` omitidos: el admin se crea desde variables de entorno — ver bootstrap-admin.php)

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesorios`
--
ALTER TABLE `accesorios`
  ADD PRIMARY KEY (`id_accesorio`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id_blog`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `idx_blogs_fecha` (`fecha_publicacion`),
  ADD KEY `idx_blogs_categoria` (`categoria`),
  ADD KEY `idx_blogs_popularidad` (`popularidad`);

--
-- Indices de la tabla `blog_etiquetas`
--
ALTER TABLE `blog_etiquetas`
  ADD PRIMARY KEY (`id_blog`,`id_etiqueta`),
  ADD KEY `fk_be_etiqueta` (`id_etiqueta`);

--
-- Indices de la tabla `blog_relaciones`
--
ALTER TABLE `blog_relaciones`
  ADD PRIMARY KEY (`id_blog`,`id_blog_recomendado`),
  ADD KEY `fk_br_blog_r` (`id_blog_recomendado`);

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `fk_carrito_usuario` (`id_usuario`);

--
-- Indices de la tabla `carrito_items`
--
ALTER TABLE `carrito_items`
  ADD PRIMARY KEY (`id_carrito`,`id_duende`),
  ADD KEY `fk_ci_duende` (`id_duende`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `duendes`
--
ALTER TABLE `duendes`
  ADD PRIMARY KEY (`id_duende`),
  ADD KEY `fk_duendes_material` (`id_material`),
  ADD KEY `idx_duendes_rareza` (`id_rareza`),
  ADD KEY `idx_duendes_elemento` (`id_elemento`),
  ADD KEY `idx_duendes_disponible` (`disponible`),
  ADD KEY `idx_duendes_popularidad` (`popularidad`),
  ADD KEY `idx_duendes_suerte_maldad` (`nivel_suerte`,`nivel_maldad`);

--
-- Indices de la tabla `duende_accesorios`
--
ALTER TABLE `duende_accesorios`
  ADD PRIMARY KEY (`id_duende`,`id_accesorio`),
  ADD KEY `fk_da_accesorio` (`id_accesorio`);

--
-- Indices de la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD PRIMARY KEY (`id_elemento`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id_etiqueta`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`id_material`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_pedido_usuario` (`id_usuario`);

--
-- Indices de la tabla `pedido_items`
--
ALTER TABLE `pedido_items`
  ADD PRIMARY KEY (`id_pedido_item`),
  ADD KEY `fk_pi_duende` (`id_duende`),
  ADD KEY `idx_pedido_duende` (`id_pedido`,`id_duende`);

--
-- Indices de la tabla `rareza`
--
ALTER TABLE `rareza`
  ADD PRIMARY KEY (`id_rareza`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id_seccion`),
  ADD UNIQUE KEY `vinculo` (`vinculo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `ux_usuarios_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesorios`
--
ALTER TABLE `accesorios`
  MODIFY `id_accesorio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id_blog` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id_carrito` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contacto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `duendes`
--
ALTER TABLE `duendes`
  MODIFY `id_duende` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `elementos`
--
ALTER TABLE `elementos`
  MODIFY `id_elemento` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id_etiqueta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id_material` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedido_items`
--
ALTER TABLE `pedido_items`
  MODIFY `id_pedido_item` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rareza`
--
ALTER TABLE `rareza`
  MODIFY `id_rareza` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id_seccion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `blog_etiquetas`
--
ALTER TABLE `blog_etiquetas`
  ADD CONSTRAINT `fk_be_blog` FOREIGN KEY (`id_blog`) REFERENCES `blogs` (`id_blog`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_be_etiqueta` FOREIGN KEY (`id_etiqueta`) REFERENCES `etiquetas` (`id_etiqueta`) ON DELETE CASCADE;

--
-- Filtros para la tabla `blog_relaciones`
--
ALTER TABLE `blog_relaciones`
  ADD CONSTRAINT `fk_br_blog` FOREIGN KEY (`id_blog`) REFERENCES `blogs` (`id_blog`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_br_blog_r` FOREIGN KEY (`id_blog_recomendado`) REFERENCES `blogs` (`id_blog`) ON DELETE CASCADE;

--
-- Filtros para la tabla `duendes`
--
ALTER TABLE `duendes`
  ADD CONSTRAINT `fk_duendes_elemento` FOREIGN KEY (`id_elemento`) REFERENCES `elementos` (`id_elemento`),
  ADD CONSTRAINT `fk_duendes_material` FOREIGN KEY (`id_material`) REFERENCES `materiales` (`id_material`),
  ADD CONSTRAINT `fk_duendes_rareza` FOREIGN KEY (`id_rareza`) REFERENCES `rareza` (`id_rareza`);

--
-- Filtros para la tabla `duende_accesorios`
--
ALTER TABLE `duende_accesorios`
  ADD CONSTRAINT `fk_da_accesorio` FOREIGN KEY (`id_accesorio`) REFERENCES `accesorios` (`id_accesorio`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_da_duende` FOREIGN KEY (`id_duende`) REFERENCES `duendes` (`id_duende`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
