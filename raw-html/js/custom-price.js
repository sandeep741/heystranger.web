jQuery(function($){
    $(".btn_add_price").click(function(){
        var html = $(".data_price_html").html();
        var rand = Math.floor((Math.random() * 10000) + 1);
        html = html.replace('id="start"','id="start_'+rand+'"').replace('id="end"','id="end_'+rand+'"');
        html = html.replace("hasDatepicker","").replace("hasDatepicker","");

        $(".data_price").append(html);

        $('.st_datepicker_price').each(function(){
            $(this).datepicker();
            $(this).datepicker( "option", "dateFormat",'yy-mm-dd');
        });
    });
    $(document).on('click', '.btn_del_price', function() {
        $(this).parent().parent().remove();
    });
    $('.st_datepicker_price').each(function(){
        $(this).datepicker({ dateFormat: 'yy-mm-dd', firstDay: 1 });
    });
});