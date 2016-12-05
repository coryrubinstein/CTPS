window.CTPS =
{
    issueId: null
};



$(document).ready(function ()
{


    /*
    Leadership Toggles.........................
     */


    $('#leadReas').on('click', '.js-reason', function(e)
    {
        e.stopImmediatePropagation();
        var clickSubreasons = $(this).data('reason');
        $(this).siblings('.js-reason').toggle({effect: 'drop', speed: 'slow'});
        $('#'+clickSubreasons).toggle({effect: 'drop', speed: 'slow'});
    });


    $('#leadReas').on('click', '.js-subreason', function(e)
    {
        e.stopImmediatePropagation();
        var clickSolutions = $(this).data('subreason');
        $(this).siblings('.js-subreason').toggle({effect: 'drop', speed: 'slow'});
        $('#'+clickSolutions).toggle({effect: 'drop', speed: 'slow'});

    });


    /*
     Leadership Modal AJAX Request.........................
     */


    $('#leadReas').on('click', '.js-solution', function (e)
    {
       e.stopImmediatePropagation();
       $.ajax
       ({
           url: Routing.generate('api.ctps.solution.get', {id:$(this).data('solutions')}),
           dataType: 'json',
           contentType: 'application/json',
           type: 'GET',
           cache: false,
           success: function (data)
           {

               bootbox.alert
               ({
                   title: data.title,
                   message: data.description,
                   closeButton: false,
                   backdrop: true,
                   onEscape: true

               });
           }
       });

    });


    /*
     Front Line Toggles.........................
     */


    $('#frontReas').on('click', '.js-reason', function(e)
    {
        e.preventDefault();
        var clickSubreasons = $(this).data('reason');
        $(this).siblings('.js-reason').toggle({effect: 'drop', speed: 'slow'});
        $('#'+clickSubreasons).toggle({effect: 'drop', speed: 'slow'});
    });


    $('#frontReas').on('click', '.js-subreason', function(e)
    {
        e.stopImmediatePropagation();
        var clickSolutions = $(this).data('subreason');
        $(this).siblings('.js-subreason').toggle({effect: 'drop', speed: 'slow'});
        $('#'+clickSolutions).toggle({effect: 'drop', speed: 'slow'});
    });


    /*
     Front Line Modal AJAX Request.........................
     */

    $('#frontReas').on('click', '.js-solution', function (e)
    {
        e.stopImmediatePropagation();
        $.ajax
        ({
            url: Routing.generate('api.ctps.solution.get', {id:$(this).data('solutions')}),
            dataType: 'json',
            contentType: 'application/json',
            type: 'GET',
            cache: false,
            success: function (data)
            {

                bootbox.alert
                ({
                    title: data.title,
                    message: data.description,
                    closeButton: false,
                    backdrop: true,
                    onEscape: true

                });
            }
        });

    });


    /*
     Behavioral Toggles.........................
     */


    $('#behaveReas').on('click', '.js-reason', function(e)
    {
        e.preventDefault();
        var clickSubreasons = $(this).data('reason');
        $(this).siblings('.js-reason').toggle({effect: 'drop', speed: 'slow'});
        $('#'+clickSubreasons).toggle({effect: 'drop', speed: 'slow'});
    });


    $('#behaveReas').on('click', '.js-subreason', function(e)
    {
        e.stopImmediatePropagation();
        var clickSolutions = $(this).data('subreason');
        $(this).siblings('.js-subreason').toggle({effect: 'drop', speed: 'slow'});
        $('#'+clickSolutions).toggle({effect: 'drop', speed: 'slow'});
    });


    /*
     Behavioral Modal AJAX Request.........................
     */


    $('#behaveReas').on('click', '.js-solution', function (e)
    {
        e.stopImmediatePropagation();
        $.ajax
        ({
            url: Routing.generate('api.ctps.solution.get', {id:$(this).data('solutions')}),
            dataType: 'json',
            contentType: 'application/json',
            type: 'GET',
            cache: false,
            success: function (data)
            {

                bootbox.alert
                ({
                    title: data.title,
                    message: data.description,
                    closeButton: false,
                    backdrop: true,
                    onEscape: true

                });
            }
        });

    });



    /*
     AJAX Request.........................
     */


    $.ajax({
        url: Routing.generate('api.ctps.issue.get', {issueId:CTPS.issueId}),
        dataType: 'json',
        contentType: 'application/json',
        type: 'GET',
        cache: false,
        success: function(data)
        {
           $(data.Issue.reasons).each(function (index, value)
           {
               $('#leadership').click(function(e)
               {
                   e.stopImmediatePropagation();
                   $('.row').children().not($('#leader')).toggle('slow');
                   $('#leadReas').toggle({effect: 'drop', speed: 'slow'});
                   var trigger = $('#leader');
                   if (trigger.hasClass('expanded'))
                   {
                       trigger.removeClass('expanded');
                       trigger.animate({left: '0px'},700);

                   } else {
                       trigger.addClass('expanded');
                       trigger.animate({left: '400px'},700);
                   }

               });

               if (value.familyId == 104)
               {

                   /*
                    Leadership Reasons.........................
                    */

                   $('#leadership').text(value.family);
                   var leadReasonId = 'subReas_lead_'+value.id;
                   $('#leadReas').append('<li class="js-reason" data-reason="'+ leadReasonId +'">'+value.name+'<ul class="subreasons" id="'+ leadReasonId +'"></ul></li>');

                   /*
                   Leadership Subreasons...................
                    */

                      var leadSubReasons = value.subreasons;
                      for (i = 0; i < leadSubReasons.length; i++ )
                      {
                          $('#'+leadReasonId).append('<li class="js-subreason" type="disc" data-subreason="lead_solu_'+leadReasonId+'_'+ leadSubReasons[i].id +'">'+leadSubReasons[i].name+'<ul class="solutions" id="lead_solu_'+leadReasonId+'_'+ leadSubReasons[i].id +'"></ul></li>');

                           /*
                            Leadership Solutions...................
                            */

                          var leadSolutions = leadSubReasons[i].solutions;
                          for (x = 0; x < leadSolutions.length; x++ )
                          {
                              $('#lead_solu_'+leadReasonId+'_'+leadSubReasons[i].id).append('<li class="js-solution" type="circle" data-solutions="'+leadSolutions[x].id+'">'+leadSolutions[x].name+'</li>');


                          }

                      }
               }



               if (value.familyId == 105)
               {

                   $('#front_Line').click(function(e)
                   {
                       e.stopImmediatePropagation();
                       $('#frontReas').toggle({effect: 'drop', speed: 'slow'});
                       $('.row').children().not($('#fronter')).toggle();
                       var trigger = $('#fronter');
                       if (trigger.hasClass('expanded'))
                       {
                           trigger.removeClass('expanded');
                           trigger.animate({left: '0px'},700);

                       } else {
                           trigger.addClass('expanded');
                           trigger.animate({left: '400px'},700);
                       }
                   });

                   /*
                    Front Line Reasons.........................
                    */

                   $('#front_Line').text(value.family);
                   var frontReasonId = 'subReas_front_'+value.id;
                   $('#frontReas').append('<li class="js-reason" data-reason="'+ frontReasonId +'">'+value.name+'<ul class="subreasons" id="'+ frontReasonId +'"></ul></li>');

                   /*
                    Front Line Subreasons...................
                    */

                   var frontSubReasons = value.subreasons;
                   for (i = 0; i < frontSubReasons.length; i++ )
                   {
                       $('#'+frontReasonId).append('<li class="js-subreason" type="disc" data-subreason="front_solu_'+frontReasonId+'_'+ frontSubReasons[i].id +'">'+frontSubReasons[i].name+'<ul class="solutions" id="front_solu_'+frontReasonId+'_'+frontSubReasons[i].id +'"></ul></li>');

                       /*
                        Front Line Solutions...................
                        */

                       var frontSolutions = frontSubReasons[i].solutions;
                       for (x = 0; x < frontSolutions.length; x++ )
                       {
                           $('#front_solu_'+frontReasonId+'_'+frontSubReasons[i].id).append('<li class="js-solution" type="circle" data-solutions="'+frontSolutions[x].id+'">'+frontSolutions[x].name+'</li>');
                       }

                   }

               }

               if (value.familyId == 106)
               {

                   $('#behavioral').click(function(e)
                   {
                       e.stopImmediatePropagation();
                       $('#behaveReas').toggle({effect: 'drop', speed: 'slow'});
                       $('.row').children().not($('#behaver')).toggle('slow');
                       var trigger = $('#behaver');
                       if (trigger.hasClass('expanded'))
                       {
                           trigger.removeClass('expanded');
                           trigger.animate({left: '0px'},700);

                       } else {
                           trigger.addClass('expanded');
                           trigger.animate({left: '400px'},700);
                       }
                   });

                   /*
                    Behavioral Reasons.........................
                    */

                   $('#behavioral').text(value.family);
                   var behaveReasonId = 'subReas_behave_'+value.id;
                   $('#behaveReas').append('<li class="js-reason" data-reason="'+ behaveReasonId +'">'+value.name+'<ul class="subreasons" id="'+ behaveReasonId +'"></ul></li>');

                   /*
                    Behavioral Subreasons...................
                    */

                   var behaveSubReasons = value.subreasons;
                   for (i = 0; i < behaveSubReasons.length; i++ )
                   {
                       $('#'+behaveReasonId).append('<li class="js-subreason" type="disc" data-subreason="behave_solu_'+behaveReasonId+'_'+ behaveSubReasons[i].id +'">'+behaveSubReasons[i].name+'<ul class="solutions" id="behave_solu_'+behaveReasonId+'_'+behaveSubReasons[i].id +'"></ul></li>');

                       /*
                        Behavioral Solutions...................
                        */

                       var behaveSolutions = behaveSubReasons[i].solutions;
                       for (x = 0; x < behaveSolutions.length; x++ )
                       {
                           $('#behave_solu_'+behaveReasonId+'_'+behaveSubReasons[i].id).append('<li class="js-solution" type="circle" data-solutions="'+behaveSolutions[x].id+'">'+behaveSolutions[x].name+'</li>');
                       }

                   }

               }

            });

        }

    })

});