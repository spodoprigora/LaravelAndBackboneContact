<script id="editContactTpl" type="text/template">
    <h2>Редактировать контакт: {{ first_name }} {{ last_name }}</h2>
    <form id="edit-contact-form">
        <div>
            <label for="edit_first_name">Имя</label>
            <input type="text" id="edit_first_name" name="edit_first_name" value="{{ first_name }}">
        </div>
        <div>
            <label for="edit_last_name">Фамилия</label>
            <input type="text" id="edit_last_name" name="edit_last_name" value="{{ last_name }}">
        </div>
        <div>
            <label for="edit_email_address">Email</label>
            <input type="text" id="edit_email_address" name="edit_email_address" value="{{ email_address }}">
        </div>
        <div>
            <label for="edit_description">Описание</label>
            <textarea id="edit_description" name="edit_description">{{ description }}</textarea>
        </div>
        <div>
            <input type="submit" value="Сохранить изменения.">
            <button type="button" class="cancel">Отмена</button>
        </div>

    </form>

</script>


