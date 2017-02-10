<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>LaravelAndBackbone</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    <script src="js/jquery.js"></script>
    <script src="js/underscore.js"></script>
    <script src="js/Backbone.js"></script>

    <script>
        (function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            window.App = {
                Models: {},
                Views: {},
                Collections: {}
            };



            App.Models.Task = Backbone.Model.extend({
                defaults: {
                        //    id: '',
                    title: '',
                    complete: 0
                },
                urlRoot: '/tasks'
            });

            App.Collections.Tasks = Backbone.Collection.extend({
               model: App.Models.Task,
               url: '/tasks'
            });


            App.Views.Tasks = Backbone.View.extend({
               tagName: 'ul',
                initialize: function(){
                    this.collection.on('add', this.addOne, this);
                },
                render: function(){
                    this.$el.empty();
                    this.collection.each(this.addOne, this);
                    return this;
                },
                addOne: function(task){

                    var task = new App.Views.Task({ model: task })
                    this.$el.append( task.render().el );
                }

            });

            App.Views.Task = Backbone.View.extend({
                tagName: 'li',
                initialize: function(){
                  this.model.on('destroy', this.remove, this);
                },
                render: function(){
                    this.$el.html( this.model.get('title') );
                    return this;
                }
            });


           /* var taskCollection = new App.Collections.Tasks();
            taskCollection.fetch();
            var tasksView = new App.Views.Tasks({collection: taskCollection});
            tasksView.render();
            $('body').append(tasksView.el);*/

        }());


    </script>
    </body>
</html>
