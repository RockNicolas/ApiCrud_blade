<template>
    <div>
            <h2 class="text-center">Editar Produto</h2>

            <div class="row">
                    <div class="col-md-12">
                    <form @submit.prevent="updateProduct">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" v-model="product.name">
                        </div>
                        <div class="form-group">
                            <label>Preço</label>
                            <input type="text" class="form-control" v-model="product.price">
                        </div>
                        <div class="form-group">
                            <label>Detalhes</label>
                            <input type="text" class="form-control" v-model="product.detail">
                        </div>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                    </div>
            </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                product: {}
            }
        },
        created(){
            this.axios
                .get(`http://localhost:8000/api/products/${this.$route.params.id}`)
                .then(response => {
                    this.product = response.data;
                });
        },
        methods: {
            updateProduct(){
                this.axios
                    .patch(`http://localhost:8000/api/products/${this.$route.params.id}`, this.product)
                    .then(response => (
                        this.$router.push({ name: 'home'})
                    ))
                    .catch(err => alert('Ocorreu um erro: ' + err))
            }
        }
    }
</script>
