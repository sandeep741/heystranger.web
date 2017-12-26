jQuery(document).ready(function () {

    $(".delete-room").click(function (e) {
        e.preventDefault()
        var id = $(this).attr('id');
        var div = $(this).parents(".parentss");
        var flag = 'room';
        $.confirm({
            title: 'Deleting Confirmation',
            content: 'Are you sure you want to Delete?',
            animation: 'scale',
            closeAnimation: 'scale',
            opacity: 0.5,
            buttons: {
                confirm: {
                    text: 'Yes, sure!',
                    btnClass: 'btn-orange',
                    action: function () {
                        e.preventDefault();
                        $.removeAjax(id, div, flag);

                    }
                },
                cancel: function () {
                    //$.alert('you clicked on <strong>cancel</strong>');
                },
            }
        });
    });

    $(".delete-venu").click(function (e) {
        e.preventDefault()
        var id = $(this).attr('v_id');
        var div = $(this).parents(".venu-parents");
        var flag = 'venu';
        $.confirm({
            title: 'Deleting Confirmation',
            content: 'Are you sure you want to Delete?',
            animation: 'scale',
            closeAnimation: 'scale',
            opacity: 0.5,
            buttons: {
                confirm: {
                    text: 'Yes, sure!',
                    btnClass: 'btn-orange',
                    action: function () {
                        e.preventDefault();
                        $.removeAjax(id, div, flag);

                    }
                },
                cancel: function () {
                    //$.alert('you clicked on <strong>cancel</strong>');
                },
            }
        });
    });

    $(".delete-confer").click(function (e) {
        e.preventDefault()
        var id = $(this).attr('c_id');
        var div = $(this).parents(".confer-parents");
        var flag = 'confer';
        $.confirm({
            title: 'Deleting Confirmation',
            content: 'Are you sure you want to Delete?',
            animation: 'scale',
            closeAnimation: 'scale',
            opacity: 0.5,
            buttons: {
                confirm: {
                    text: 'Yes, sure!',
                    btnClass: 'btn-orange',
                    action: function () {
                        e.preventDefault();
                        $.removeAjax(id, div, flag);

                    }
                },
                cancel: function () {
                    //$.alert('you clicked on <strong>cancel</strong>');
                },
            }
        });
    });

    $(".delete-surr").click(function (e) {
        e.preventDefault()
        var id = $(this).attr('su_id');
        var div = $(this).parents(".attract-parents");
        var flag = 'surr';
        $.confirm({
            title: 'Deleting Confirmation',
            content: 'Are you sure you want to Delete?',
            animation: 'scale',
            closeAnimation: 'scale',
            opacity: 0.5,
            buttons: {
                confirm: {
                    text: 'Yes, sure!',
                    btnClass: 'btn-orange',
                    action: function () {
                        e.preventDefault();
                        $.removeAjax(id, div, flag);

                    }
                },
                cancel: function () {
                    //$.alert('you clicked on <strong>cancel</strong>');
                },
            }
        });
    });

    $(".delete-offer").click(function (e) {
        e.preventDefault()
        var id = $(this).attr('off_id');
        var div = $(this).parents(".extra-parents");
        var flag = 'offer';
        $.confirm({
            title: 'Deleting Confirmation',
            content: 'Are you sure you want to Delete?',
            animation: 'scale',
            closeAnimation: 'scale',
            opacity: 0.5,
            buttons: {
                confirm: {
                    text: 'Yes, sure!',
                    btnClass: 'btn-orange',
                    action: function () {
                        e.preventDefault();
                        $.removeAjax(id, div, flag);

                    }
                },
                cancel: function () {
                    //$.alert('you clicked on <strong>cancel</strong>');
                },
            }
        });
    });

    $.removeAjax = function (id, div, flg) {

        $.ajax({
            type: 'POST',
            url: '/ajax/room-delete',
            headers: {'X-CSRF-TOKEN': csrf_token},
            data: {
                varID: id,
                flag: flg
            },

            beforeSend: function () {
                $.loader("on");
            },
            success: function (data) {
                if (data == true) {
                    //location.reload();
                    div.remove();
                }
            },
            complete: function () {
                $.loader("off");
            }
        });


    }
});