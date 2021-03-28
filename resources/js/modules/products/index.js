 require('^resources/bootstrap');
 window.Vue = require('vue').default;
 
 const app = new Vue({
    el: '#app',

    data: () => {
        return {
        }
    },

    mounted() {
        $(document).ready(function() {
            var table = $('#products').DataTable({
                responsive: true,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                ajax: {
                    "url": 'ajax/products',
                    "type": "POST",
                    data: {
                        _token: window.token
                    }
                },
                columns: [
                    {data: '_id'},
                    {data: 'name'},
                    {data: 'sku'},
                    {data: 'price'},
                    {data: 'quantity'},
                    {data: '_id', responsivePriority: -1},
                ],
                columnDefs: [
                    {
                        targets: [0],
                        visible: false,
                        searchable: false
                    },
                    {
                        targets: [1,2,3,4],
                        orderable: false
                    },
                    {
                        targets: [5],
                        orderable: false,
                        render: function(data) {
                            return '<a href="/products/'+ data +'" class="btn btn-info">View</a>';
                        }
                    }
                ]
            });
        });
    },
 });
 