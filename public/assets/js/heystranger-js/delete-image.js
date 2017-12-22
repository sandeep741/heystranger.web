jQuery(document).ready(function () {

    $(".delete-image").click(function (e) {
        e.preventDefault()
        var id = $(this).attr('id');

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

                        $.ajax({
                            type: 'POST',
                            url: '/ajax/accommo-image-delete',
                            headers: {'X-CSRF-TOKEN': csrf_token},
                            data: {
                                varID: id,
                            },

                            beforeSend: function () {
                                $.loader("on");
                            },
                            success: function (data) {
                                if (data == true) {
                                    location.reload();
                                }
                            },
                            complete: function () {
                                $.loader("off");
                            }
                        });
                    }
                },
                cancel: function () {
                    //$.alert('you clicked on <strong>cancel</strong>');
                },
            }
        });
    });
});