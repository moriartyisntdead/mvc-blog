$(function () {

    $.validator.addMethod("cyrillic", function (value, element) {
        return this.optional(element) || /[\u0400-\u04FF]/.test(value);
    }, "Введите кириллицу");

   $('#new-comment').validate({
       rules: {
          'name':{
              required: true,
              cyrillic: true
          },
           'email':{
              required: true,
               email: true
           },
           'message':{
              required: true,
               minlength: 7
           }
       }, submitHandler: function (form) {
           $.ajax({
               url: '/article/addComment',
               type: 'POST',
               data: {
                   'name': $('#name').val(),
                   'email': $('#email').val(),
                   'message': $('#message').val(),
                   'article-id': $('#article-id').val(),
                   subscribe: $('#subscribe').prop('checked')
               },
               success: function (data) {
                   console.log('1');
               },
               error: function (data) {
                   console.error(data);
                   // location.reload();
               }
           });
       }
   });

   $('#login-form').validate({
       rules:{
           login: {
               required: true
           },
           password: {
               required: true,
               minlength: 5
           }
       }, submitHandler: function (form) {
           $.ajax({
               url: '/login',
               type: 'POST',
               data: {
                   login: $('#login').val(),
                   password: $('#password').val()
               },
               success: function (data) {
                   console.log('success');
               },
               error: function (data) {
                   console.error('error');
               }
           })
       }
   });


   jQuery.extend(jQuery.validator.messages, {
       required: 'Це поле обов\'язкове для заповнення',
       email: 'Введіть коректну email адресу',
       minlength: 'Дозволено вводити не менше {0} символів'
   });
});