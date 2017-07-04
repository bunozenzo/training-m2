define(
    [
        'ko',
        'uiComponent'
    ],
    function(ko, Component) {
        'use strict';
        return Component.extend({
            defaults: {
                template: 'Learn9_Module/page'
            },
            initialize: function() {
                this._super();
                // this.message = ko.observable("hello");
                // this.getTitle = function () {
                //     return "hello";
                // };
                var self=this;
                self.price=ko.observable();
                self.qty=ko.observable();
                self.total=ko.computed(function () {
                    console.log(self.price());
                    return self.price()*self.qty();
                });

                self.products=ko.observableArray([]);
                self.ClickCounter= function() {
                    jQuery.ajax({
                        url:'index',
                        type: 'POST',
                        dataType: 'json',
                        success: function (response) {
                            self.products(response);
                            console.log(self.products());
                        }
                    });
                }

            }


        });
    }
);
