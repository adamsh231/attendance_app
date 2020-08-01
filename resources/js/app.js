require('./bootstrap');
window.Vue = require('vue');

Vue.component('overview-component', require('./components/OverviewComponent.vue').default);
Vue.component('nested-component', require('./components/NestedComponent.vue').default);

const app = new Vue({
    el: '#app',
});
