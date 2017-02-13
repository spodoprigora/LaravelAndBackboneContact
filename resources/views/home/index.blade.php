<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BackboneContacts</title>
    <style>
        form div {
            margin-bottom: 10px;
        }
        .module {
            margin-bottom: 2em;
        }
    </style>
</head>
<body>
<div class="">
    <h1>Менеджер контактов</h1>

    <form id="contact-form" class="module">
        <div>
            <label for="first_name">Имя</label>
            <input type="text" id="first_name" name="first_name">
        </div>
        <div>
            <label for="last_name">Фамилия</label>
            <input type="text" id="last_name" name="last_name">
        </div>
        <div>
            <label for="email_address">Email</label>
            <input type="text" id="email_address" name="email_address">
        </div>
        <div>
            <label for="description">Описание</label>
            <textarea id="description" name="description"></textarea>
        </div>
        <div>
            <input type="submit" value="Добавить контакт.">
        </div>

    </form>


    <table id="allContactsTable" class="module">
        <thead>
            <tr>
                <td><strong>Имя</strong></td>
                <td><strong>Фамилия</strong></td>
                <td><strong>Email</strong></td>
                <td><strong>Описание</strong></td>
                <td>Действия</td>
            </tr>
        </thead>
    </table>

    <div class="contact-form-block module"></div>

    @include('templates/contactTpl') {{--подключение вынесенного шаблона--}}
    @include('templates/editTpl')
</div>
<script src="js/jquery.js"></script>
<script src="js/underscore.js"></script>
<script src="js/Backbone.js"></script>
<script src="js/handlebars.js"></script>
<script src="js/main.js"></script>
<script src="js/models.js"></script>
<script src="js/collections.js"></script>
<script src="js/views.js"></script>
<script src="js/router.js"></script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    new App.Router();
    Backbone.history.start();

    App.contacts = new App.Collections.Contacts();

    App.contacts.fetch().then(function () {
        new App.Views.App({collection: App.contacts});
    });




</script>
</body>
</html>
