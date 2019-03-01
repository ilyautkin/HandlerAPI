var HandlerAPI = function (config) {
    config = config || {};
    HandlerAPI.superclass.constructor.call(this, config);
};
Ext.extend(HandlerAPI, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('handlerapi', HandlerAPI);

HandlerAPI = new HandlerAPI();