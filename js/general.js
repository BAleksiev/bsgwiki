$(document).ready(function() {
    $('#top_nav li').hover(function() {
        $(this).find('ul:first').addClass('active');
    }, function() {
        $(this).children('ul.active').removeClass('active');
    });
});

function changeLanguage(lang) {
    document.cookie = 'lang' + '=' + lang;
}