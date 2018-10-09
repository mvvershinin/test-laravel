
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('doctors', require('./components/doctors.vue'));
Vue.component('app');
var app = new Vue({
  el: '#app',
  data() {
    return {
      query: null,
      doctors: null,
      doctorsitems: null,
      hospitals: null,
      hospitalsitems: null,
      services: null,
      servicesitems: null,
      afterquery: false,
      errorQuery: false,
      startQuery: 'http://localhost/search-'
    };
  },
  methods: {
    startSearch: function (url) {
    	if(!this.query){
    		afterquery: false,
    		this.errorQuery = true
    	}
    	else{
    		this.errorQuery = false,
			axios
				.get(this.startQuery+'doctors?search-value='+this.query)
				.then(response => (
					
					this.afterquery = true,
					this.doctors = response.data,
					this.doctorsitems = response.data.data,
					this.doctors.first_page_url += "&search-value="+this.query,
					this.doctors.prev_page_url += "&search-value="+this.query,
					this.doctors.last_page_url += "&search-value="+this.query,
					this.doctors.next_page_url += "&search-value="+this.query
					))
				.catch(error => console.log(error));
			axios
				.get(this.startQuery+'hospitals?search-value='+this.query)
				.then(response => (
					this.afterquery = true,
					this.hospitals = response.data,
					this.hospitalsitems = response.data.data,
					this.hospitals.first_page_url += "&search-value="+this.query,
					this.hospitals.prev_page_url += "&search-value="+this.query,
					this.hospitals.last_page_url += "&search-value="+this.query,
					this.hospitals.next_page_url += "&search-value="+this.query

					))
				.catch(error => console.log(error));
			axios
				.get(this.startQuery+'services?search-value='+this.query)
				.then(response => (
					this.afterquery = true,
					this.services = response.data,
					this.servicesitems = response.data.data,
					this.services.first_page_url += "&search-value="+this.query,
					this.services.prev_page_url += "&search-value="+this.query,
					this.services.last_page_url += "&search-value="+this.query,
					this.services.next_page_url += "&search-value="+this.query

					))
				.catch(error => console.log(error));    		
    	}


    },
    pageDoctorsSearch: function (url) {
		axios
		.get(url)
		.then(response => (
			this.afterquery = true,
			this.doctors = response.data,
			this.doctorsitems = response.data.data,
			this.doctors.first_page_url += "&search-value="+this.query,
			this.doctors.prev_page_url += "&search-value="+this.query,
			this.doctors.last_page_url += "&search-value="+this.query,
			this.doctors.next_page_url += "&search-value="+this.query
			))
		
		.catch(error => console.log(error));
    },
    pageHospitalsSearch: function (url) {
		axios
		.get(url)
		.then(response => (
			this.afterquery = true,
			this.hospitals = response.data,
			this.hospitalsitems = response.data.data,
			this.hospitals.first_page_url += "&search-value="+this.query,
			this.hospitals.prev_page_url += "&search-value="+this.query,
			this.hospitals.last_page_url += "&search-value="+this.query,
			this.hospitals.next_page_url += "&search-value="+this.query
			))
		.catch(error => console.log(error));
    },    
    pageServicesSearch: function (url) {
		axios
		.get(url)
		.then(response => (
			this.afterquery = true,
			this.services = response.data,
			this.servicesitems = response.data.data,
			this.services.first_page_url += "&search-value="+this.query,
			this.services.prev_page_url += "&search-value="+this.query,
			this.services.last_page_url += "&search-value="+this.query,
			this.services.next_page_url += "&search-value="+this.query
			))
		.catch(error => console.log(error));
    },
  }
});
