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

        props: ['user_id', 'follows'],

        data: function() {
            return {
                status: this.follows
            }
        },

        methods: {
            followUser() {
                axios.post('/follow/' + this.user_id)
                    .then(response => {
                        this.status = !this.status
                        console.log(response.data);
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
