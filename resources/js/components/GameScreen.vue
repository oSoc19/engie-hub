<template>
    <div>

    <div id='topbar' class="d-flex justify-content-center">
        <!-- <img src="https://assets.design.digital.engie.com/brand/logo-engie-blue.svg" class="nj-navbar__logo" alt="ENGIE"> -->
        <div id="timer-box">
            <p class="timer-elements">Time left to move</p>
            <p id="timer" class="timer-elements ">01:00</p>
        </div>
    </div>
    <div class="lottie-move">
        <lottie :options="defaultOptions1" />
    </div>
    <div class="row justify-content-center center-row">
        <div class="col-md-12">
            <div class="energy-container">
                <div class="d-flex align-items-center justify-content-center ">
                    <!-- <img class="engie-mascotte" src="/images/blue_dancing_man.jpg"/> -->
                    <div class="lottie-mascotte">
                        <lottie :options="defaultOptions2" />
                    </div>
                    <img class="spark" src="/images/white_energy.svg"/>
                    <p id="energy">{{energy}}</p><p id="watt">W</p>
                    <div class="lottie-mascotte invert">
                        <lottie :options="defaultOptions2" />
                    </div>
                    <!-- <img class="engie-mascotte" src="/images/blue_dancing_man.jpg"/> -->
                </div>
            </div>
            <div class="row align-items-center progression center-row" v-if="goals.length">
              <div class="col-md-9 progress-bar round bar">
                  <div class="progress-bar-filling round" v-bind:style="{ width: percentageCompleted + '%', backgroundColor: goals[currentGoal].emblem_color, height: '100%' }" >&nbsp;</div>
              </div>

              <div class="next-goal round ">
                  <img :src="goals[currentGoal].emblem_path" class="goal-icons" v-bind:style="{ backgroundColor: goals[currentGoal].emblem_color}"/>
              </div>
            </div>
                <goalTicket :current="currentGoal"></goalTicket>
        </div>
    </div>
</div>


</template>

<script>
import {router} from '../app.js'
import lottie from 'lottie-web';
import Lottie from 'vue-lottie';
import animationData from '../lottie/data.json';
import animationData2 from '../lottie/blue-dancing-blob.json';
import Pusher from "../../../public/js/pusher/index.js";


export default {
    name: 'GameScreen',
    components: {
        Lottie
    },
    props: [
        'gameIsStarted'
    ],
    data: function() {
        return {
        activeIndex: 0,
        defaultOptions1: { animationData: animationData, loop: true },
        defaultOptions2: { animationData: animationData2, loop: true },
        animationSpeed: 1,
        energy: 0,
        nextThreshold: 20,
        previousThreshold: 0,
        percentageCompleted: 15,
        idOfNextGoal: 0,
        show: false,
        timeLeftOfSession: 10,
        // progressBarColor: '#272382',
        goals: [],
        goalsCompleted: [],
        currentGoal: 0
        }
    },
    mounted() {
      this.timer();
      this.lottieDisplay();
      this.getGoals();
      this.calculatePercentage();
      this.getEnergy();
      var simulation = setInterval(this.updateProgressBar, 1500);
      let timeLeft = this.timeLeftOfSession * 1000;
      setTimeout(function(){ clearInterval(simulation); }, timeLeft);
    },

    methods: {
        getEnergy: function(){
            let channel = Pusher.subscribe('particle-channel');
            channel.bind('particle-data', (data) => {
                // this.energy++;
                this.energy = this.energy + 20;
                console.log(data.data);
                console.log(this.percentageCompleted);
                this.calculatePercentage();
            });
          //TODO api call to get information about energy generated
      },

        calculatePercentage: function () {
            let percentage = (this.energy / this.nextThreshold);
            console.log(percentage);
            if(percentage<1) {
                console.log("lower");
                this.percentageCompleted = percentage*100;
            }
            if(percentage >= 1) {
                console.log("hello");
                this.percentageCompleted = 100;
                this.changeOnGoalReached();
                //get nextThreshold with the new itemId
            }
        },

        changeOnGoalReached: function() {
            let goalReached = this.goals[this.currentGoal];
            this.goalsCompleted.push(goalReached);

            this.percentageCompleted = 0;

            if (this.currentGoal < this.goals.length - 1) {
              // $('#'+this.currentGoal).css({'backGroundColor' : this.goals[this.currentGoal].emblem_color});
              // document.getElementById(this.currentGoal).style.backgroundColor= this.goals[this.currentGoal].emblem_color;
              this.previousThreshold = this.nextThreshold;
              console.log(this.previousThreshold);
              this.currentGoal ++;
              console.log(this.currentGoal);
              this.nextThreshold = this.goals[this.currentGoal].threshold;
              console.log(this.nextThreshold);
            }
        },

        timer: function(){
            let sec = this.timeLeftOfSession
            let timer = setInterval(() => {
                sec--;
                if (sec <= 0) {
                    clearInterval(timer);
                    this.endSession();
                }
                if (sec > 9) {
                    document.getElementById("timer").innerHTML = '00:' + sec;
                } else {
                    document.getElementById("timer").innerHTML = '00:0' + sec;
                }
            }, 1000);
        },

        lottieDisplay: function () {
            // let animItem = bodymovin.loadAnimation({
            //     container: document.getElementById('lottie'),
            //     renderer: 'svg/canvas/html',
            //     animType: 'svg',
            //     loop: true,
            //     autoplay: true,
            //     path: "../lottie/data.json"
            // });
        },

        getRandomInt(min, max) {
          min = Math.ceil(min);
          max = Math.floor(max);
          return Math.floor(Math.random() * (max - min)) + min;
        },

      //   updateProgressBar: function(){
      //     this.energy += this.getRandomInt(5, 10);
      //     this.calculatePercentage();
      // },

        getGoals: function(){
            axios.get('/api/goals')
            .then(response => {
                this.goals = response.data.data;
                console.log(response.data.data);
            })
        },

        endSession: function() {
          router.push({
              name: 'end',
              params: {
                goals: this.goals,
                goalsCompleted: this.goalsCompleted,
                totalEnergy: this.energy,
                gameIsStarted: this.gameIsStarted
              }
          });
        }
    }

};

</script>

<style>
@import url('https://fonts.googleapis.com/css?family=Lato&display=swap');
body {
    background-color: #F5F5F5;
    font-family: 'Lato', sans-serif;
}
.lottie-move {
    position: absolute;
    z-index: 2;
    left: 2rem;
    top: 2rem;
    width: 9%;
}
.lottie-mascotte {
    margin-left: 1%;
    margin-top: -4rem;
    margin-bottom: -3rem;
    margin-right: 5%;
    width: 22%;
}

.invert {
}

#energy {
    color: #FFFFFF;
    font-weight: 700;
    font-size: 9.5rem;
    margin-right: 0.5rem;
}
#watt {
    color: #FFFFFF;
    font-size: 4rem;
    height: 2.5rem;
}

#topbar {
    margin-top: 1%;
    margin-bottom: 1rem;
}
#timer {
    font-size: 3.5rem;
    font-weight: 700;
}
#timer-box {
    /* margin-left: 34%; */
    text-align: center;
    display: inline-block;
}
.engie-mascotte {
    margin-left: 5%;
    margin-right: 5%;
    width: 11%;
}
.center-row {
    margin-top: 25px;
    margin-bottom: 15px;
}

.goal-icons {
    width: 37%;
    padding: 8px;
    border-radius: 50%;
    background-color: #0af;
}
.goal-icon-empty {
    background-color: #c4ebff;
}
.goal-tickets {
    text-align: center;
}

.timer-elements {
    display: block;
}

.nj-navbar__logo {
    display: inline-block;
    margin-top: 0;
    margin-left: 3%;
    width: 10%;

}
.energy-container {
    background-color: #00AAFF;
    padding-top: 3%;
    padding-bottom: 3%;
    margin-bottom: 5%;

}
.live {
  border-style: solid;
  border-color: red;
  background-color: red;
  color: white;
}
.spark {
  height: 8.5rem;
  width: 6%;
  margin-left: -5%;
}

.lottie-popup {
    z-index: 1;
}

.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
.progress-bar {
  background-color: #e2dce8;
}
.progression {
    line-height: 2;
}
.bar {
    margin-left: 10%;
    padding-left: 0;
    padding-right: 0;
    max-height: 30px;
}
.progress-bar-filling {
  background-color: #552382;
  z-index: 1;
}
.round {
  -webkit-border-radius: 100px;
  -moz-border-radius: 100px;
  border-radius: 100px;
}
.nj-avatar__picture{
  margin-left: -100%;
}
.next-goal{
  background-color: #0080FF;
  z-index: 1;
  margin-left: -2%;
}

.next-goal img{
  width: 100px;
  height: 100px;
}
</style>
