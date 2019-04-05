
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('../template/custom');

require('parsleyjs/dist/parsley');
require('parsleyjs/dist/i18n/id');
require('daterangepicker/daterangepicker');
require('sweetalert/dist/sweetalert.min');


window.$app = require('./app.functions');
require('./app.events');
