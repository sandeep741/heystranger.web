jQuery(document).ready(function () {

    $(".delete-record").click(function () {

        event.preventDefault()
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
                        event.preventDefault();
                        document.getElementById('delete-form-' + id).submit();
                    }
                },
                cancel: function () {
                    //$.alert('you clicked on <strong>cancel</strong>');
                },
            }
        });
    });
});