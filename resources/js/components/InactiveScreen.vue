<template>
    <div>
        <div class="row inactive-box">
            <div class= "col-md-5 " id="blue-man-flex">
                <img src="images/inactive/blue-man.svg" alt="blue-man"/>
            </div>
            <div class="col-md-7 align-items-center justify-content-center inactive-lottie ">
                    <h1 id="step-on">Step on &</h1>
                    <div class="lottie-box">
                        <lottie :options="defaultOptions" id="inactive"/>
                    </div>
            </div>
        </div>
        <div>
            <img src="images/inactive/bottom-line.svg" alt="bottom-line" id="bottom-line"/>
        </div>
    </div>
</template>
<script>
import {router} from '../app.js';
import lottie from 'lottie-web';
import Lottie from 'vue-lottie';
import animationData from '../lottie/data.json';
import Pusher from "../../../public/js/pusher/index.js";
// import {gameHasStarted} from '../gameHasStarted.js';
import Status from '../status.js';


export default {
    name: 'InactiveScreen',
    props:[
        'gameHasEnded'
    ],

    components: {
        Lottie
    },
    data: function() {
        return {
        activeIndex: 0,
        defaultOptions: { animationData: animationData, loop: true},
        instructionScreenCanActivate: true,
        Status: Status
        }
    },
    mounted() {


        // THIS HAS TO CHANGE

        // this.startInstructions();

        // if(this.gameHasEnded == true && this.instructionScreenCanActivate == false) {
        //     this.instructionScreenCanActivate = true;
        // }
        //if (this.gameHasEnded == true) {
          //setInterval(this.startInstructions(), 5000);
        //}
        //else {
          //this.startInstructions();
        //}
        let sec = 5;
        let timer = setInterval(() => {
              sec--;
              console.log(sec);
              if (sec <= 0) {
                  clearInterval(timer);
                  console.log("GOOO");
                  this.startInstructions();
              }
          }, 1000);
    },

    methods: {
        startInstructions: function(){
            let channel = Pusher.subscribe('particle-channel');
                channel.bind('particle-data', (data) => {
                    console.log(data);
                    if(Status.gameHasEnded == true) {
                        console.log("pushed???");
                        Status.gameHasEnded = false;
                        router.push({
                            name: 'instruction'
                        });
                };
                    return;
                });
      }
  }
}
</script>
<style>
#blue-man-flex {
    align-self: flex-end;
    padding-left: 3rem;
}

#bottom-line {
    position: absolute;
    bottom: 0;
    width: -webkit-fill-available;
}

#step-on {
    margin-bottom: 0;
    color: #212121;
    font-size: 5rem;
}

#inactive {
    width: 0%;
    height: 0%;
}

.inactive-box {
    height: -webkit-fill-available;
}

.lottie-box {
    width: 77%;
}

.inactive-lottie {
    margin-top: 17rem;
    width: 50%;
}



</style>
