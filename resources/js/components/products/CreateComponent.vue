<template>
    <!-- Нужны стили -->
    Создание продукта
    <!-- Название товара -->
    <br><input type="text" v-model = "title">
    <!-- Описание товара -->
    <br><input type="text" v-model = "description"> 
    <!-- Цена товара -->
    <br><input type="text" v-model = "price">
    <!-- Картинка товара -->
    <br><input type="file" class="form-label" ref="image" name="image">
    <br><button  @click = "StoreProduct()">Добавить</button>
</template>

<script>
import axios from 'axios';

    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                url: 'http://127.0.0.1:8000/', title: '', price: '', description: '', imageUrl: ''
            }
        },
        methods: {
            StoreProduct(){
            // Все данные товара
                const formData = new FormData()
                    formData.append('image', this.$refs.image.files[0])
                    formData.append('title', this.title)
                    formData.append('price', this.price)
                    formData.append('description', this.description)
            // Без этой штуки картинка не зальется
                axios
                    .defaults.headers.common['X-CSRF-TOKEN'] = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute('content')
            //Само создание продукта
                axios
                    .post(this.url+'product', formData)
            // Если продукт создался выполняется эта функция
                    .then(response => {
                        this.GetToHome()
                    })
            // Если продукт не создался выполняется эта функция
                    .catch(error => {
                        console.log(error)
                    })

            },
            GetToHome(){
                const address = this.url
                window.location.href = address
            }
        }
    }
</script>
