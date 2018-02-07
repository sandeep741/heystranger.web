/*
 * Convert a string into a date.
 */
function convertStringToDate(stringdate)
{
    // Internet Explorer does not like dashes in dates when converting, 
    // so lets use a regular expression to get the year, month, and day 
    var DateRegex = /([^-]*)\/([^-]*)\/([^-]*)/;
    var DateRegexResult = stringdate.match(DateRegex);
    var DateResult;
    var StringDateResult = "";

    // try creating a new date in a format that both Firefox and Internet Explorer understand
    try
    {
        DateResult = new Date(DateRegexResult[1] + "/" + DateRegexResult[2] + "/" + DateRegexResult[3]);
    }
    // if there is an error, catch it and try to set the date result using a simple conversion
    catch (err)
    {
        DateResult = new Date(stringdate);
    }

    // Date formating
    StringDateResult = (DateResult.getMonth() + 1) + "/" + (DateResult.getDate()) + "/" + (DateResult.getFullYear());

    return StringDateResult;
}

function updateProgress() {
    var startDate = "01/14/2018";
    var endDate = "03/15/2018";

    var clock;

    if (startDate != "" && endDate != "") {
        var minDate = new Date(convertStringToDate(startDate));
        var today = new Date();
        var maxDate = new Date(convertStringToDate(endDate));

        var nbTotalDays = Math.floor((maxDate.getTime() - minDate.getTime()) / 86400000);
        var nbPastDays = Math.floor((today.getTime() - minDate.getTime()) / 86400000);
        var nbRemDays = Math.round((maxDate.getTime() - today.getTime()) / 1000);
        var percent = nbPastDays / nbTotalDays * 100;



        clock = $('#banner-countdown').FlipClock({
            clockFace: 'DailyCounter',
            autoStart: false,
            minimumDigits: 9,
            callbacks: {
                stop: function () {
                    console.log("Timer up");
                },
                start: function () {
                    var $days = Math.round((maxDate.getTime() - today.getTime()) / 86400000);
                    if ($days < 100) {
                        $('#banner-countdown').find(".flip").first().remove();
                    } else {
                        $('#banner-countdown').addClass("three-digits");
                    }
                }
            }
        });

        clock.setTime(nbRemDays);
        clock.setCountdown(true);
        clock.start();


    }
}
updateProgress();

$(".close-pop, .bg-blacken").click(function () {

    $(this).fadeOut();
    $(".welcome-pop-up, .bg-blacken").fadeOut();
})