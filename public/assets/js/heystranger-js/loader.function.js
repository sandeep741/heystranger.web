$.loader = function (val) {
    if (val == "on") {
        $(function () {
            $.loadingBlockShow({
                imgPath: '/assets/images/default.svg',
                text: 'jQuery Script Loading ...',
                style: {
                    position: 'fixed',
                    width: '100%',
                    height: '100%',
                    background: 'rgba(0, 0, 0, .8)',
                    left: 0,
                    top: 0,
                    zIndex: 10000
                }
            });


        });
    } else {
        setTimeout($.loadingBlockHide, 1000);
    }
};