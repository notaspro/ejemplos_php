/*
<<<<<<< HEAD
	www.notas-programacion.com
=======
	www.notas.programacion.com
>>>>>>> 3341c51ca6dd63dd30a6577097e96170be4574a7
	Descripcion:
	Inicializa el control Tab de JQuery UI, el elemento 
	fichass es un control div de HTML
	
	Archivo: func_ejemplo5.js
*/
    var miPagina;
    miPagina=$(document);
    miPagina.ready(inicializarEventos);
 
    function inicializarEventos()
    {
        var capaFichas = $("#fichass");
        capaFichas.tabs({ collapsible: true });
    }
