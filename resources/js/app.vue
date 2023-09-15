<template lang="">
  <div class="container rounded w-full rounded m-0" id="main">
    <div class="relative flex min-h-screen border-gray-500 border rounded-md">
      <taskSideBarVue
        class="border-gray-500 border-r"
        :collapsed="collapsed"
        :collapsedTaskBar="collapsedTaskBar"
        v-on:openClose="collapsed = !collapsed"
        :openTab="openTab"
        v-on:trigerTabFunc="toggleTabs"
        v-on:reloadCOm="gettasksCompleted"
        v-on:reloadimp="gettasksImpoprtant"
        v-on:reloadtask="gettasksCompleted"
        v-on:trigerCompletedList="gettasksCompleted" 
      >
      </taskSideBarVue>

      <listVue
        v-on:getcomList="gettasksCompleted"
        v-on:taskChangedtask="getTasks"
        :openTab="openTab"
        v-on:TAskOpenClose="collapsedTaskBar= !collapsedTaskBar"
        :collapsedTaskBar="collapsedTaskBar"
        :tasks="tasks"
        :collapsed="collapsed"
        v-on:taskChangedTriger="getTasks"
        :tasksCompleted="tasksCompleted"
        :tasksimportant="tasksimportant"
        
      />

      <formVue
        v-on:reloadList="getTasks"
        :openTab="openTab"
        :collapsedTaskBar="collapsedTaskBar"
        v-on:openClose="collapsed = !collapsed"
        :collapsed="collapsed"
        v-on:reloadimportantList="gettasksImpoprtant"
      />
    </div>
  </div>
</template>
<script>
import axios from 'axios'
import formVue from './components/form.vue'
import listVue from './components/list.vue'


import myTasksVue from "./components/myTasks.vue"
import taskSideBarVue from "./components/taskSideBar.vue"



export default {
    data(){
        return{
            collapsed : true,
            collapsedTaskBar:true,
            openTab: 1,
            checked: false,
            tasks:[],
            tasksCompleted:[],
            tasksimportant:[]
        }
    }
    ,created(){
      this.getTasks();
      this.gettasksCompleted(),
      this.gettasksImpoprtant()

    }
    ,components:{
        taskSideBarVue,
        myTasksVue,
        formVue,
        listVue


    }
    ,methods:{
           toggleTabs: function(tabNumber){
      this.openTab = tabNumber
    }
    , getTasks: function(){
       axios.get('api/tasks')
         .then(response=>{
         this.tasks =response.data ;
       })
     },
     gettasksCompleted: function(){
       axios.get('api/tasksCompleted')
         .then(response=>{
         this.tasksCompleted =response.data ;
       })
     },
      gettasksImpoprtant: function(){
       axios.get('api/tasksimportant')
         .then(response=>{
         this.tasksimportant =response.data ;
       })
     }
    }

}
</script>
<style>
#main {
  background-color: #283046;
}
.nav {
  background-color: #283046;
}
.header {
  color: #4e5154;
}
button {
  background-color: #7367f0 !important;
}
.listItem {
  margin-bottom: 10px;
  font-weight: 500;
  color: #b4b7bd;
}

.listItem:hover {
  color: #7367f0;
}

.tagItem:hover {
  color: #7367f0;
}
.tagItem {
  font-weight: 500;
  color: #b4b7bd;
}
</style>
