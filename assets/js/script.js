$(document).ready(function() {
    $("nav ul li a").hover(function() {
        $(this).css("color", "#ff5733");
    }, function() {
        $(this).css("color", "#fff");
    });

    $("#contactForm").submit(function(event) {
        event.preventDefault();
        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();

        if (name === "" || email === "" || message === "") {
            alert("Please fill all fields.");
        } else {
            alert("Message Sent Successfully!");
            $("#contactForm")[0].reset();
        }
    });
});
