require('^resources/bootstrap');
window.Vue = require('vue').default;

const app = new Vue({
   el: '#app',

   data: () => {
       return {
           hover: false,
           editing: false,
           product: {
               id: '',
               name: '',
               quantity: '',
               ingredients: ''
           },
           timeOutHandler: null
       }
   },

   mounted() {
       this.prepare();
   },

   computed: {
       BtnEditClass() {
           return {
               'btn-primary': !this.editing,
               'btn-danger': this.editing
           };
       }
   },

   methods: {
        prepare() {
            this.product.id = this.$refs.id.value;
            this.product.name = this.$refs.name.value;
            this.product.quantity = this.$refs.quantity.value;
            this.product.ingredients = this.$refs.ingredients.value;
        },

        onNameOver() {
            if (this.timeOutHandler)
                clearTimeout(this.timeOutHandler);
            this.hover = true;
        },

        onNameLeave() {
            let vm = this;
            if (!vm.editing) {
                vm.timeOutHandler = setTimeout(function () {
                    vm.hover = false;
                    vm.timeOutHandler = null;
                }, 3000);
            } else
                vm.hover = false;
        },

        toggleEdit() {
            this.editing = !this.editing;
            if (!this.editing)
                this.hover = false;
        },

        save() {
            axios.post('/ajax/products/' + this.product.id, {
                _method: 'PATCH',
                name: this.product.name,
                quantity: this.product.quantity,
                ingredients: this.product.ingredients
            })
            .then(function (response) {
                // Success
            })
            .catch(function (error) {
                console.log(error);
            });
        }
   }
});
