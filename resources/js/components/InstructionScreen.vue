<template>
        <div class="InstructionScreen ">
                <lottie :options="defaultOptions"/>
        </div>
</template>
<script>
import {router} from '../app.js';
// import lottie from 'lottie-web';
import Lottie from 'vue-lottie';
import animationData from '../lottie/instructions.json';
import Pusher from "../../../public/js/pusher/index.js";


export default {
    name: 'InstructionScreen',
    components: {
        Lottie
    },
    data: function() {
        return {
        activeIndex: 0,
        defaultOptions: { animationData: animationData, loop: false, speed: 0.1},
        }
    },
    mounted() {
        this.timer(8.3);
    },

    methods: {

      timer: function(sec){
          let timer = setInterval(() => {
              sec--;
              if (sec <= 0) {
                  router.push({
                      name: 'game'
                  });
              }
          }, 1000);
      },
  }
}
</script>
<style>
.inactive-lottie {
    width: 50%;
}

</style>
