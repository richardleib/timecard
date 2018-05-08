document.addEventListener('DOMContentLoaded', function(event) {

    const dashboardApp = new Vue({
        el: '#dashboardApp',
        data: {
            clientList: [],
            addClientName: '',
        },
        methods: {
            addClient: function() {
                axios.post('/api/v1/client', {
                        name: this.addClientName,
                    })
                    .then(function(response) {
                        this.clientList.push(response.data.data);
                        this.addClientName = '';
                    }.bind(this))
                    .catch(function(error) {
                        console.error(error);
                    });
            },
            fetchClients: function() {
                axios.get('/api/v1/clients')
                    .then(function(response) {
                        this.clientList = response.data.data;
                    }.bind(this))
                    .catch(function(error) {
                        console.error(error);
                    });
            },
        },
        mounted: function() {
            this.fetchClients();
        },
    });

});