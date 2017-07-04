define(['ko', 'uiComponent'], function(ko, Component) {
    'use strict';

    return Component.extend({
        defaults: {
            exampleMessage1: 'Hello?',
            // template: 'Learn9_Module/test'
        },

        initialize: function() {
            this._super();
            console.log(this.exampleMessage1);
            this.message = ko.observable(this.exampleMessage1);
        }
    });
});