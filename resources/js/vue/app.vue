<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title"> Todo List </h2>
            <AddItemForm v-on:reloadlist="getItems()" />
        </div>
        <ListView :items = "items" v-on:reloadlist="getItems()" />
    </div>
</template>

<script>
    import AddItemForm from './addItemForm.vue'
    import ListView from './listView.vue'
    import axios from 'axios';

    export default {
        components: {
            AddItemForm,
            ListView,
        },
        data: function () {
            return {
                items: []
            };
        },
        methods: {
            getItems () {
                axios.get('api/items')
                .then( response => {
                    if (response.status === 200) {
                        this.items = response.data;
                    }
                } )
                .catch ( error => {
                    console.log("Error: " + error);
                } )
            }
        },
        created() {
            this.getItems();
        }
    }
</script>

<style scoped>
    .todoListContainer {
        width: 350px;
        margin: auto;
    }

    .heading {
        background: #e6e6e6;
        padding: 10px;
    }

    #title {
        text-align: center;
    }
</style>