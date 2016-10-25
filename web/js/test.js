$(document).ready(function () {
    //$(document).on('load', function () {
    //
    //    var that = $(this),
    //        url = that.attr('action'),
    //        method = that.attr('method'),
    //        data = {};
    //
    //    that.find('[name]').each(function(index, value) {
    //        var that = $(this),
    //            name = that.att('name'),
    //            value = that.val();
    //
    //        data[name] = value;
    //    });
    //
    //    console.log(data);
    //
    //    return false;
    //});


    $.ajax({
        url: '/get/12',
        dataType: 'json',
        contentType: 'application/json',
        type: 'POST',
        cache: false,
        success: function(data) {
           $(data.Issue.reasons).each(function (index, value) {
               /*
                Reasons.........................
                */
               if (value.familyId == 104) {
                   $('#Leadership').text(value.family);
                   var reasonId = 'reas_lead_'+value.id;
                   $('#LeadReas').append('<li>'+value.name+'<ul id="'+ reasonId +'"></ul></li><br><br>');

                   /*
                   Subreasons...................
                    */

                      var subreasons = value.subreasons;
                      for (i = 0; i < subreasons.length; i++ ) {
                          $('#'+reasonId).append('<li>'+subreasons[i].name+'</li>');

                   }

               }

               if (value.familyId == 105) {
                   $('#Front_Line').text(value.family);
                   $('#FrontReas').append('<li>'+value.name+'</li><br><br>');

               }

               if (value.familyId == 106) {
                   $('#Behavioral').text(value.family);
                   $('#BehaveReas').append('<li>'+value.name+'</li><br><br>');

               }
            });
            //console.log(data.Issue);
           // console.log(value.name);
            //value.familyId == 104
        }

    })

});