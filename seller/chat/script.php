<script type="text/javascript">
$(function() {
    $("#txtsearchcontacts").keyup(function(e) {
        if ($('#txtsearchcontacts').val() == "") {
            displaychatusers()
        } else {
            displaychatusers();
        }
    });
    displaychatusers();
});

function displaychatusers() {
    var srchprod = $("#txtsearchcontacts").val();
    $.ajax({
        type: 'POST',
        url: 'chat/class.php',
        data: 'srchprod=' + srchprod + '&form=displaychatusers',
        success: function(data) {
            $("#dsplychatusers").html(data);
        }
    })
}

function displaychats(user_id, sendtoID, usertype) {
    $("#txtmessage").val("");
    $.ajax({
        type: 'POST',
        url: 'chat/class.php',
        data: 'user_id=' + user_id + '&sendtoID=' + sendtoID + '&usertype=' + usertype + '&form=displaychats',
        success: function(data) {
            $("#dsplychats").html(data);
            $("#txtuser_id").val(user_id);
            $("#txtsendtoID").val(sendtoID);
            $("#txtadmin").val(usertype);
        }
    })

    // $.ajax ({
    //     type: 'POST',
    //     url: 'chat/class.php',
    //     data: 'id=' + id + '&user_id=' + user_id + '&form=fncupdatestatus' ,
    //     success: function(data) {
    //         // alert(data)
    //     }
    // })
}

// function sendbutton(){
//     var textmessage = $("#txtmessage").val();
//     var textuser_id = $("#txtuser_id").val();
//     var textsendtoID = $("#txtsendtoID").val();
//     var textadmin = $("#txtadmin").val();
//     if(textuser_id != ""){
//         if(textmessage != ""){
//             $.ajax ({
//                 type: 'POST',
//                 url: 'chat/class.php',
//                 data: 'textmessage=' + textmessage + '&textuser_id=' + textuser_id + '&textsendtoID=' + textsendtoID + '&textadmin=' + textadmin + '&form=sendbutton' ,
//                 success: function(data) {
//                     displaychats(textuser_id, textsendtoID, textadmin);
//                     displaychatusers();
//                     $("#txtmessage").val("");
//                 }
//             })
//         } else{
//             alert("Please enter a message");
//         }
//     } else{
//         alert("Please select a conversation.");
//     }
// }
$('#imageAttachment').on('change', function() {
    previewImage();
});

// Function to preview the selected image
function previewImage() {
    // Get the image file
    var imageFile = $('#imageAttachment')[0].files[0];

    // Check if an image is selected
    if (imageFile) {
        // Preview the selected image
        var reader = new FileReader();
        reader.onload = function(e) {
            // Display the image preview
            $('#imagePreview').attr('src', e.target.result);
            $('#imagePreview').css('display', 'block');
        }
        reader.readAsDataURL(imageFile);
    } else {
        // If no image selected, hide the preview
        $('#imagePreview').attr('src', '');
        $('#imagePreview').css('display', 'none');
    }
}

// Function to show success message with Swal
function showSuccessMessage(message) {
    Swal.fire({
        title: 'Success!',
        text: message,
        icon: 'success',
        confirmButtonText: 'OK'
    });
}

// Function to show error message with Swal
function showErrorMessage(message) {
    Swal.fire({
        title: 'Error!',
        text: message,
        icon: 'error',
        confirmButtonText: 'OK'
    });
}

// Function to handle the send button click
function sendbutton() {
    var textMessage = $("#txtmessage").val();
    var textuser_id = $("#txtuser_id").val();
    var textSendToID = $("#txtsendtoID").val();
    var textAdmin = $("#txtadmin").val();

    // Get the image file
    var imageFile = $('#imageAttachment')[0].files[0];

    // Create FormData to send image and additional data
    var formData = new FormData();
    formData.append('textmessage', textMessage);
    formData.append('textuser_id', textuser_id);
    formData.append('textsendtoID', textSendToID);
    formData.append('textadmin', textAdmin);
    formData.append('imageFile', imageFile);
    formData.append('form', 'sendbutton');

    if (textuser_id !== "") {
        if (textMessage !== "" || imageFile !== undefined) {
            // Clear the image preview before making the AJAX request
            $('#imagePreview').attr('src', '');
            $('#imagePreview').css('display', 'none');

            $.ajax({
                type: 'POST',
                url: 'chat/class.php',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    displaychats(textuser_id, textSendToID, textAdmin);
                    displaychatusers();
                    $("#txtmessage").val("");
                    // Show success message with Swal
                    showSuccessMessage("Message sent successfully");
                },
                error: function(xhr, status, error) {
                    console.error("Error sending message:", error);
                    // Show error message with Swal
                    showErrorMessage("Failed to send message. Please try again.");
                },
                complete: function() {
                    // Clear the input value after the request completes
                    $('#imageAttachment').val('');
                }
            });
        } else {
            // Show error message with Swal
            showErrorMessage("Please enter a message or select an image");
        }
    } else {
        // Show error message with Swal
        showErrorMessage("Please select a conversation.");
    }
}
</script>