$(document).ready(function() {
    $("#matric_number").keyup(function() {
        var val = $("#matric_number").val();
        var dept = $("select#department").val();
        var ses = $("select#session").val();

        $.ajax({
            url: "name",
            method: "GET",
            data: {mat: val, department: dept, session: ses},
            success: function(data){
                $("#name").val(data);
            } 
        });
    });

    
});