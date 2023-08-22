<template>
    <div class="item">
        <input 
            type="checkbox"
            @change="updateCheck()"
            v-model="item.completed"
            :checked="item.completed"
        >
        <span :class="[ item.completed ? 'completed' : '', 'itemText' ]">{{ item.name }}</span>
        <button @click="removeItem()" class="trash">
            <font-awesome-icon icon="trash"/>
        </button>
    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        props: ['item'],
        methods: {
            updateCheck () {
                axios.put('api/item/' + this.item.id, {
                    item: {
                        completed: this.item.completed 
                    }
                })
                .then( response => {
                    if (response.status === 200) {
                        this.$emit('itemChanged')
                    }
                } )
                .catch( error => {
                    console.log("Error: " + error);
                } )
            },
            removeItem () {
                axios.delete('api/item/' + this.item.id, {
                    item: this.item
                })
                .then( response => {
                    if (response.status === 200) {
                        this.$emit('itemChanged')
                    }
                } )
                .catch( error => {
                    console.log("Error: " + error);
                } )
            },
            fetchItemData() {
                axios.get('api/item/' + this.item.id)
                .then(response => {
                    this.item.completed = response.data.completed;
                })
                .catch(error => {
                    console.log("Error fetching item data: " + error);
                });
            }
        },
        mounted() {
            this.fetchItemData();
        }
    }
</script>

<style scpoed>
    .completed {
        text-decoration: line-through;
        color: #999999;
    }

    .itemText {
        width: 100%;
        margin-left: 20px;
    }

    .item {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .trash {
        background: #e6e6e6;
        border: none;
        color: #FF0000;
        outline: none;
    }
</style>