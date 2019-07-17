<template>
    <div class="row justify-content-center" style="border:solid 1px black;">
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
                <img class="spark" src="../../img/energy.svg"/>
                <h1>{{energy}} joules</h1>
            </div>
            <div class="progress-bar round">
                <div class="progress-bar-filling round">&nbsp;</div>
            </div>

            <div class="row justify-content-center " style="border:solid 1px black;">
                <div class="col-md-2 goal-tickets">
                    <i class="nj-icon nj-icon-temperature nj-icon--circle"></i>
                    <h4>GOAL</h4>
                    <p>Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum</p>
                </div>
                <div class="col-md-2 goal-tickets">
                    <i class="nj-icon nj-icon-cardload nj-icon--circle"></i>
                    <h4>GOAL</h4>
                    <p>Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum</p>
                </div>
                <div class="col-md-2 goal-tickets">
                    <i class="nj-icon nj-icon-medal nj-icon--circle"></i>
                    <h4>GOAL</h4>
                    <p>Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum</p>
                </div>
                <div class="col-md-2 goal-tickets">
                    <i class="nj-icon nj-icon-moon nj-icon--border"></i>

                    <h4>GOAL</h4>
                    <p>Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum Lorum ipsum</p>
                </div>
                <div class="col-md-2 goal-tickets">
                    <i class="nj-icon nj-icon-nature nj-icon--border"></i>

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
    data() {
        return {
          energy: 25,
          nextThreshold: 75,
          previousThreshold: 0,
          percentageCompleted: '15%',
          idOfNextGoal: 0,
          show: false,
          timeLeftOfSession: 60,
        }
    },

    created() {
        //energy of yesterday
      // this.getEnergy();
      this.calculatePercentage();
      this.timer()
      this.lottieDisplay();
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
    margin-top: 15px;
    margin-left: 34%;
    text-align: center;
    display: inline-block;
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
  background-color: #E62B87;
  margin-left: 10%;
  margin-right: 10%;
}
.progress-bar-filling {
  background-color: #272382;
  width: 0%;
}
.round {
  -webkit-border-radius: 100px;
  -moz-border-radius: 100px;
  border-radius: 100px;
}
</style>
