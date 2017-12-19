jQuery(document).ready(function () {

    $(".country_id").change(function () {
        varCountryID = $(this).val();
        $('.address_city_id option').remove();
        $('.address_city_id').append(new Option("Please Select City *", ''));

        $('.state_id option').remove();
        $.ajax({
            url: '/ajax/getState',
            type: 'get',
            data: {
                varCountryID: varCountryID
            },
            headers: {
            },
            beforeSend: function () {
                $.loader("on");
            },
            success: function (response) {
                $('.state_id').append(new Option("Please Select State *", ''));
                $(response).each(function (i) {
                    $('.state_id').append(new Option(response[i].name, response[i].id));
                });
                //$(".state_id").addClass("chosen-select").change();
                //$('.state_id').trigger('chosen:updated');
            },
            complete: function () {
                $.loader("off");
            }
        });
    });

    $(".state_id").change(function () {
        varStateID = $(this).val();
        $('.address_city_id option').remove();
        $.ajax({
            url: '/ajax/getCity',
            type: 'get',
            data: {
                varStateID: varStateID
            },
            headers: {
            },
            beforeSend: function () {
                $.loader("on");
            },
            success: function (data) {
                $('.address_city_id').append(new Option("Please Select City *", ''));
                $(data).each(function (i) {
                    $('.address_city_id').append(new Option(data[i].name, data[i].id));
                });
                //$(".address_city_id").addClass("chosen-select").change();
                //$('.address_city_id').trigger('chosen:updated');
            },
           complete: function () {
                $.loader("off");
            }
        });
    });
});