/*
	www.notas-programacion.com
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
