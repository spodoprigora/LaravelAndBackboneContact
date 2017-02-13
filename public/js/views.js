/**
 * Created by user on 13.02.2017.
 */

/**
 * Global App View
 *
 */
App.Views.App = Backbone.View.extend({
    initialize: function(){
        vent.on('contact:edit', this.editContact, this);
       /* console.log(this.collection.toJSON());*/
        var addContact = new App.Views.AddContact({collection: App.contacts});
        var allContacts = new App.Views.Contacts({collection: App.contacts}).render();
        $('#allContactsTable').append(allContacts.el);

    },
    editContact: function(contact){
        var editContactView = new App.Views.EditContact({ model: contact });
        $('.contact-form-block').html( editContactView.el );
    }
});

/**
 *AddContact View
 *
 */
App.Views.AddContact = Backbone.View.extend({
    el: '#contact-form',
    initialize: function(){
        this.first_name = this.$('#first_name');
        this.last_name = this.$('#last_name');
        this.email_address = this.$('#email_address');
        this.description = this.$('#description');
    },
    events: {
       'submit': 'addContact'
    },
    addContact: function(e){
        e.preventDefault();

        var newContact = this.collection.create({
            first_name: this.first_name.val(),
            last_name: this.last_name.val(),
            email_address: this.email_address.val(),
            description: this.description.val()
        }, { wait: true});

        this.clearInps();
        console.log( newContact.toJSON() );
    },
    clearInps: function(){
        this.first_name.val('');
        this.last_name.val('');
        this.email_address.val('');
        this.description.val('');
    }
});

/**
 *EditContact View
 *
 */

App.Views.EditContact = Backbone.View.extend({
    initialize: function(){
        this.render();
        this.form = this.$('#edit-contact-form');
        this.first_name = this.form.find('#edit_first_name');
        this.last_name = this.form.find('#edit_last_name');
        this.email_address = this.form.find('#edit_email_address');
        this.description = this.form.find('#edit_description');
    },
    events: {
        'submit #edit-contact-form': 'submit',
        'click button.cancel': 'cancel'
    },
    template: App.template('editContactTpl'),
    submit: function(e){
        e.preventDefault();

        this.model.save({
            first_name: this.first_name.val(),
            last_name: this.last_name.val(),
            email_address: this.email_address.val(),
            description: this.description.val(),
        });
        this.remove();
    },
    render: function(){
        var html = this.template( this.model.toJSON() );
        this.$el.html(html);
        return this;
    },
    cancel: function(){
        this.remove();
    }

});

/**
 *
 * All contacts View
 *
 */

App.Views.Contacts = Backbone.View.extend({
    tagName: 'tbody',
    initialize: function(){
        this.collection.on('add', this.addOne, this);

    },
    render: function(){
        this.collection.each( this.addOne, this);
        console.log(this.el);
        return this;
    },

    addOne: function(contact){
        var singleContact = new App.Views.Contact({ model: contact });
        console.log(singleContact.render().el);
        this.$el.append( singleContact.render().el );
    }
});

/*
* SingleContact View
*
 */
App.Views.Contact = Backbone.View.extend({
    tagName: 'tr',
    template: App.template('contactTpl'),
    initialize: function(){
        this.model.on('destroy', this.unrender, this);
        this.model.on('change', this.render, this);
    },
    events: {
        'click a.delete': 'removeContact',
        'click a.edit': 'editContact',
    },
    unrender: function(){
       this.remove(); //this.$el.remove;
    },
    editContact: function(){
        vent.trigger('contact:edit', this.model);
       
    },
    removeContact: function(){
        this.model.destroy();
    },
    render: function(){
        this.$el.html( this.template( this.model.toJSON() ) );
        return this;
    },


});