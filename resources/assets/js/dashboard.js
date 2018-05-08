document.addEventListener('DOMContentLoaded', function(event) {

    const dashboardApp = new Vue({
        el: '#dashboardApp',
        data: {
            clientList: [],
        },
        methods: {
            fetchClients: function() {
                axios.get('/api/v1/clients')
                    .then(function(response) {
                        console.log(response.data.data);
                        this.clientList = response.data.data;
                    }.bind(this))
                    .catch(function(error) {
                        console.error(error);
                    });
            },
        },
        mounted: function() {
            console.log('dashboard app mounted');
            this.fetchClients();
        },
    });

});