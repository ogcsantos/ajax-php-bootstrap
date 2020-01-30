$(function () {

    function alert(func, type, message = null) {

        let alertCard = $(document.getElementById("alert-card"));
        let alertType = $(document.getElementById('alert-card').getElementsByClassName('toast-type'));
        let alertBody = $(document.getElementById('alert-card').getElementsByClassName('toast-body'));

        switch (func) {
            case 'add':
                switch (type) {
                    case 'success':
                        alertCard.css('display', 'block');
                        alertType.html('SUCCESS');
                        alertBody.html(message);
                        break;
                    case 'error':
                        alertCard.css('display', 'block');
                        alertType.html('ERROR');
                        alertBody.html(message);
                        break;
                    default:
                        alertCard.css('display', 'block');
                        alertType.html('INFORMATION');
                        alertBody.html(message);
                        break;
                }
                break;

            case 'remove':
                alertCard.css('display', 'none');
                break;
        }

    }

    $("button#notification").on("click", function (e) {
        e.preventDefault();

        let button = $(this);
        let name = $(this).attr('notification_name');

        button.prop('disabled', true).removeClass('btn-danger').addClass('btn-warning').html('checking...');

        setTimeout(() => {
            $.ajax({
                url: 'assets/api/Notification.php',
                type: 'POST',
                dataType: 'JSON',
                data: { 'name': name },
                complete: function (e) {
                    console.clear();
                    console.log(e.responseText);

                    let result = JSON.parse(e.responseText);
                    let status = result.response;
                    let message = result.message;

                    switch (status) {
                        case 'ok':
                            alert('add', 'success', message);
                            button.prop('disabled', true).removeClass('btn-warning').removeClass('btn-danger').addClass('btn-success').html('redirecting...');
                            setTimeout(() => {
                                location.reload();
                            }, 2000);
                            break;

                        case 'error':
                            alert('add', 'error', message);
                            setInterval(() => {
                                alert('remove');
                            }, 2000);
                            button.prop('disabled', false).addClass('btn-danger').html('try again');
                            break;

                        default:
                            alert('add', 'info', message);
                            setInterval(() => {
                                alert('remove');
                            }, 2000);
                            button.prop('disabled', false);
                            break;
                    }
                }
            });
        }, 2000);

        return false;
    });

    $("form#notification").on("submit", function (e) {
        e.preventDefault();

        let button = $("button[type=\"submit\"]", this);
        let input = $("input", this);
        let formSerialize = $(this).serialize();

        input.prop('disabled', true);
        button.prop('disabled', true).removeClass('btn-danger').addClass('btn-warning').html('checking...');

        setTimeout(() => {
            $.ajax({
                url: 'assets/api/Notification.php',
                type: 'POST',
                dataType: 'JSON',
                data: formSerialize,
                complete: function (e) {
                    console.clear();
                    console.log(e.responseText);

                    let result = JSON.parse(e.responseText);
                    let status = result.response;
                    let message = result.message;

                    switch (status) {
                        case 'ok':
                            alert('add', 'success', message);
                            input.prop('disabled', true);
                            button.prop('disabled', true).removeClass('btn-warning').removeClass('btn-danger').addClass('btn-success').html('redirecting...');
                            setInterval(() => {
                                location.reload();
                            }, 2000);
                            break;

                        case 'error':
                            alert('add', 'error', message);
                            setInterval(() => {
                                alert('remove');
                            }, 2000);
                            input.prop('disabled', false);
                            button.prop('disabled', false).addClass('btn-danger').html('try again');
                            break;

                        default:
                            alert('add', 'info', message);
                            setInterval(() => {
                                alert('remove');
                            }, 2000);
                            input.prop('disabled', false);
                            button.prop('disabled', false);
                            break;
                    }
                }
            });
        }, 2000);

        return false;
    });
});