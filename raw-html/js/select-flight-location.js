jQuery(document).ready(function(a){"use strict";function c(a,b){var c=a.replace(new RegExp(b+"(?!([^<]+)?>)","gi"),'<span class="highlight">$&</span>');return c}var b=!1;a(".custom-flight-location").each(function(){var d=a(this),e=d.closest(".st-flight-wrapper");a(this).keyup(function(f){b=d,e.find(".st-location-id").remove();var g=d.attr("data-name"),h=d.val();h.length>=2&&a.ajax({jsonp:"cb",url:"http://picker.dohop.com/search/?lang=en&sid=completer",dataType:"jsonp",data:{m:10,input:h}}).done(function(b){if("object"==typeof b){var f="";f+='<select name="'+g+'" class="st-location-id st-hidden" tabindex="-1">';for(var i=b.standard.length-1;i>=0;i--)f+='<option value="'+b.standard[i].ac+'">'+b.standard[i].p+" ("+b.standard[i].ac+"), "+b.standard[i].c+"</option>";f+="</select>",e.find(".st-location-id").remove(),e.append(f),f="",a("select option",e).prop("selected",!1),a("select option",e).each(function(b,d){var e=a(this).data("country"),g=a(this).text(),i=g.split("||");i=i[0];var j=c(g,h);if(j.indexOf("</span>")>=0){var k=a(this).parent("select").attr("data-current-country");"undefined"!=typeof k&&""!=k?e==k&&(f+='<div data-text="'+g+'" data-country="'+e+'" data-value="'+a(this).val()+'" class="option"><span class="label"><a href="#">'+i+'<i class="fa fa-map-marker"></i></a></div>'):f+='<div data-text="'+g+'" data-country="'+e+'" data-value="'+a(this).val()+'" class="option"><span class="label"><a href="#">'+i+'<i class="fa fa-map-marker"></i></a></div>'}}),a(".option-wrapper").html(f).show(),d.caculatePosition(a(".option-wrapper"),d)}}).fail(function(a){}).always(function(){})}),d.caculatePosition=function(){if(b&&b.length){var c=a(".option-wrapper"),d=b,f=e.offset(),g=f.top+e.height(),h=f.left,i=d.outerWidth(),j=0;j=a("#wpadminbar").length&&a(window).width()>=783?a("#wpadminbar").height():0,g-=j;var k=99999,l="absolute";a("#search-dialog").length&&(l="fixed",g=g+j-a(window).scrollTop(),k=99999),c.css({position:l,top:g,left:h,width:i,"z-index":k})}},a(window).resize(function(){d.caculatePosition()})});var d="";a('.input-daterange input[name="dd1"]').each(function(){var b=a(this).closest("form");a(this);a(this).datepicker({language:st_params.locale,autoclose:!0,todayHighlight:!0,startDate:"today",format:a("[data-date-format]").data("date-format"),weekStart:1}).on("changeDate",function(c){a(".st-flight-from").val(c.date.getDate()+"."+(c.date.getMonth()+1)+"."+c.date.getFullYear());var d=c.date;d.setDate(d.getDate()+1),a('.input-daterange input[name="dd2"]',b).datepicker("remove"),a('.input-daterange input[name="dd2"]',b).datepicker({language:st_params.locale,startDate:"+1d",format:a("[data-date-format]").data("date-format"),autoclose:!0,todayHighlight:!0,weekStart:1}),a('.input-daterange input[name="dd2"]',b).datepicker("setDates",d),a('.input-daterange input[name="dd2"]',b).datepicker("setStartDate",d)}),a('.input-daterange input[name="dd2"]',b).datepicker({language:st_params.locale,startDate:"+1d",format:a("[data-date-format]").data("date-format"),autoclose:!0,todayHighlight:!0,weekStart:1}).on("changeDate",function(b){d=b.date.getDate()+"."+(b.date.getMonth()+1)+"."+b.date.getFullYear(),a(".st-flight-to").val(b.date.getDate()+"."+(b.date.getMonth()+1)+"."+b.date.getFullYear())})}),a(".select-flight-trip").on("change",function(){0==a(this).val()?(a(".st-flight-to").remove(),d="",a('.input-daterange input[name="dd2"]').removeClass("required"),a('.input-daterange input[name="dd2"]').removeClass("error"),a('.input-daterange input[name="dd2"]').datepicker("setDate",null)):(a('.input-daterange input[name="dd2"]').addClass("required"),a(".st-flight-to-field").append('<input type="hidden" name="d2" class="st-flight-to" value="'+d+'">'))})});