<script id="contactTpl" type="text/template">

    <td>{{ first_name }}</td>
    <td>{{ last_name }}</td>
    <td>{{ email_address }}</td>
    <td>{{ description }}</td>
    <td>
        <a href="#contacts/{{id}}" class="delete">Удалить</a>
        <a href="#contacts/{{id}}/edit" class="edit">Редактировать</a>
    </td>
    
    
</script>