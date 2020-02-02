require('./bootstrap');

window.Vue = require('vue');

const app = new Vue({
    el: '#add_invoice_product_modal',

    created: function () {
        this.getProducts();
    },
    
    data: {
        selected: 0,
        price: 0,
        stock: 0,
        products: []
    },
    
    methods: {
        getProducts: function () {
            var urlInvoiceProduct = '/invoice_product';
            axios.get(urlInvoiceProduct).then(response => {
                this.products = response.data
            });
        },

        getDataOfProduct: function () {
            this.price = this.products[this.selected-1].price;
            this.stock = this.products[this.selected-1].stock;
        }
    }
})