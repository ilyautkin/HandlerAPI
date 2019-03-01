HandlerAPI.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'handlerapi-panel-home',
            renderTo: 'handlerapi-panel-home-div'
        }]
    });
    HandlerAPI.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(HandlerAPI.page.Home, MODx.Component);
Ext.reg('handlerapi-page-home', HandlerAPI.page.Home);