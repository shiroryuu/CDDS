$("#signupform").submit(function(e) {

    var form = $(this);
    $.ajax({
           type: "POST",
           url: "http://localhost/CHDD/controllers/userController.php",
           data: form.serialize(),
           success: function(data)
           {
              console.log(data);
               if(data==0){
                  alert('Success!');
                  window.location ="/CHDD/user/";
               }else if(data==1){
                  alert('Email Already exists!');
               }
               else{
                    alert('Unknown Error');
               }
           }
         });

    e.preventDefault();
});

$("#loginform").submit(function(e) {

    var form = $(this);
    $.ajax({
           type: "POST",
           url: "http://localhost/CHDD/controllers/userController.php",
           data: form.serialize(),
           success: function(data)
           {
              console.log(data);
               if(data==0){
                  alert('Email or password is incorrect!');
               }else if(data==1){
                  window.location ="/CHDD/user/";
               }else{
                    alert('Unknown Error');
               }
               
           }
         });

    e.preventDefault();
});

$("#Userform").submit(function(e) {

    var form = $(this);
    $.ajax({
           type: "POST",
           url: "http://localhost/CHDD/controllers/userController.php",
           data: form.serialize(),
           success: function(data)
           {
              console.log(data);
               if(data==0){
                  alert('Old Password is incorrect!');
               }else if(data==1){
                  window.location ="/CHDD/user/settings";
               }else{
                    alert('Unknown Error');
               }
               
           }
         });

    e.preventDefault();
});
