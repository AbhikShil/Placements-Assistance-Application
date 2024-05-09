$(function(){
    var activeNote = 0;
    var editMode = false;
    $.ajax({
        url: "loadplacements.php",
        success: function (data){
            $('#notes').html(data);
            clickonNote(); clickonDelete();
        },
        error: function(){
            $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                    $("#alert").fadeIn();
        }
    
    });
    $("#forgotpasswordform").submit(function(event){ 
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    $.ajax({
        url: "createplacements.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            
            window.location="mainloginpagenote.php";
        },
        error: function(){
            $("#forgotpasswordmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});
//    $('#addNote').click(function(){
//        $.ajax({
//            url: "createplacements.php",
//            success: function(data){
//                if(data == 'error'){
//                    $('#alertContent').text("There was an issue inserting the new note in the database!");
//                    $("#alert").fadeIn();
//                }else{
//                    activeNote = data;
//                    $("textarea").val("");
//                    showHide(["#allNotes","#notePad","#next"], ["#notes", "#addNote", "#edit", "#done"]);
//                    $("textarea").focus();
//                }
//            },
//            error: function(){
//                $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
//                    $("#alert").fadeIn();
//            }
//        });
//    });
//    $("#next").click(function(){
//            window.location="mainloginpagenote.php";
//});
//    $("textarea").keyup(function(){
//        $.ajax({
//            url: "updateplacements.php",
//            type: "POST",
//            data: {note: $(this).val(), id:activeNote},
//            success: function (data){
//                if(data == 'error'){
//                    $('#alertContent').text("There was an issue updating the note in the database!");
//                    $("#alert").fadeIn();
//                }
//            },
//            error: function(){
//                $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
//                        $("#alert").fadeIn();
//            }
//
//        });
//        
//    });
    $("#allNotes").click(function(){
        $.ajax({
            url: "loadplacements.php",
            success: function (data){
                $('#notes').html(data);
                showHide(["#addNote", "#edit", "#notes"], ["#allNotes", "#notePad"]);
                clickonNote(); clickonDelete();
            },
            error: function(){
                $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                        $("#alert").fadeIn();
            }

        });
    
    });
    $("#done").click(function(){
        editMode = false;
        $(".noteheader").removeClass("col-xs-7 col-sm-9");
        showHide(["#edit"],[this, ".delete"]);
    });
    
    $("#edit").click(function(){
        editMode = true;
        $(".noteheader").addClass("col-xs-7 col-sm-9");
        showHide(["#done", ".delete"],[this]);
    
    });
    $("#next").click(function(){
        window.location = "candidate.php"
    
    });
    

        function clickonNote(){              
            $(".noteheader").click(function(){
            if(!editMode){
                var datapost = $(this);
                $.ajax({
                    url: "clickonplace.php",
                    type:"POST",
                    data: {id:datapost.attr("id")},
                    success: function(){
                        window.location = "mainloginpagenote.php";
                    },
                    error: function(){
                        $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                        $("#alert").fadeIn();
                    }    
                });
            }
            
        });
    }
    
    function clickonDelete(){
        $(".delete").click(function(){
            var deleteButton = $(this);
            $.ajax({
                url: "deleteplacements.php",
                type: "POST",
                data: {id:deleteButton.next().attr("id")},
                success: function (data){
                    if(data == 'error'){
                        $('#alertContent').text("There was an issue delete the note from the database!");
                        $("#alert").fadeIn();
                    }else{
                        deleteButton.parent().remove();
                    }
                },
                error: function(){
                    $('#alertContent').text("There was an error with the Ajax Call. Please try again later.");
                            $("#alert").fadeIn();
                }

            });
            
        });
        
    }
    function showHide(array1, array2){
        for(i=0; i<array1.length; i++){
            $(array1[i]).show();   
        }
        for(i=0; i<array2.length; i++){
            $(array2[i]).hide();   
        }
    };
    
});