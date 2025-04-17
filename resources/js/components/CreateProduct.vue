<template>
    <div>
            <h2 class="text-center">Adicionar novo Produto</h2>

            <div class="row">
                    <div class="col-md-12">
                    <form @submit.prevent="addProduct">
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
                        <button type="submit" class="btn btn-primary">Adicionar</button>
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
        methods: {
            addProduct(){
                this.axios
                    .post('http://localhost:8000/api/products', this.product)
                    .then(response => (
                        this.$router.push({ name: 'home'})
                    ))
                    .catch(err => alert('Ocorreu um erro: ' + err))
            }
        }
    }
</script>
