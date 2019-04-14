<template>
    <div class="card">
        <div class="card-header">
            <router-link to="/create" class="btn btn-info float-right">Create New Post</router-link>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Titile</th>
                        <th>Description</th>
                        <th width="100"></th>
                        <th width="100"></th>
                        <th width="100"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="post, index in posts":key="post.id">
                        <td>{{ post.title }}</td>
                        <td>{{ post.description }}</td>
                        <td>
                            <router-link :to="{name:'readPost', params:{id:post.id}}" class="btn btn-info"><i class="fa fa-eye">Show</i></router-link>
                        </td>
                        <td>
                            <router-link :to="{name:'editPost', params:{id:post.id}}" class="btn btn-info"><i class="fa fa-pencil-square-o">Update</i></router-link>
                        </td>
                        <td>
                            <button class="btn btn-danger" v-on:click="submitPostDelete(post.id, index)">
                                <i class="fa fa-pencil-trash">Delete</i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
</template>

<script>
// import axios from 'axios';

export default {
  data() {
    return {
      posts: [],
      errors: []
    }
  }, 
  created() {
    axios.get('/post')
    .then(response => { 
      this.posts = response.data
    })
    .catch(e => {
      this.errors.push(e)
    })
 
  },
   methods:{
  submitPostDelete(id, index) {
      if(confirm("Click 'ok' to delete."))
    axios.delete(`/post/` + id)
    .then(response => {
        console.log(response)
      this.posts.splice(index, 1)
    })
    .catch(e => {
      this.errors.push(e)
    })
  }
}
}

//Index.vue
//   methods:{
//   submitPostDelete(id, index) {
//     if (confirm("Click 'Ok' to delete.")){
//     axios.delete('/posts/' + id)
//     .then(response => {
//       console.log(response)
//       this.posts.splice(index, 1);
//     })
//     .catch(e => {
//       this.errors.push(e)
//     })
//     }
//    }
//   }
</script>