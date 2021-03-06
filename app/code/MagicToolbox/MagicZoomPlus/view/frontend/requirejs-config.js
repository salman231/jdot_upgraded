
var config = {
    config: {
        mixins: {
            'Magento_ConfigurableProduct/js/configurable': {
                'MagicToolbox_MagicZoomPlus/js/configurable': true
            },
            'Magento_Swatches/js/swatch-renderer': {
                'MagicToolbox_MagicZoomPlus/js/swatch-renderer': true
            },
            /* NOTE: for Magento v2.0.x */
            'Magento_Swatches/js/SwatchRenderer': {
                'MagicToolbox_MagicZoomPlus/js/swatch-renderer': true
            }
        }
    },
    map: {
        '*': {
            magicToolboxThumbSwitcher: 'MagicToolbox_MagicZoomPlus/js/thumb-switcher'
        }
    }
};
