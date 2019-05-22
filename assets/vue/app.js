import Vue from 'vue';

Vue.config.productionTip = false;
/**
 * Import all vue files as components for this vue instance.
 */
const files = require.context('./', true, /\.vue$/);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


new Vue().$mount('#elements-app');
