function menageGame() {
    $(document).ready(function() {
        $('#showResult').click(function() {
            if ($('#play_form').valid() == true) {
                var user_result = $('#result_user').val();
                $.ajax({
                    url: '/checkWinner',
                    method: 'POST',
                    data: {
                        userResult: user_result
                    },
                    dataType: 'JSON',
                    success: function(res) {
                        $('#userResult').text(res.user);
                        $('#computerResult').text(res.computer);
                        $('#winner').text(res.winner);
                        $('#showWinner').modal('show');
                    }
                });

                $('#result_user').val('');
            }
        });
    });

}

function validateUserPlayForm() {
    $(document).ready(function() {
        $('#play_form').validate({
            errorElement: 'div',
            rules: {
                user_result: {
                    required: true,
                    number: true,
                    min: 1,
                    max: 6,
                    step: 1
                }
            },
            messages: {
                user_result: {
                    required: 'Enter your result dice game',
                    number: 'Value must be a number',
                    min: 'Enter a value greater or equal 1',
                    max: 'Enter a value smaller or equal 6'
                }
            },
            errorPlacement: function(error, element) {
                if (element.attr('name') == 'user_result') {
                    error.appendTo('.error_user_input')
                }
            }
        });
    });

}