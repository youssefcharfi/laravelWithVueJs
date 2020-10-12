<template>
  <div class="container">
    <div class="form-row">
      <div class="col-row">
        <input type="text" class="form-control my-2" placeholder="search a task..." v-on:keyup="searchTask" v-model="search" >
      </div>
    </div>
    <ul class="list-group my-3">
      <li
        class="list-group-item"
        v-for="task in tasks.data"
        v-bind:key="task.id"
      >
        <a href=""> {{ task.name }} </a>
        <button style="float : right" class="btn btn-danger" v-on:click="deleteTask(task.id)">Delete</button>
        <button
          type="button"
          class="btn btn-secondary mr-2"
          style="float: right"
          data-toggle="modal"
          data-target="#exampleModal"
          @click="edit(task.id)"
        >
          Editer
        </button>
      </li>
      <edit-task v-bind:task="task" @task-edited="refresh"/>
    </ul>
    <pagination
      :data="tasks"
      @pagination-change-page="getResults"
      class="pt-2"
    ></pagination>
  </div>
</template>

<script>
export default {
  data() {
    return {
      url: "http://localhost:8000/tasks",
      tasks: "",
      task:"",
      search:''
    };
  },

  methods: {
    getResults(page = 1) {
      axios
        .get(`http://localhost:8000/tasks?page=${page}`)
        .then((response) => (this.tasks = response.data))
        .catch((err) => console.log(err));
    },

    edit(id) {
      axios.get(this.url+'/'+id)
           .then(res => this.task=res.data)
           .catch(err => console.log(err))
    },
    

    refresh(tasks){
      this.tasks = tasks.data
    },

    searchTask(){
if(this.search == ''){
        axios
      .get(this.url)
      .then((res) => this.tasks = res.data)
      .catch((err) => console.log(err));
      }
      else{
        axios.get('http://localhost:8000/tasks/search/'+this.search)
             .then(res => this.tasks = res.data)
             .catch(err => console.log(err))
      }
    },

    deleteTask(id){
      if(confirm('do you want to delete this task ?')){
        axios.delete(this.url+'/'+id)
             .then((res) => this.tasks = res.data)
             .catch(err => console.log(err))
      }
   }

  },

  created() {
    axios
      .get(this.url)
      .then((res) => this.tasks = res.data)
      .catch((err) => console.log(err));
  },
};
</script>
