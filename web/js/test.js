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
               if (value.familyId == 104) {
                   console.log(value.name);
               }
            });
            //console.log(data.Issue);
           // console.log(value.name);
            //value.familyId == 104
        }

    })

});