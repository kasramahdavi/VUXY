<template lang="">
  <div class="font-bold p-5 flex-1 center-part flex-col px-0 overflow-scroll">
    <div class="mr-3 w-full">
      <svg
        @click="$emit('TAskOpenClose') "
        xmlns="http://www.w3.org/2000/svg"
        class="h-6 w-6 mx-5 mb-3 text-gray-500"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M4 6h16M4 12h16M4 18h16"
        />
      </svg>

      <div
        class="relative flex flex-col min-w-0 break-words w-full rounded h-16"
      >
        <div class="flex-auto w-full">
          <div class="tab-content tab-space w-full">
            <div
              class="border-t border-gray-500 h-20 w-full"
              v-bind:class="{'hidden': openTab !== 1, 'block': openTab === 1}"
              v-for="(task,index) in tasks"
              :key="index"
            >
              <myTasksVue
                :task="task"
                v-on:taskChanged="$emit('taskChangedTriger')"
                :openTab="openTab"
              />
            </div>
            <div
              class="border-t border-gray-500 h-20 w-full"
              v-bind:class="{'hidden': openTab !== 3, 'block': openTab === 3}"
              v-for="(task,index) in tasksCompleted"
              :key="task"
            >
              <completedVue
                :task="task"
                v-on:taskChanged="$emit('taskChangedTriger')"
                :openTab="openTab"
                v-on:taskChangedc="$emit('getcomList')"
                v-on:taskChangedi="$emit('taskChangedim')"
              />
            </div>
          </div>

          <div
            class="border-t border-gray-500 h-20 w-full"
            v-bind:class="{'hidden': openTab !== 2, 'block': openTab === 2}"
            v-for="(task,index) in tasksimportant"
            :key="task"
          >
            <completedVue
              :task="task"
              v-on:taskChanged="$emit('taskChangedTriger')"
              :openTab="openTab"
              v-on:taskChangedc="$emit('getcomList')"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>

import formVue from './form.vue'
import myTasksVue from './myTasks.vue'
import completedVue from './completed.vue'
import importantVue from './important.vue'
importantVue



formVue
export default {
    props:['openTab','collapsedTaskBar','tasks','tasksCompleted','tasksimportant'],
    components:{
        formVue,
        myTasksVue,
        completedVue,
        importantVue

    },


}
</script>
<style lang=""></style>
