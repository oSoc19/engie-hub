<template>
    <div>
    <!-- <div id='engie_logo'> -->
        <img src="https://assets.design.digital.engie.com/brand/logo-engie-white.svg" class="nj-navbar-logo" alt="ENGIE">
    <!-- </div> -->
    <div class="row justify-content-center container-flex">
        <div class="col-md-9">
            <div class="watts-container" align="center">
              <h3>You have generated</h3>
              <h2><img class="spark" src="/images/white_energy.svg"/> <span v-if="totalEnergy">{{totalEnergy}}</span> watts</h2>
              <h3>which equals</h3>
            </div>
                  <goalTicketEndScreen :totalEnergy="totalEnergy"></goalTicketEndScreen>
                </div>
                <finishSidebar :energy="totalEnergy"></finishSidebar>
            </div>
        </div>

</template>

<script>
import {router} from '../app.js';
import Status from '../status.js';

    export default {
        name: 'SessionEndScreen',
        props: ['goals', 'goalsCompleted', 'totalEnergy'],
        data: function() {
          return {
            timeLeftBeforeInitialScreen: 8,
            defaultColor: '#E0E0E0',
            fueledObjects: []
          }
        },
        mounted() {
            this.timerToInactiveScreen();
            console.log("GOOOO");
          if (this.goals != null) {
            console.log(this.goals);
            this.calculateFueledObjects();
          }
        },
        methods: {
            timerToInactiveScreen: function(){
                let sec = this.timeLeftBeforeInitialScreen;
                console.log(sec);

                let timer = setInterval(function(){
                    sec--;
                    if (sec <= 0) {
                        clearInterval(timer);
                        Status.gameHasEnded = true;
                        router.push({
                            name: 'inactive',
                            params: {
                              gameHasEnded: true
                            }
                        });
                    }
                    console.log(sec);
                }, 1000);
            },
            calculateFueledObjects: function() {
              for (var i = 0; i < this.goals.length; i++) {
                let threshold = this.goals[i].threshold;
                let result =  Math.floor(this.totalEnergy / threshold);
                this.fueledObjects.push(result);
              };
            }
        }
    };
</script>

<style>
body {
    background-color: #F5F5F5;
}
/* h1 {
  color: white;
  margin-bottom: 0;
} */
h4 {
  margin-bottom: 0;
}

/* #engie_logo {
  margin-bottom: 5%;
} */

.nj-navbar-logo {
    position: absolute;
    z-index: 2;
    left: 0;
    margin-top: 2rem;
    margin-left: 2rem;
    width: 7%;
}
.energy {
  margin-top: 3%;
}
/* .progression{
  margin-left: 5%;
} */
/* .first-pic  {
  margin-right: -15%;
} */
/* .live {
  border-style: solid;
  border-color: #cc0033;
  background-color: #cc0033;
  color: white;
} */
.spark {
  height: 8.5rem;
  width: 6%;
}

.lottie-popup {
    z-index: 1;
}

h1 {
  color: #00aaff;
  margin-bottom: 10%;
}

h4 {
  margin-bottom: 0;
}
.progress-div {
  margin-top: 10%;
} */
/* .nj-progress__text{
  margin-left: 3%;
} */
.round {
  -webkit-border-radius: 100px;
  -moz-border-radius: 100px;
  border-radius: 100px;
}

/* .info-generated {
  background-color: #00AAFF;
} */

/* .goals {
  background-color: white;
  color: #707070;
}

.goal-icons {
    width: 29%;
} */

.container-flex {
    display: flex;
    flex-direction: row;
}

.total-generated-box {
  color: white;
}

.watts-container {
    background-color: #00AAFF;
    color: #FFFFFF;
    padding-top: 7rem;
    padding-bottom: 2rem;
    margin-bottom: 3rem;
}

.container-flex > div{
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding-left: 0;
    padding-right: 0;
}


</style>
