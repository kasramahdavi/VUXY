<template lang="">
     <div class="h-full w-full flex items-center justify-between">
                <div class="checkboxDescription flex item-center ml-2 ">
                  <div class="icon flex mt-1">
                
               

                      <input type="checkbox" v-model="task.completed" @change="completedCheck()">

                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="h-4 ml-1 w-4"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                     @click="task.deleted = !task.deleted"
                      @change="deletedCheck(task.id,task)"
                      v-model="task.deleted"
                       :class="task.deleted ? 'text-yellow-600' : 'text-gray-200'"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                      />
                    </svg>
                  </div>

                  <span
                      :class="task.completed ? 'line-through' : ''"
                    class="text-gray-400 font-thin ml-2"
                    >{{task.description}}</span
                  >
                </div>

                <div
                  class="
                    items-center
                    mx-0
                    h-full
                    w-52
                    dateAssigned
                    flex
                    justify-evenly
                    font-thin
                    text-xs text-gray-300
                  "
                >
                  <span class="">{{task.task_date}}</span>
                  <span>{{task.assigned_to}}</span>
                </div>
              </div>
</template>
<script>
import axios from 'axios'

export default {
    props:['task','openTab'],
      data(){

       return{
            task:{
                completed : false
            }
           
       }
           
    },
    methods:{
      completedCheck :function (){
        axios.put('api/task/'+this.task.id,{
          task :this.task
        })
        .then(response=>{
          if(response.status == 200){

            this.$emit('taskChangedc')
            this.$emit('taskChangedi')
            console.log('hre')

          }
        })
        .catch((err)=>{
               console.log(err)
        })
      },
      
    }
    
}
</script>
<style >
    
</style>