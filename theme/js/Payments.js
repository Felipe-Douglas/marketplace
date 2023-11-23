$(document).ready(function () {
    $("#payment").on("submit", function(e) {
        e.preventDefault();

        var form = $(this);
        $.ajax({
            url: form.attr("action"),
            data: form.serialize(),
            type: "POST",
            success: function(callback) {
                console.log(callback);
                // console.log(result);
            }
        });

    });
});