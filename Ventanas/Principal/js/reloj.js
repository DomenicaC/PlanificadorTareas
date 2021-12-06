function ActualizarHora(fecha1){
        var fecha = new Date();
        let timePieces = fecha1.split(":");
        fecha.setHours(timePieces[0],timePieces[1]);
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
