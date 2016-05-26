
$(function () {
    $('#datetimepicker12').datetimepicker({
        inline: true,
        sideBySide: true
    });
});
/*$("#datetimepicker12").datetimepicker({
    inline: true,
    sideBySide: true
    isRTL: false,
    format: 'dd.mm.yyyy hh:ii',
    autoclose:true,
    language: 'es'
});
*/
$.fn.datetimepicker.dates['es'] = {
    days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
    daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab", "Dom"],
    daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa", "Do"],
    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
};
