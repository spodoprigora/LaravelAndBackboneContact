/**
 * Created by user on 13.02.2017.
 */
App.Models.Contact = Backbone.Model.extend({
    validate: function (attrs) {
        if (!attrs.first_name || !attrs.last_name) {
            return 'Имя и фамилия обязательны для заполнения';
        }
        if (!attrs.email_address) {
            return 'Пожалуйств введите валидный Email';
        }
    }
});