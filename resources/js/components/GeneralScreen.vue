<template>
    <div>
        <div class="row justify-content-center" style="border:solid 1px black;">
            <div class="col-md-8">
                <img src="https://assets.design.digital.engie.com/brand/logo-engie-blue.svg" class="nj-navbar__logo" alt="ENGIE">
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
    export default {
        name: 'GeneralScreen',
        data() {
            return {
              energy: 3,
              nextTreshold: 25,
              previousThreshold: 0,
              percentageCompleted: 25,
              idOfNextGoal: 0,
              show: false
            }
        },
        created() {
            //energy of yesterday
          //this.getEnergy()
        },

        methods: {
            getEnergy: function (){
                let channel = pusher.subscribe('particle-channel');
                channel.bind('particle-data', function(data) {
                    this.energy ++;
                    console.log(this.energy);
                    calculatePercentage();
                });
              //TODO api call to get information about energy generated
          },

            calculatePercentage: function () {
                let percentage = this.nextThreshold / this.energy;
                if(percentage<1) {
                    this.percentageCompleted = percentage*100;
                } else {
                    lottieDisplay("path");
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
                let animItem = bodymovin.loadAnimation({
                    wrapper: svgContainer,
                    animType: 'svg',
                    loop: false,
                    path: path
                });
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
