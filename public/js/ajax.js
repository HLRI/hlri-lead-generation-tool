$('#btn-form-tools').click(function () {

    $('#errors').addClass('d-none');
    $('#errors').html('');

    $('#loading').removeClass('d-none');
    var name = $('#name').val();
    var url = $('#url').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "store",
        data: {
            "name": name,
            "url": url,
        },
        type: "POST",
        success: function (result) {
            $('#loading').addClass('d-none');
            if (result.error) {
                $('#errors').removeClass('d-none');
                $.each(result.error, function (i, err) {
                    $('<div>', {
                        class: 'error',
                    }).appendTo('#errors').text(err);
                });
            } else {
                if (result.status == 'SUCCESS') {
                    $('#code').html('&lt;script src=&quot;'+result.url+'&quot;&gt;&lt;/script&gt;');
                    hljs.highlightAll();
                    $('#name').val('');
                    $('#url').val('');
                }
            }
        }
    });
});