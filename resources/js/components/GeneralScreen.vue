<template>
    <div>
        <div class="row justify-content-center" style="border:solid 1px black;">
            <div class="col-md-8">
                <img src="https://assets.design.digital.engie.com/brand/logo-engie-blue.svg" class="nj-navbar__logo" alt="ENGIE">
                <div class="d-flex justify-content-center">
                    <div class="col-md-5" align="right"><b>What's generating now</b></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-1 justify-content-center live">live</div>
                </div>
                <div class="d-flex justify-content-center energy">
                    <img class="spark" src="../../img/energy.svg"/>
                    <h1>{{energy}} joules</h1>
                </div>
                <div class="d-flex nj-progress nj-progress--cerise mb-4">
                    <div class="nj-progress__bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="nj-progress__text">{{percentageCompleted}}%</div>
                </div>
            </div>
            <sideBar></sideBar>
        </div>
    </div>
</template>

<script>
    import Pusher from '../pusher';
    export default {
        name: 'GeneralScreen',
        data() {
            return {
              energy: 3,
              nextThreshold: 75,
              previousThreshold: 0,
              percentageCompleted: 25,
              idOfNextGoal: 0,
              show: false
            }
        },
        created() {
            //energy of yesterday
          this.getEnergy();
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
                    this.lottieDisplay("path");
                    this.previousThreshold = this.nextThreshold;
                    this.idOfNextGoal ++;
                    //get nextThreshold with the new itemId
                }
            },

            timer: function(){
                let sec = 60;
                let timer = setInterval(function(){
                    sec--;
                    if (sec < 0) {
                        clearInterval(timer);
                    }
                }, 1000);
            },

            lottieDisplay: function (path) {
                let svgContainer = document.getElementById('svgContainer');
                // let animItem = bodymovin.loadAnimation({
                //     wrapper: svgContainer,
                //     animType: 'svg',
                //     loop: false,
                //     path: path
                // });
            },

            updateProgressBar: function (){
              let percentageCompleted = this.percentageCompleted + "%";
              $('.nj-progress__bar').css({'width': percentageCompleted, 'aria-valuenow':percentageCompleted, 'aria-valuemin':0, 'aria-valuemax':100});
            }

        }

    };

    //PUSHER CODE
    // var counter = 0;
    // var channel = pusher.subscribe('particle-channel');
    // channel.bind('particle-data', function(data) {
    //     energy
    //     counter++;
    //     console.log(counter);
    // });
</script>

<style>
body {
    background-color: #F5F5F5;
}

.nj-navbar__logo {
  margin-top: 3%;
  margin-left: 3%;
  margin-bottom: 15%;
  width: 11%;
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
  width: 15%;
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
.nj-progress__bar {
  width: auto;
  aria-valuenow: 25;
  aria-valuemin: 0;
  aria-valuemax: 100;
}
</style>
