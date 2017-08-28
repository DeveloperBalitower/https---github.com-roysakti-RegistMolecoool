$(document).ready(function() {
    $('#login_page').easyResponsiveTabs({
        type: 'default', 
        width: 'auto', 
        fit: true, 
        tabidentify: 'hor_1', 
        activate: function(event) { 
            var $tab = $(this);
            var $info = $('#nested-tabInfo');
            var $name = $('span', $info);
            $name.text($tab.text());
            $info.show();
        }
    });
    $('.login').hide();
});