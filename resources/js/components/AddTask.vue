<template> 
    <div>
        <form>
            <div class="form-group container mt-5">
                <input type="text" name="name" placeholder="Enter your TASK here..." class="form-control" v-model="name">
                <p class="error" style="color: red"></p>
                 <center><button class="btn btn-primary mt-2" v-on:click="addTask">Add Task</button></center>
            </div>
        </form>
    </div>
</template>

<script>
export default {

    data(){
        return{
            name:"",
            error:""
        }
    },

    methods: {
        async addTask(e){
            e.preventDefault();
            if(this.name == ''){
                let err = document.querySelector('p')
                err.innerHTML='the name of Task is required'
            }
            else{
               await axios.post("http://localhost:8000/tasks",{name: this.name})      
                     .then(res => console.log("task posted"))
                     .catch(err => console.log(err))      
                
                this.$router.push('/tasks')
                
            }
        }
    }

}
</script>
