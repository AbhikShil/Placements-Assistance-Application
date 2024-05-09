$(function(){
    var activeNote = 0;
    var editMode = false;
    $.ajax({
        url: "loadcandidate.php",
        success: function (data){
            $('#notes').html(data);
            clickonNote();
        },
        error: function(){
            $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                    $("#alert").fadeIn();
        }
    
    });
});
$("#exit").click(function(){
        window.location="mainloginpage.php"
    
    });
function clickonNote(){              
            $(".noteheader").click(function(){
                var datapost = $(this);
                $.ajax({
                    url: "resumedownload.php",
                    type:"POST",
                    data: {id:datapost.attr("id")},
                    success: function(){
                        window.open('http://abhikshil.host20.uk/Placements%20App/resumedownload.php', '_blank');
                    },
                    error: function(){
                        $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                        $("#alert").fadeIn();
                    }    
                });
            
        });
    }