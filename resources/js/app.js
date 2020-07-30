require('./bootstrap');
window.Vue = require('vue');

Vue.component('overview-component', require('./components/OverviewComponent.vue').default);

const app = new Vue({
    el: '#overview',
});
