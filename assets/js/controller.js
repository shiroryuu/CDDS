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
                  alert('Email Already exists!');
               }else{
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
                  alert('Email does not exists!');
               }else{
                    alert('Unknown Error');
               }
               
           }
         });

    e.preventDefault();
});