<template>
    <div>
        <div class="row justify-content-center" style="border:solid 1px black;">
            <div class="col-md-8">
                <div id='topbar'>
                    <img src="https://assets.design.digital.engie.com/brand/logo-engie-blue.svg" class="nj-navbar__logo" alt="ENGIE">
                    <p id="timer"></p>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="col-md-5" align="right"><b><h4>What's generating now</h4></b></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-1 live" align="center">live</div>
                </div>
                <div class="d-flex justify-content-center energy">
                    <img class="spark" src="../../img/energy.svg"/>
                    <h1>{{energy}} watts</h1>
                </div>
                <!--<div class="progress">
                  <div class="progress-bar progress-bar-success" role="progressbar" style="width:80%"></div>
                  <div class="progress-bar progress-bar-warning" role="progressbar" style=""></div>
                </div>-->
                <div class="progress-bar round">
            			<div class="progress-bar-filling round" style="width: 60%;">&nbsp;</div>
            		</div>
            </div>
            <sideBar></sideBar>
        </div>
    </div>
</template>

<script>
    import Pusher from '../pusher';
    import lottie from 'lottie-web';

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
          this.timer();
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
                    this.updateProgressBar();
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

            updateProgressBar: function (){
            // console.log(this.percentageCompleted);
            // let bar =  document.getElementsByClassName("progress-bar-filling");
            //     bar.style.width = this.percentageCompleted;
            // }
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

.nj-navbar__logo {
  margin-top: 3%;
  margin-left: 3%;
  width: 11%;
}
.energy {
  margin-top: 3%;
}
.live {
  border-style: solid;
  border-color: #cc0033;
  background-color: #cc0033;
  color: white;
}
.spark {
  height: 100px;
  width: 10%;
}

.lottie-popup {
    z-index: 1;
}

h1 {
  color: #00aaff;
  margin-bottom: 10%;
}

.progress-div {
  margin-top: 10%;
}
.nj-progress__bar {
  margin-left: 5%;
}
.nj-progress__text{
  margin-left: 3%;
}
.progress-bar {
  background-color: #E62B87;
}
.progress-bar-filling {
  background-color: #272382;
}
.round {
  -webkit-border-radius: 100px;
  -moz-border-radius: 100px;
  border-radius: 100px;
}

</style>
