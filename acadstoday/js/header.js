$(function() {
    var button = $('#headerUser');
    var box = $('#headerBox');
    var form = $('#headerForm');
    button.removeAttr('href');
    button.mouseup(function(login) {
        box.toggle();
        button.toggleClass('active');
    });
    form.mouseup(function() { 
        return false;
    });
    $(this).mouseup(function(login) {
        if(!($(login.target).parent('#headerUser').length > 0)) {
            button.removeClass('active');
            box.hide();
        }
    });
});

