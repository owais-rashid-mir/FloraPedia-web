function validateAddAdminForm() {

    var getEmail = document.getElementById("email");
    var getPw = document.getElementById("password");
    var getCpw = document.getElementById("cpassword");

    /*  Validation - Email must be of valid format.
        ex: myname@example.com
    */
    //Regular expression for email.
    var emailRegExp = /^([a-z A-Z 0-9 \.-]+)@([a-z A-Z 0-9 -]+)\.([a-z]{2,4})$/ ;
    
    if(!emailRegExp.test(getEmail.value)) {    
        alert("Please provide a valid email address. Ex: myname@example.com");
        
        /*  Marking the 'Email' field with red border 
            if the data entered by user is not valid.
         */
        getEmail.style.border = "solid 3px red";

        /*  If Email field is empty, this statement stops the onSubmit 
            from submitting the form. If this 'return' statement is not written, 
            the form will then still be submitted even if the Email field
            is empty.
            Although, it will show an alert message, the form will still be
            submitted. That's why we need to write the below 'return' statement.
        */
        return false;

    }


    /* Validation - Password must be eight characters or longer, must
       contain at least one lowercase alpahbet, one uppercase alphabet and
       at least one numeric character.
    */
    //Regular expression for Password.
    var pwRegExp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/ ;
    
    if(!pwRegExp.test(getPw.value)) {    
        alert("Password must be eight characters or longer, must contain at least one lowercase alpahbet, one uppercase alphabet and at least one numeric character.");
        
        getPw.style.border = "solid 3px red";
        return false;

    }

    //Data entered in 'Password' and 'Confirm Password' on Add Admin panel must be same.

    if(getPw.value != getCpw.value ) {
        alert("Your password does not match. Please write the same passsword in both fields.");

        getCpw.style.border = "solid 3px red";

        return false;   
    }


   
} //End of Function.