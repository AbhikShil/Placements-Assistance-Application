$("#resumeform").submit(function(event){ 
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "submitresume.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#signupmessage").html(data);
            }
        },
        error: function(){
            $("#signupmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
        }
    
    });

});

$("#exit").click(function(){
    window.location="resume2.php";
});

//$("#cmd").click(function(){
//    window.location="abcd.php";
//});



 