moment.locale('es', {
    months : "Enero_Febrero_Marzo_Abril_Mayo_Junio_Julio_Agosto_Septiembre_Octubre_Noviembre_Diciembre".split("_"),
    monthsShort : "Ene_Feb_Mar_Abr_May_Jun_Jul_Ago_Sep_Oct_Nov_Dic".split("_"),
    weekdays : "Domingo_Lunes_Martes_Miércoles_Jueves_Viernes_Sábado_Domingo".split("_"),
    weekdaysShort : "Dom_Lun_Mar_Mie_Jue_Vie_Sab_Dom".split("_"),
    longDateFormat : {
        LT : "HH:mm",
        L : "DD/MM/YYYY"
    }

});


$(function () {
    var date = new Date();
    var currentDate = date.getDate();
    var currentMonth = date.getMonth();
    var currentYear = date.getFullYear();

    $('#sandbox-container').datepicker({
        format: "yyyy/mm/dd",
        maxViewMode: 2,
        language: "es",
        daysOfWeekDisabled: "0",
        todayHighlight: true,
    });
});