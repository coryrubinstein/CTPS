$(document).ready(function ()
{

    $('#leadReas').on('click', '.js-reason', function(e)
    {
        e.preventDefault();
        var clickSubreasons = $(this).data('reason');
        console.log(clickSubreasons);
        $('#'+clickSubreasons).find('ul').toggle();
    });



    $.ajax({
        url: Routing.generate('api.ctps.issue.get', {issueId:12}),
        dataType: 'json',
        contentType: 'application/json',
        type: 'GET',
        cache: false,
        success: function(data) {
           $(data.Issue.reasons).each(function (index, value)
           {
               $('#leadership').click(function(e)
               {
                   e.preventDefault();
                   $('#leadReas').show({effect: 'drop', speed: 'slow'});

               });

               if (value.familyId == 104)
               {

                   /*
                    Leadership Reasons.........................
                    */

                   $('#leadership').text(value.family);
                   var leadReasonId = 'reas_lead_'+value.id;
                   $('#leadReas').append('<li>'+value.name+'<ul data-reason="reason" class=".js-reason" id="subReas_'+ leadReasonId +'"></ul></li>');

                   /*
                   Leadership Subreasons...................
                    */

                      var leadSubReasons = value.subreasons;
                      for (i = 0; i < leadSubReasons.length; i++ )
                      {
                          $('#'+leadReasonId).append('<li class=".js-subreasons" type="disc"><ul data-subreason="subreasons">'+leadSubReasons[i].name+'</ul></li>');

                          /*
                           Leadership Solutions...................
                           */

                          var leadSolutions = leadSubReasons[i].solutions;

                          for (x = 0; x < leadSolutions.length; x++ )
                          {
                              $('#'+leadReasonId).append('<br><ul><li type="circle">'+leadSolutions[x].name+'</li></ul>');
                          }


                      }

               }



               if (value.familyId == 105)
               {

                   $('#front_Line').click(function()
                   {
                       $('#frontReas').slideDown(1550);
                   });

                   /*
                    Frontline Reasons.........................
                    */

                   $('#front_Line').text(value.family);
                   var frontReasonId = 'reas_front_'+value.id;
                   $('#frontReas').append('<li>'+value.name+'<ul type="none" id="'+ frontReasonId + '"></ul></li><br><br>');

                   /*
                    Frontline Subreasons...................
                    */

                   var frontSubreasons = value.subreasons;
                   for (i = 0; i < frontSubreasons.length; i++ )
                   {
                       $('#'+frontReasonId).append('<br><li type="disc">'+frontSubreasons[i].name+'</li>');


                       /*
                        Frontline Solutions...................
                        */

                       var frontSolutions = frontSubreasons[i].solutions;

                       for (x = 0; x < frontSolutions.length; x++ )
                       {
                           $('#'+frontReasonId).append('<br><ul><li type="circle">'+frontSolutions[x].name+'</li></ul>');
                       }


                   }

               }

               if (value.familyId == 106)
               {

                   $('#behavioral').click(function()
                   {
                       $('#behaveReas').slideDown(1550);
                   });

                   /*
                    Behavioral Reasons.........................
                    */

                   $('#behavioral').text(value.family);
                   var behaveReasonId = 'reas_behave_'+value.id;
                   $('#behaveReas').append('<li>'+value.name+'<ul type="none" id="'+ behaveReasonId + '"></ul></li><br><br>');

                   /*
                    Behavioral Subreasons.........................
                    */

                   var behaveSubreasons = value.subreasons;
                   for (i = 0; i < behaveSubreasons.length; i++ )
                   {
                       $('#'+behaveReasonId).append('<br><li type="disc">'+behaveSubreasons[i].name+'</li>');


                       /*
                        Behavioral Solutions...................
                        */

                       var behaveSolutions = behaveSubreasons[i].solutions;

                       for (x = 0; x < behaveSolutions.length; x++ )
                       {
                           $('#'+behaveReasonId).append('<br><ul><li type="circle">'+behaveSolutions[x].name+'</li></ul>');
                           // console.log(behaveSolutions[x].name);
                       }


                   }

               }

            });

        }

    })

});