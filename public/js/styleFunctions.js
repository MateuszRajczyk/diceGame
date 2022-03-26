function showModal() {
    $(document).ready(function() {
        $('#showResult').click(function() {
            $('#showWinner').modal('show');
        });
    });
}

function menageGame() {
    $(document).ready(function() {
        $('#showResult').click(function() {
            var user_result = $('#result_user').val();
            $.ajax({
                url: '/checkWinner',
                method: 'POST',
                data: {
                    userResult: user_result
                },
                dataType: 'JSON',
                success: function(res) {
                    $('#userResult').val(res.user);
                    $('#computerResult').val(res.computer);
                    $('#winner').val(res.winner);
                    $('#showWinner').modal('show');
                }
            });

            $('#result_user').val('');
        });
    });

}