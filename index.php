<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoConciencia</title>
    <link rel="icon" href="images/logo.png" type="image/jpg">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styles/MENU.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
  </head>
  <body>
        <header class="header">
            <nav class="nav_first">
                <ul class="ul_first">
                    <li class="li_menu"><a href="MENU.html" class="menu">EcoConciencia</a><i class="fa-solid fa-seedling"></i></li>
                    <li class="buscador"><input type="text" class="input" placeholder="¿Que estás buscando?"><i class="fa-solid fa-magnifying-glass i_menu"></i></li>
                    <li class="li_menus"><i class="fa-solid fa-leaf i_menu"></i><a class="calculadora element" href="CALCULADORA.html">Calculadora</a></li>
                    <li class="li_menus"><i class="fa-solid fa-clock i_menu"></i><a class="cronometro element" href="TEMPORIZADOR.html">Temporizador</a></li>
                    <li class="li_menus"><i class="fa-solid fa-arrow-up-wide-short i_menu"></i><a class="niveles element" href="NIVELES.html">Niveles</a></li>
                    <li class="li_menus"><i class="fa-solid fa-clipboard i_menu"></i><a class="consejos element" href="CONSEJOS.html">Consejos</a></li>
                    <li class="li_menus"><i class="fa-solid fa-arrow-up-from-water-pump i_menu"></i><a class="compensaciones element" href="COMPENSACION.html">Compensaciones</a></li>
                </ul>
            </nav>
            <nav class="nav_second">
                <ul class="ul_second">
                    <?php
                    session_start();
                    if (isset($_SESSION['username'])) {
                        // Si hay una sesión iniciada, muestra el enlace al perfil, cerrar sesión y acciones sostenibles
                        echo '<li><a href="perfil.php" class="inicio element2">Mi Perfil</a></li>';
                        echo '<li><a href="cerrar_sesion.php" class="element2">Cerrar Sesión</a></li>';
                        echo '<li><a href="acciones_sostenibles.php" class="element2">Mis acciones</a></li>';
                        echo '<li><a href="acciones_totales.php" class="element2">Acciones Totales</a></li>';
                    } else {
                        // Si no hay sesión iniciada, muestra el enlace de iniciar sesión
                        echo '<li><a href="Login.php" class="inicio element2">Iniciar Sesión</a></li>';
                    }
                    ?>
                    <li><a href="CONTACTO.html" class="contacto element2">Contacto</a></li>
                    <li><a href="FAQ.html" class="faq element2">FAQ</a></li>
                    <li><a href="POLITICAS.html" class="politicas element2">Políticas</a></li>
                    <li><a href="ACERCADE.html" class="acercade element2">Acerca de nosotros</a></li>
                </ul>
            </nav>
        </header >
        <section class="section_first">
            <img src="images/nt.jpg" class="imgTitle">
            <h1 id="h1">Tu huella, tu poder:<br> 
                ¡Haz una diferencia!</h1>
            <div class="description">
                Tu huella ecológica es más que una simple medida; es tu poder para hacer una diferencia en el mundo. 
                Nuestra Calculadora de Huella Ecológica junto con nuestro temporizador de actividades son herramientas que te brindan 
                la oportunidad de explorar y comprender cómo tus 
                elecciones diarias impactan en el medio ambiente. Pero no nos detenemos ahí. Creemos que cada pequeña acción 
                cuenta, y estamos aquí para inspirarte a tomar medidas concretas para reducir tu huella ecológica. Ofrecemos 
                consejos personalizados y soluciones prácticas para que puedas comenzar a marcar la diferencia en tu vida cotidiana. 
                <br>
                Además, en un mundo donde la sostenibilidad es esencial, te conectamos con proyectos y acciones que te 
                permiten compensar tus emisiones de carbono. Desde la plantación de árboles hasta la inversión en proyectos 
                de energía renovable, te ofrecemos oportunidades para retribuir a nuestro planeta.
                <br>
                <br>
                Únete a nuestra comunidad de personas comprometidas con un futuro más verde. Juntos, podemos transformar 
                nuestro mundo, un paso a la vez. 
            </div>
        </section>
        <section class="section_second">
            <article class="articleClima">
            <img src="images/climat.png" class="imgClima">
            <div>
                <h3>Cambio Climático Global</h3><br>
                El cambio climático global se refiere al aumento constante de la temperatura promedio de la Tierra debido
                a la acumulación de gases de efecto invernadero en la atmósfera. Estos gases, como el dióxido de carbono (CO2),
                el metano (CH4) y el óxido nitroso (N2O), atrapan el calor del sol en la atmósfera, lo que provoca un calentamiento
                adicional del planeta, conocido como efecto invernadero. <br>
                Impacto: El cambio climático tiene graves consecuencias en
                todo el mundo. Esto incluye el aumento del nivel del mar debido al deshielo de los polos y glaciares, eventos climáticos 
                extremos más frecuentes como huracanes, sequías e inundaciones, y la alteración de los patrones climáticos. Estos cambios 
                afectan a la agricultura, la disponibilidad de agua dulce, la biodiversidad y la salud humana. <br>
                Causas: Las principales 
                causas del cambio climático son las actividades humanas, como la quema de combustibles fósiles para la energía y el transporte,
                la deforestación y la agricultura intensiva. Estas actividades liberan grandes cantidades de gases de efecto invernadero 
                a la atmósfera.
            </div>
            </article>
            <article class="articleBio">
            <img src="images/bio.png" class="imgBio">
            <div>
                <h3>Pérdida de Biodiversidad</h3><br>
                La pérdida de biodiversidad se refiere a la disminución de la variedad y cantidad de formas de vida en la Tierra. 
                Esto incluye la extinción de especies de plantas y animales, así como la degradación de hábitats naturales.<br>
                Impacto: La pérdida de biodiversidad afecta a los ecosistemas y tiene consecuencias para los seres humanos. Los 
                ecosistemas saludables proporcionan servicios vitales como la polinización de cultivos, la purificación del agua 
                y la regulación del clima. La pérdida de biodiversidad puede aumentar la vulnerabilidad de las comunidades humanas 
                al cambio climático y la inseguridad alimentaria.<br>
                Causas: Las principales causas de la pérdida de biodiversidad incluyen la destrucción de hábitats debido a la 
                expansión urbana, la agricultura intensiva y la tala de bosques. La contaminación, la introducción de especies 
                invasoras y la sobreexplotación de recursos también contribuyen a la pérdida de biodiversidad.
            </div>
            </article>
            <article class="articleCont">
            <img src="images/contaminacion.png" class="imgContaminacion">
            <div>
                <h3>Contaminación Ambiental</h3><br>
                La contaminación ambiental se refiere a la introducción de sustancias nocivas en el aire, agua y suelo, que pueden 
                tener efectos perjudiciales en los ecosistemas y la salud humana.<br>
                Impacto: La contaminación del aire puede causar problemas respiratorios y cardiovasculares en las personas, así 
                como dañar la vegetación y la vida silvestre. La contaminación del agua puede afectar la calidad del agua potable 
                y dañar los ecosistemas acuáticos. La contaminación del suelo puede afectar la calidad de los alimentos y los 
                cultivos.<br>
                Causas: Las fuentes de contaminación incluyen las emisiones de gases contaminantes de vehículos y fábricas, la liberación 
                de productos químicos tóxicos en cuerpos de agua y la disposición inadecuada de desechos. La contaminación plástica, 
                en particular, ha aumentado en los océanos y amenaza la vida marina
            </div>
            </article>
        </section>
        <section class="section_third" data-aos="fade-right">
            <img src="images/nt.jpg">
            <div>
                <p>
                En un mundo en constante cambio y con desafíos ambientales sin precedentes, a menudo es fácil sentirse abrumado. Pero recordemos 
                que cada uno de nosotros tiene el poder de marcar la diferencia. Cada elección que hacemos, desde cómo consumimos energía hasta 
                qué comemos y cómo nos movemos, tiene un impacto en el planeta.
                La buena noticia es que podemos ser parte de la solución. Hoy, te invitamos a tomar medidas concretas y a convertirte en un 
                agente de cambio. Nuestra Calculadora de Huella Ecológica te brinda la herramienta para comprender tu impacto ambiental y cómo 
                reducirlo. No importa si tus pasos son grandes o pequeños; cada uno cuenta.
                El cambio comienza con la conciencia y la acción. Al usar nuestra calculadora y comprometerte a reducir tu huella ecológica, 
                estás contribuyendo a la salud de nuestro planeta y al bienestar de las generaciones futuras. Únete a una comunidad de personas 
                comprometidas con la sostenibilidad y comparte tus logros, desafíos e inspiraciones.
                Estamos enfrentando una crisis ambiental, pero también estamos en un momento de oportunidad. Juntos, podemos marcar la diferencia 
                y crear un futuro más verde, más saludable y más sostenible. ¿Estás listo para asumir el desafío? ¡Actúa ahora y marca 
                la diferencia!"
                </p>
            </div>
            <a href="CALCULADORA.html" class="empezar_button">QUIERO APORTAR</a>
        </section>
        <footer class="footer">
            <img src="images/logo.png" class="logo_footer">
            <p>© 2023 EcoConciencia</p>
            <a href="#top">Desplazar hacia arriba</a>
        </footer>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
        duration: 800,
        once: true
    });
  </script>
  <script src="styles/MENU.js"></script>
  </body>
</html>