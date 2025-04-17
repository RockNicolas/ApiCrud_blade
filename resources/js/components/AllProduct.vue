<template>
    <div>
            <h2 class="text-center">Listagem Produtos</h2>

            <table class="table">
                    <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Ações</th>
                            </tr>
                    </thead>

                    <tbody>
                            <tr v-for="product in products" :key="product.id">
                                <td>{{ product.id}}</td>
                                <td>{{ product.name}}</td>
                                <td>{{ product.price}}</td>
                                <td>
                                    <div class="btn-group">
                                    <router-link :to="{name: 'edit', params: { id: product.id}}" class="btn btn-success">Editar</router-link>
                                            <button class="btn btn-danger" @click="deleteProduct(product.id)">Apagar</button>
                                    </div>
                                </td>
                            </tr>
                    </tbody>
            </table>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                products: []
            }
        },
        created(){
            this.axios
                .get('http://localhost:8000/api/products/')
                .then(response => {
                    this.products = response.data;
                });
        },
        methods: {
            deleteProduct(id){
                if(window.confirm('Deseja apagar o produto?')){
                    this.axios
                    .delete(`http://localhost:8000/api/products/${id}`)
                    .then(response => {
                       if (response.data === "Product deleted"){
                            let i = this.products.map(data => data.id).indexOf(id);
                            this.products.splice(i, 1);
                       }
                    });
                }
            }
        }
    }
</script>
