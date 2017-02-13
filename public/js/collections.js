/**
 * Created by user on 13.02.2017.
 */
App.Collections.Contacts = Backbone.Collection.extend({
    model: App.Models.Contact,
    url: '/contacts'
});