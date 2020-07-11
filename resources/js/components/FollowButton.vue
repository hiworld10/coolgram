<template>
    <div>
        <button class="btn btn-primary ml-4" @click="followUser">Follow</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props: ['user_id'],

        methods: {
            followUser() {
                axios.post('/follow/' + this.user_id)
                    .then(response => {
                        console.log(response.data);
                    });
            }
        }
    }
</script>
