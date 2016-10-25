$(document).ready(function () {

    $.ajax({
        url: Routing.generate('api.ctps.issue.get', {issueId:12}),
        dataType: 'json',
        contentType: 'application/json',
        type: 'GET',
        cache: false,
        success: function(data) {
           $(data.Issue.reasons).each(function (index, value) {

               if (value.familyId == 104)
               {

                   /*
                    Leadership Reasons.........................
                    */

                   $('#Leadership').text(value.family);
                   var leadReasonId = 'reas_lead_'+value.id;
                   $('#LeadReas').append('<li>'+value.name+'<ul id="'+ leadReasonId +'"></ul></li><br><br>');

                   /*
                   Leadership Subreasons...................
                    */

                      var subreasons = value.subreasons;
                      for (i = 0; i < subreasons.length; i++ )
                      {
                          $('#'+leadReasonId).append('<br><li type="disc">'+subreasons[i].name+'</li>');

                      }

               }

               if (value.familyId == 105)
               {

                   /*
                    Frontline Reasons.........................
                    */

                   $('#Front_Line').text(value.family);
                   var frontReasonId = 'reas_front_'+value.id;
                   $('#FrontReas').append('<li>'+value.name+'<ul type="none" id="'+ frontReasonId + '"></ul></li><br><br>');

                   /*
                    Frontline Subreasons...................
                    */

                   var subreasons = value.subreasons;
                   for (i = 0; i < subreasons.length; i++ )
                   {
                       $('#'+frontReasonId).append('<br><li type="disc">'+subreasons[i].name+'</li>');

                   }

               }

               if (value.familyId == 106)
               {

                   /*
                    Behavioral Reasons.........................
                    */

                   $('#Behavioral').text(value.family);
                   var behaveReasonId = 'reas_behave_'+value.id;
                   $('#BehaveReas').append('<li>'+value.name+'<ul type="none" id="'+ behaveReasonId + '"></ul></li><br><br>');

                   /*
                    Behavioral Subreasons.........................
                    */

                   var subreasons = value.subreasons;
                   for (i = 0; i < subreasons.length; i++ )
                   {
                       $('#'+behaveReasonId).append('<br><li type="disc">'+subreasons[i].name+'</li>');

                   }

               }
            });
            //console.log(data.Issue);
           // console.log(value.name);
            //value.familyId == 104
        }

    })

});