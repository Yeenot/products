require('^resources/bootstrap');
window.Vue = require('vue').default;

Vue.component('bar-chart', require('^components/BarChart.js').default);

const app = new Vue({
    el: '#app',

    data: () => {
        return {
            dataCollection: null
        }
    },

    mounted() {
        this.fillData()
    },

    methods: {
        async fillData () {
            try {
                const response = await axios.get('/ajax/products/chart');
                let products = response.data;
                let data = [];
                let labels = [];
                products.map(function(product) {
                    labels.push(product.name);
                    data.push(product.quantity);
                })
                this.dataCollection = {
                    labels,
                    datasets: [
                        {
                            label: 'Quantity',
                            backgroundColor: '#f87979',
                            data
                        }
                    ]
                };
            } catch (e) {
                console.error(e)
            }
        }
    }
});
