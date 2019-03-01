HandlerAPI.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'handlerapi-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('handlerapi') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('handlerapi_items'),
                layout: 'anchor',
                items: [{
                    html: _('handlerapi_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'handlerapi-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    HandlerAPI.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(HandlerAPI.panel.Home, MODx.Panel);
Ext.reg('handlerapi-panel-home', HandlerAPI.panel.Home);
