$(function () {
    var addArticle = window.location.href;
    //редактор текста
    if (addArticle.indexOf('addArticle') > 0) {
        var editor = new Quill('#editor', {
            modules: {toolbar: '#toolbar'},
            theme: 'snow'
        });
    }

    $.validator.addMethod("cyrillic", function (value, element) {
        return this.optional(element) || /[\u0400-\u04FF]/.test(value);
    }, "Дозволено вводити лише кирилицю");


    /********************************************
    **     Добавление комментария к статье     **
    ********************************************/
    $('#new-comment').validate({
        rules: {
            'name': {
                required: true,
                cyrillic: true
            },
            'email': {
                required: true,
                email: true
            },
            'message': {
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
                    'subscribe': $('#subscribe').prop('checked')
                },
                success: function (data) {
                    if (data.status == 'success') location.reload();
                    else if (data.status == 'error') console.log(data.data);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        }
    });


    /********************************************
    **              Вход на сайт               **
    ********************************************/
    $('#login-form').validate({
        rules: {
            'login': {
                required: true
            },
            'password': {
                required: true,
                minlength: 5
            }
        }, submitHandler: function (form) {
            $.ajax({
                url: '/login',
                type: 'POST',
                data: {
                    'login': $('#login-form #login').val(),
                    'password': $('#login-form #password').val()
                },
                success: function (data) {
                    if (data.status == 'success') location.reload();
                    else if (data.status == 'error') {
                        if (data.data == 'no_data') alert("Введите данные для входа!");
                        else if (data.data == 'auth_error') alert("Неправильный логин/пароль!");
                        else alert("Ошибка!");
                    }
                },
                error: function (data) {
                    console.error(data);
                }
            })
        }
    });


    jQuery.extend(jQuery.validator.messages, {
        required: 'Це поле обов\'язкове для заповнення',
        email: 'Введіть коректну email адресу',
        minlength: 'Дозволено вводити не менше {0} символів',
        maxlength: 'Дозволено вводити не більше {0} символів'
    });


    /********************************************
    **         Добавление новой статьи         **
    ********************************************/
    $('#article-form').validate({
        rules: {
            'article-title': {
                required: true
            },
            'article-description': {
                required: true
            },
            'category': 'required',
            'url': {
                required: true,
                minlength: 4,
                maxlength: 15
            }
        },
        submitHandler: function (form) {
            var form_data = new FormData();
            form_data.append('title', $('#article-title').val());
            form_data.append('description', $('#article-description').val());
            form_data.append('content', $('#editor .ql-editor').html());
            form_data.append('category', $('#category').val());
            form_data.append('url', $('#url').val());
            form_data.append('img', $('#article-image').prop('files')[0]);
            $.ajax({
                url: '/article/addArticle',
                type: 'POST',
                data: form_data,
                contentType: false,
                processData: false,
                success: function (data) {
                    if (data.status == 'success') {
                        console.log('success');
                        console.log(data.data);
                    }
                    else if (data.status == 'error') console.log(data.data);
                },
                error: function (data) {
                    console.error(data);
                }
            });
        }

    });


    /********************************************
    **          Поставить/Снять лайк           **
    ********************************************/
    $('a.like').click(function(){
        var link = $(this);
        $.ajax({
            url: '/article/like',
            type: 'POST',
            data: {id: link.data('id')},
            success: function (data) {
                if (data.status == 'success') {
                    var count = (parseInt(link.html()));
                    if (link.hasClass('active')) link.html(--count);
                    else link.html(++count);
                    link.toggleClass('active');
                }
                else if (data.status == 'error') console.log(data.data);
            },
            error: function (data) {
                console.error(data);
            }
        });
    });


})
;
