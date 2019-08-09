<template id="all-posts">
    <div class="row">
        <div class="pull-right">
            <router-link class="btn btn-xs btn-dark">
                <span class="glyphicon glyphicon-plus"></span>
                Add New Post
            </router-link>
        <br>
        <br/>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Body</th>
                <th class="col-md-2">Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="(post, index) in filteredPosts">
                    <td>{{ index+1 }}</td>
                    <td>{{ post.title}}</td>
                    <td>{{ post.body }}</td>
                    <td>
                        <router-link class="btn btn-info btn-xs" v-bind:to="{name: 'EditPost', params:{id: post.id}}">Edit</router-link>
                        <!--<router-link class="btn btn-info btn-xs" v-bind:to="{name: 'ViewPost', params:{id: post.id}}">View</router-link>-->
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data:function(){
            return {posts: ''};
        },
        created: function() {
            let uri = 'http://localhost/trends/public/index/';
            Axios.get(uri).then((response)=> {
                this.posts = response.data;
            });
        },
        computed: {
            filteredPosts: function(){
                if(this.posts.length) {
                    return this.posts;
                }
            }
        }
    }
</script>

<style lang = "css">

</style>