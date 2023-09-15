<template>
  
      <div
        class="nav w-64 font-bold p-5 left-part"
        :class="collapsedTaskBar? ' hidden md:block':''"
      >
        <div class="addTask">
          <button
            class="
              text-gray-100
              w-full
              bg-red-500
              rounded
              w-32
              h-10
              text-center
              font-bold
              btn btn-primary btn-block
            "
            @click="$emit('openClose')"
          >
            Add Task
          </button>
        </div>
        <section>
          <div class="list-group-filter flex flex-col mt-5 mb-4 "
          
          >
            <a class="listItem flex" 
             @click="$emit('trigerTabFunc',1)" 
        
              ><svg
               v-bind:class="{'textSelected': openTab === 1}" 
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 mr-1"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                /></svg
              ><span class="align-text-bottom line-height-1"
             
                  v-bind:class="{'textSelected': openTab === 1}" 
                   @click="$emit('reloadtask')"
              >My task</span></a
            >
            <a class="listItem flex"
             @click="$emit('trigerTabFunc',2)" 
           
              ><svg
                 v-bind:class="{'textSelected': openTab === 2}" 
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 mr-1"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                /></svg
              ><span class="align-text-bottom line-height-1"
                 v-bind:class="{'textSelected': openTab === 2}"
                 @click="$emit('reloadimp')"
                 
                  >Important</span></a
            >
            <div class="listItem flex" 
             @click="$emit('trigerTabFunc',3)" 
              ><svg
                 v-bind:class="{'textSelected': openTab === 3}" 
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 mr-1"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M5 13l4 4L19 7"
                /></svg
              ><span class="align-text-bottom line-height-1"
                 v-bind:class="{'textSelected': openTab === 3}" 
                 @click="$emit('reloadCOm')"
              >Completed</span></div
            >
            <div class="listItem flex" 
             @click="$emit('trigerTabFunc',4)" 
              ><svg
              
                 v-bind:class="{'textSelected': openTab === 4}" 
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 mr-1"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                /></svg
              ><span class="align-text-bottom line-height-1"
                 v-bind:class="{'textSelected': openTab === 4}" 
              >Deleted</span></div
            >
          </div>
          <div
            class="mt-3 px-2 flex text-center justify-between header font-thin"
          >
            <h6 class="section-label mb-1 text-sm">TAGS</h6>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="14px"
              height="14px"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="feather feather-plus text-center content-center"
            >
              <line x1="12" y1="5" x2="12" y2="19"></line>
              <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
          </div>
          <div class="list-group list-group-labels flex flex-col my-5  align-middle">
         <a class="tagItem flex items-center my-2" href=""><span class="mt-0.5 mr-4 font-sm w-2.5 h-2.5 bg-red-600 rounded-full block"></span><span>Team</span></a>
         <a class="tagItem flex items-center my-2" href=""><span class="mt-0.5 mr-4 font-sm w-2.5 h-2.5 bg-blue-600 rounded-full block"></span><span>Low</span></a>
         <a class="tagItem flex items-center my-2" href=""><span class="mt-0.5 mr-4 font-sm w-2.5 h-2.5 bg-purple-600 rounded-full block"></span><span>Medium</span></a>
         <a class="tagItem flex items-center my-2" href=""><span class="mt-0.5 mr-4 font-sm w-2.5 h-2.5 bg-green-600 rounded-full block"></span><span>High</span></a>
          </div>
        </section>

      </div>
  
</template>

<script>
    export default {
        props:['collapsed','collapsedTaskBar','openTab'],
        data(){
          return{
            
          }

        },
        methods:{
      
        }
      
    }
</script>
<style>
.textSelected {
  color: #7367f0;
}

</style>
