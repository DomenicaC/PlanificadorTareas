function ActualizarHora(fecha1) {
    var fecha = new Date();
    let timePieces = fecha1.split(":");
    fecha.setHours(timePieces[0], timePieces[1]);
    //var segundos = fecha.getSeconds();
    var minutos = fecha.getMinutes();
    var horas = fecha.getHours();


    var elementoHoras = document.getElementById("pHoras");
    var elementoMinutos = document.getElementById("pMinutos");
    //var elementoSegundos = document.getElementById("pSegundos");
    var pSaludo = document.getElementById("contSaludo");

    elementoHoras.textContent = horas;
    elementoMinutos.textContent = minutos;
    //elementoSegundos.textContent = segundos;

    document.getElementById('horaFinal').disabled = false;
    if (horas >= 8 && minutos >= 1 && horas < 12) {
        pSaludo.textContent = "buenos días";
    }
    if (horas >= 12 && minutos >= 1 && horas < 19) {
        pSaludo.textContent = "buenas tardes";
    }
    if (horas >= 19 && minutos >= 1) {
        pSaludo.textContent = "buenas noches";
    }
}

//setInterval(ActualizarHora,1000);

function ActualizarHoraFinal(fecha1) {
    var fecha = new Date();
    let timePieces = fecha1.split(":");
    fecha.setHours(timePieces[0], timePieces[1]);
    //var segundos = fecha.getSeconds();
    var minutos = fecha.getMinutes();
    var horas = fecha.getHours();


    var elementoHoras = document.getElementById("pHorasF");
    var elementoMinutos = document.getElementById("pMinutosF");
    var pSaludo = document.getElementById("contSaludoF");

    //var elementoSegundos = document.getElementById("pSegundos");


    /*elementoHoras.textContent = horas;
    elementoMinutos.textContent = minutos;*/
    //elementoSegundos.textContent = segundos;
    if (this.controlarHora()) {
        elementoHoras.textContent = horas;
        elementoMinutos.textContent = minutos;
        //elementoSegundos.textContent = segundos;
    }


    if (horas >= 8 && minutos >= 1 && horas < 12) {
        pSaludo.textContent = "buenos días";
    }
    if (horas >= 12 && minutos >= 1 && horas < 19) {
        pSaludo.textContent = "buenas tardes";
    }
    if (horas >= 19 && minutos >= 1) {
        pSaludo.textContent = "buenas noches";
    }
}

function controlarHora() {
    var horaInicial = document.getElementById("horaInicio").value;
    var horaFinal = document.getElementById("horaFinal").value;
    console.log(horaFinal + " " + horaInicial);

    let hI = horaInicial.split(":");
    let hF = horaFinal.split(":");

    if (hI[0] <= hF[0]) {

        if ((hI[0] == hF[0] && hI[1] > hF[1]) || (hI[0] == hF[0] && hI[1] == hF[1])) {
            document.getElementById("pHorasF").textContent = "00";
            document.getElementById("pMinutosF").textContent = "00";
            document.getElementById("horaFinal").value = "";
            alert("A ocurrido un problema \n Puede que la hora inicial y la hora final sean las mismas \n O la hora final es menor a la hora inicial");
            return false;
        }

    } else {
        alert("La hora final es menor a la hora inicial")
        document.getElementById("pHorasF").textContent = "00";
        document.getElementById("pMinutosF").textContent = "00";
        document.getElementById("horaFinal").value = "";
        return false;
    }

    return true;
}

//setInterval(ActualizarHora,1000);