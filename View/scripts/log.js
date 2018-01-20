$(function() {

    $('#boutonValider').click(function() {
        var password = $('#mot_de_passe').val();
        var encodedPassword = sha1(password);

        var url = window.location.origin + window.location.pathname + "?section=admin";

        var form = $('<form action="' + url + '" method="post">' +
          '<input type="hidden" name="mot_de_passe" value="' + encodedPassword + '" />' +
          '</form>');
        $('body').append(form);
        form.submit();
    });

});
