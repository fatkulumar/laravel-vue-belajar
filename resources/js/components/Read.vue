<template>
    <div class="card">
        <div class="card-reader">
            <router-link to="/" class="btn btn-primary"><i class="fa fa-arrow-left">Kembali Index</i></router-link> 
        </div>
        <div class="card-body"
            <h2>{{ posts.title }}</h2>
            <p>{{ posts.description }}</p>
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
    let id = this.$route.params.id;
    axios.get('/post/' + id)
    .then(response => { 
      this.posts = response.data
    })
    .catch(e => {
      this.errors.push(e)
    })
 
  }
}
</script>
