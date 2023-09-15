<template lang="">
  <div class="w-4/12" :class="collapsed? 'hidden':''">
    <div class="nav" >
      <div class="addTask">
        <div
          class="
            formHeader
            flex
            justify-between
            text-gray-200
            h-12
            items-center
          "
        >
          <span class="text-gray-200 p-1 ml-2">Add Task</span>
          <div class="h-4 w-4 mr-2" v-model="task.important">
            <svg 
            @click="task.important=!task.important"
              :class="task.important ? 'text-yellow-600' : 'text-gray-200'"
              xmlns="http://www.w3.org/2000/svg"
              class="h-4 w-4 "
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
              />
            </svg>
          </div>
        </div>
        <div class="flex flex-col">
          <label class="text-gray-300 ml-4 font-" for="">Title</label>
          <input
            class="rounded w-4/5 my-2 mx-auto"
            type="text"
            v-model="task.title"
          />
        </div>
            <div class="flex flex-col">
          <label class="text-gray-300 ml-4 font-" for="">Duo date</label>
          <input
            class="rounded w-4/5 my-2 mx-auto"
            type="date"
            v-model="task.task_date"
          />
        </div>

        <div class="flex flex-col">
          <label class="text-gray-300 ml-4 font-" for="">Assigned</label>
          <select v-model="task.assigned_to" class="rounded w-4/5 my-2 mx-auto">
            <option class="ml-4 font-" value=""></option>
            <option class="ml-4 font-">jack</option>
            <option class="ml-4 font-">john</option>
            <option class="ml-4 font-">jill</option>
          </select>
        </div>

        <div class="flex flex-col">
          <label class="text-gray-300 ml-4 font-" for="">Tag</label>
          <select v-model="task.tag" class="rounded w-4/5 my-2 mx-auto">
            <option class="ml-4 font-" value=""></option>
            <option class="ml-4 font-">High</option>
            <option class="ml-4 font-">Medium</option>
            <option class="ml-4 font-">Team</option>
            <option class="ml-4 font-">low</option>
          </select>
        </div>

        <div class="flex flex-col">
          <label class="text-gray-300 ml-4 font-" for="">Description</label>
          <textarea
            class="rounded w-4/5 my-2 mx-auto"
            type="date"
            v-model="task.description"
          ></textarea>
        </div>
          <div class="flex">
         <button class="rounded w-20 text-white h-10" value="submit"
         @click="addItem()"
        
         >submit</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import axios from "axios";

export default {

     props:['collapsed','collapsedTaskBar','openTab'],
     data(){
         return{
             task:{
                 title:"",
                 assigned_to:"",
                 tag:"",
                 task_date:"",
                 description:"",
                 important: false,

             }
         }
     },
     methods:{
         addItem(){
             if(this.task.title== ''){
                 return;
             }
             axios.post('api/task/store',{
                 task : this.task
             })
             .then(res=>{
                 if(res.status==201){
                     this.task.title = "";
                     this.task.description = "";
                     this.task.task_date = "";
                     this.task.tag = "";
                     this.task.assigned_to = "";
                     this.task.important = false;

                     this.$emit('reloadList');
                     this.$emit('reloadimportantList');
                 }
             })

         }
     }

}
</script>
<style>
.formHeader {
  background-color: #161d31;
}
</style>
