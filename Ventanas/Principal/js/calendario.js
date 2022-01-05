//Arrays de datos:
meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
lasemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"]
diassemana = ["lun", "mar", "mié", "jue", "vie", "sáb", "dom"];
diaseleccion = [];
//Tras cargarse la página ...
window.onload = function () {
    //fecha actual
    hoy = new Date(); //objeto fecha actual
    diasemhoy = hoy.getDay(); //dia semana actual
    diahoy = hoy.getDate(); //dia mes actual

    if (diahoy == 1) {
        diahoy = 01;
    } else if (diahoy == 2) {
        diahoy = 02;
    } else if (diahoy == 3) {
        diahoy = 03;
    } else if (diahoy == 4) {
        diahoy = 04;
    } else if (diahoy == 5) {
        diahoy = 05;
    } else if (diahoy == 6) {
        diahoy = 06;
    } else if (diahoy == 7) {
        diahoy = 08;
    } else if (diahoy == 8) {
        diahoy = 08;
    } else if (diahoy == 9) {
        diahoy = 09;
    }

    meshoy = hoy.getMonth(); //mes actual

    if (meshoy == 1) {
        meshoy = 01;
    } else if (meshoy == 2) {
        meshoy = 02;
    } else if (meshoy == 3) {
        meshoy = 03;
    } else if (meshoy == 4) {
        meshoy = 04;
    } else if (meshoy == 5) {
        meshoy = 05;
    } else if (meshoy == 6) {
        meshoy = 06;
    } else if (meshoy == 7) {
        meshoy = 08;
    } else if (meshoy == 8) {
        meshoy = 08;
    } else if (meshoy == 9) {
        meshoy = 09;
    }

    annohoy = hoy.getFullYear(); //año actual
    // Elementos del DOM: en cabecera de calendario 
    tit = document.getElementById("titulos"); //cabecera del calendario
    ant = document.getElementById("anterior"); //mes anterior
    pos = document.getElementById("posterior"); //mes posterior
    // Elementos del DOM en primera fila
    f0 = document.getElementById("fila0");
    //Pie de calendario
    pie = document.getElementById("fechaactual");
    pie.innerHTML += lasemana[diasemhoy] + ", " + diahoy + " de " + meses[meshoy] + " de " + annohoy;
    //formulario: datos iniciales:
    document.buscar.buscaanno.value = annohoy;
    // Definir elementos iniciales:
    mescal = meshoy; //mes principal
    annocal = annohoy //año principal
    //iniciar calendario:
    cabecera()
    primeralinea()
    escribirdias()
}
//FUNCIONES de creación del calendario:
//cabecera del calendario
function cabecera() {
    tit.innerHTML = meses[mescal] + " de " + annocal;
    mesant = mescal - 1; //mes anterior
    mespos = mescal + 1; //mes posterior
    if (mesant < 0) {
        mesant = 11;
    }
    if (mespos > 11) {
        mespos = 0;
    }
    ant.innerHTML = meses[mesant]
    pos.innerHTML = meses[mespos]
}
//primera línea de tabla: días de la semana.
function primeralinea() {
    for (i = 0; i < 7; i++) {
        celda0 = f0.getElementsByTagName("th")[i];
        celda0.innerHTML = diassemana[i]
    }
}
//rellenar celdas con los días
function escribirdias() {
    //Buscar dia de la semana del dia 1 del mes:
    primeromes = new Date(annocal, mescal, "1") //buscar primer día del mes
    prsem = primeromes.getDay() //buscar día de la semana del día 1
    prsem--; //adaptar al calendario español (empezar por lunes)
    if (prsem == -1) {
        prsem = 6;
    }
    //buscar fecha para primera celda:
    diaprmes = primeromes.getDate()
    prcelda = diaprmes - prsem; //restar días que sobran de la semana
    empezar = primeromes.setDate(prcelda) //empezar= tiempo UNIX 1ª celda
    diames = new Date() //convertir en fecha
    diames.setTime(empezar); //diames=fecha primera celda.
    //Recorrer las celdas para escribir el día:
    for (i = 1; i < 7; i++) { //localizar fila
        fila = document.getElementById("fila" + i);
        for (j = 0; j < 7; j++) {
            midia = diames.getDate()

            if (midia == 1) {
                midia = 01;
            } else if (midia == 2) {
                midia = 02;
            } else if (midia == 3) {
                midia = 03;
            } else if (midia == 4) {
                midia = 04;
            } else if (midia == 5) {
                midia = 05;
            } else if (midia == 6) {
                midia = 06;
            } else if (midia == 7) {
                midia = 08;
            } else if (midia == 8) {
                midia = 08;
            } else if (midia == 9) {
                midia = 09;
            }

            mimes = diames.getMonth()

            if (mimes == 1) {
                mimes = 01;
            } else if (mimes == 2) {
                mimes = 02;
            } else if (mimes == 3) {
                mimes = 03;
            } else if (mimes == 4) {
                mimes = 04;
            } else if (mimes == 5) {
                mimes = 05;
            } else if (mimes == 6) {
                mimes = 06;
            } else if (mimes == 7) {
                mimes = 08;
            } else if (mimes == 8) {
                mimes = 08;
            } else if (mimes == 9) {
                mimes = 09;
            }

            mianno = diames.getFullYear()
            celda = fila.getElementsByTagName("a")[j];
            //fila.getElementsByTagName("a")[j].setAtribute("href", j);
            fecha = "" + midia + "." + (mimes + 1) + "." + mianno;
            celda.href = "http://localhost/Planificador/Ventanas/Principal/mes/mes.php?fecha=" + fecha;
            celda.innerHTML = midia;
            //console.log(diames);
            //celda.addEventListener('click',function(){seleccion(diaseleccion[i+j-1])},true);
            //Recuperar estado inicial al cambiar de mes:
            celda.style.backgroundColor = "#9bf5ff";
            celda.style.color = "#492736";
            //domingos en rojo
            if (j == 6) {
                celda.style.color = "#f11445";
            }
            //dias restantes del mes en gris
            if (mimes != mescal) {
                celda.style.color = "#a0babc";
            }
            //destacar la fecha actual
            if (mimes == meshoy && midia == diahoy && mianno == annohoy) {
                celda.style.backgroundColor = "#f0b19e";
                celda.innerHTML = "<cite title='Fecha Actual'>" + midia + "</cite>";
            }
            //pasar al siguiente día

            midia = midia + 1;
            diames.setDate(midia);
        }
    }
}
//Ver mes anterior
function mesantes() {
    nuevomes = new Date() //nuevo objeto de fecha
    primeromes--; //Restamos un día al 1 del mes visualizado
    nuevomes.setTime(primeromes) //cambiamos fecha al mes anterior 
    mescal = nuevomes.getMonth() //cambiamos las variables que usarán las funciones
    annocal = nuevomes.getFullYear()
    cabecera() //llamada a funcion de cambio de cabecera
    escribirdias() //llamada a funcion de cambio de tabla.
}
//ver mes posterior
function mesdespues() {
    nuevomes = new Date() //nuevo obejto fecha
    tiempounix = primeromes.getTime() //tiempo de primero mes visible
    tiempounix = tiempounix + (45 * 24 * 60 * 60 * 1000) //le añadimos 45 días 
    nuevomes.setTime(tiempounix) //fecha con mes posterior.
    mescal = nuevomes.getMonth() //cambiamos variables 
    annocal = nuevomes.getFullYear()
    cabecera() //escribir la cabecera 
    escribirdias() //escribir la tabla
}
//volver al mes actual
function actualizar() {
    mescal = hoy.getMonth(); //cambiar a mes actual
    annocal = hoy.getFullYear(); //cambiar a año actual 
    cabecera() //escribir la cabecera
    escribirdias() //escribir la tabla
}
//ir al mes buscado
function mifecha() {
    //Recoger dato del año en el formulario
    mianno = document.buscar.buscaanno.value;
    //recoger dato del mes en el formulario
    listameses = document.buscar.buscames;
    opciones = listameses.options;
    num = listameses.selectedIndex
    mimes = opciones[num].value;
    //Comprobar si el año está bien escrito
    if (isNaN(mianno) || mianno < 1) {
        //año mal escrito: mensaje de error
        alert("El año no es válido:\n debe ser un número mayor que 0")
    } else { //año bien escrito: ver mes en calendario:
        mife = new Date(); //nueva fecha
        mife.setMonth(mimes); //añadir mes y año a nueva fecha
        mife.setFullYear(mianno);
        mescal = mife.getMonth(); //cambiar a mes y año indicados
        annocal = mife.getFullYear();
        cabecera() //escribir cabecera
        escribirdias() //escribir tabla
    }
}

function seleccion(fecha) {
    console.log(fecha)
}

function fechaActualMes() {
    mes = document.getElementById("mes");
    diaMes = new Date();
    midia = diaMes.getDate();

    if (midia == 1) {
        midia = 01;
    } else if (midia == 2) {
        midia = 02;
    } else if (midia == 3) {
        midia = 03;
    } else if (midia == 4) {
        midia = 04;
    } else if (midia == 5) {
        midia = 05;
    } else if (midia == 6) {
        midia = 06;
    } else if (midia == 7) {
        midia = 08;
    } else if (midia == 8) {
        midia = 08;
    } else if (midia == 9) {
        midia = 09;
    }

    mimes = diaMes.getMonth();

    if (mimes == 1) {
        mimes = 01;
    } else if (mimes == 2) {
        mimes = 02;
    } else if (mimes == 3) {
        mimes = 03;
    } else if (mimes == 4) {
        mimes = 04;
    } else if (mimes == 5) {
        mimes = 05;
    } else if (mimes == 6) {
        mimes = 06;
    } else if (mimes == 7) {
        mimes = 08;
    } else if (mimes == 8) {
        mimes = 08;
    } else if (mimes == 9) {
        mimes = 09;
    }

    mianno = diaMes.getFullYear();
    fecha = "" + midia + "." + (mimes + 1) + "." + mianno;
    mes.href = "/Planificador/Ventanas/Principal/mes/mes.php?fecha=" + fecha;
}

function fechaActualPrin() {
    prin = document.getElementById("prin");
    diaMes = new Date();
    midia = diaMes.getDate();
    mimes = diaMes.getMonth();
    mianno = diaMes.getFullYear();
    fecha = "" + midia + "." + (mimes + 1) + "." + mianno;
    prin.href = "/Planificador/Ventanas/Principal/principal/principal.php?fecha=" + fecha;
}