<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div id='topbar'>
                <img src="https://assets.design.digital.engie.com/brand/logo-engie-blue.svg" class="nj-navbar__logo" alt="ENGIE">
                <div id="timer-box">
                    <p class="timer-elements">Time left to move</p>
                    <p id="timer" class="timer-elements "></p>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <b>YOU'VE GENERATED</b>
            </div>
            <div class="d-flex justify-content-center energy">
                <img class="spark" src="../../img/icons/blue-energy.svg"/>
                <h1>{{energy}} joules</h1>
            </div>

            <div class="row align-items-center progression">
              <div class="col-md-9 progress-bar round">
                <div id="progress-bar-filling" class="round" v-bind:style="{ width: percentageCompleted + '%', 'background-color': progressBarColor, height: '100%' }" >&nbsp;</div>
              </div>
              <div class="next-goal round">
                  <img src="../../img/noun_Microwave_1967465.svg" alt="microwave">
              </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-2 goal-tickets">
                    <img src="../../img/icons/noun_Game_1967460.svg" class="goal-icons"/>
                    <h4>GOAL</h4>
                    <p>Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum</p>
                </div>
                <div class="col-md-2 goal-tickets">
                    <img src="../../img/icons/noun_Microwave_1967465.svg" class="goal-icons"/>
                    <h4>GOAL</h4>
                    <p>Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum</p>
                </div>
                <div class="col-md-2 goal-tickets">
                    <img src="../../img/icons/noun_pizza slice_1204552.svg" class="goal-icons"/>
                    <h4>GOAL</h4>
                    <p>Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum</p>
                </div>
                <div class="col-md-2 goal-tickets">
                    <img src="../../img/icons/noun_Game_1967460.svg" class="goal-icons goal-icon-empty"/>
                    <h4>GOAL</h4>
                    <p>Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum</p>
                </div>
                <div class="col-md-2 goal-tickets">
                    <img src="../../img/icons/noun_Microwave_1967465.svg" class="goal-icons goal-icon-empty"/>
                    <h4>GOAL</h4>
                    <p>Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum</p>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: 'GeneralScreen',
    data: function() {
        return {
          energy: 0,
          nextThreshold: 600,
          previousThreshold: 0,
          percentageCompleted: 15,
          idOfNextGoal: 0,
          show: false,
          timeLeftOfSession: 60,
          progressBarColor: '#272382',
        }
    },

    created() {
        //energy of yesterday
      // this.getEnergy();
      this.calculatePercentage();
      this.timer()
      this.lottieDisplay();
      var simulation = setInterval(this.updateProgressBar, 1500);
      let timeLeft = this.timeLeftOfSession * 1000;
      setTimeout(function(){ clearInterval(simulation); }, timeLeft);
    },

    methods: {
        getEnergy: function(){
            let channel = Pusher.subscribe('particle-channel');
            channel.bind('particle-data', (data) => {
                this.energy++;
                console.log(this.energy);
                console.log(this.percentageCompleted);
                this.calculatePercentage();
            });
          //TODO api call to get information about energy generated
      },

        calculatePercentage: function () {
            let percentage = (this.energy / this.nextThreshold);
            console.log(percentage);
            if(percentage<1) {
                this.percentageCompleted = percentage*100;
            } else {
                // this.lottieDisplay("path");
                this.previousThreshold = this.nextThreshold;
                this.idOfNextGoal ++;
                //get nextThreshold with the new itemId
            }
        },

        timer: function(){
            let sec = this.timeLeftOfSession
            let timer = setInterval(function(){
                sec--;
                if (sec <= 0) {
                    sec = 60;
                    clearInterval(timer);
                }
                console.log(sec);
                document.getElementById("timer").innerHTML = sec;
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

        updateProgressBar: function(){
          this.energy += this.getRandomInt(5, 25);
          this.calculatePercentage();
        }
    }

};

</script>

<style>
body {
    background-color: #F5F5F5;
}

#topbar {
  margin-bottom: 15%;
}
#timer {
    /* margin-top: 15px; */
}
#timer-box {
    margin-left: 34%;
    text-align: center;
    display: inline-block;
}

.row {
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
.energy {
  margin-top: 3%;
}
.live {
  border-style: solid;
  border-color: red;
  background-color: red;
  color: white;
}
.spark {
  height: 100px;
  width: 9%;
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
  margin-left: 10%;
  padding-left: 0;
  padding-right: 0;
  max-height: 30px;
}
.progress-bar-filling {
  background-color: #272382;
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
