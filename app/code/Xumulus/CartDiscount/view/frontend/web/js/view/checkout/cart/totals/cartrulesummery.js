define(
    [
        'Xumulus_CartDiscount/js/view/checkout/summary/cartrulesummery'
    ],
    function (Component) {
        'use strict';
 
        return Component.extend({
            /**
             * @override
             * use to define amount is display setting
             */
            isDisplayed: function () {
                return true;
            }
        });
    }
);