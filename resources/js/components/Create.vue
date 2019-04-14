 <template>
    <div class="container">
        <!-- <div class="row justify-content-center"> -->
            <!-- <div class="col-md-8"> -->
                <div class="card">
                    <div class="card-header" style="text-align: center">Create New Post</div>

                    <div class="card-body">
                        <form v-on:submit="submitPost()">
                            <div class="form-group">
                                <input type="text" v-model="posts.title" placeholder="Titile" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea rows="5" type="text" v-model="posts.description" placeholder="Description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <router-link to="/" class="btn btn-warning">Cancel</router-link>
                                <button class="btn btn-success">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            <!-- </div> -->
        <!-- </div> -->
    </div>
</template>

<script>
// import axios from 'axios';

export default {
  data:function() {
    return { 
    posts: {
        title:'',
        description:'',
        },
      errors: []
    }
  },

  // Fetches posts when the component is created.
  methods:{
  submitPost() {
    axios.post(`/post`, this.posts)
    .then(response => {
        console.log(response)
        this.$router.push('/')
      this.posts = response.data
    })
    .catch(e => {
      this.errors.push(e)
    })
  }
}
}
</script>
