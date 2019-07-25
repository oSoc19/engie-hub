<template>
        <div class="InstructionScreen ">
                <lottie :options="instructionOptions"/>
        </div>
</template>
<script>
import {router} from '../app.js';
import Lottie from 'vue-lottie';
import animationData from '../lottie/instructions.json';

export default {
    name: 'InstructionScreen',
    components: {
        Lottie
    },
    data: function() {
        return {
        activeIndex: 0,
        instructionOptions: { animationData: animationData, loop: false, speed: 0.1},
        }
    },
    mounted() {
        this.timerToStartGame(8.3);
    },

    methods: {
      timerToStartGame: function(sec){
          let timer = setInterval(() => {
              sec--;
              if (sec <= 0) {
                clearInterval(timer);
                  router.push({
                      name: 'game'
                  });
                  return;
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
