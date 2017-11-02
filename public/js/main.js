$(document).ready(function() {
    $('#submit').prop('disabled', true);
    $("#matric_number").keyup(function() {
        var val = $("#matric_number").val();
        $("#name").val('Loading...');
        $("#department").val('Loading...');
        $("#session").val('Loading...');
        $('#submit').prop('disabled', true);
        $.ajax({
            url: "name",
            method: "GET",
            data: {mat: val},
            success: function(data){
                $("#name").val(data.name);
                $("#session").val(data.academic);
                $("#department").val(data.department);
                $("#email").val(data.email);
                $("#matric").val(data.matric);
                $('#submit').prop('disabled', false);

            } 
        });
    });
 
    
});