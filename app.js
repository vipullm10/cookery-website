$('.login-btn').click(function(){
    if($('#login-password-field').val().length===0){
        alert('Error , please enter a value for password')
    }
    if($('#username-input-field').val().length===0||$('#username-input-field').val().length<3||$('#username-input-field').val().length>10){
        alert('Please enter a username between 3 to 10 characters')
    }
})


$('.sign-up-btn').click(function(){
    if($('.sign-up-password').val().length===0){
        alert('Error , please enter a value for password')
    }
    if($('.sign-up-username').val().length===0||$('.sign-up-username').val().length<3||$('.sign-up-username').val().length>10){
        alert('Please enter a username between 3 to 10 characters')
    }
})


