<template>
    <div>
        <button 
            class="btn btn-primary ml-4" 
            v-text="buttonText"
            @click="followUser"
            ></button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('FollowButton Component mounted.')
        },

        props: ['username', 'follows'],

        data: function() {
            return {
                status: this.follows
            }
        },

        methods: {
            followUser() {
                axios.post('/follow/' + this.username)
                    .then(response => {
                        this.status = !this.status
                        console.log(response.data);
                    })
                    .catch(errors => {
                        if (errors.response.status == 401) {
                            window.location = '/login';
                            console.log(this.username);
                        }
                    });
            }
        },

        computed: {
            buttonText() {
                return this.status ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>
