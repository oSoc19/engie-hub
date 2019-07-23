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
            <!-- <div class="p-2 goals"> -->
              <!-- <template v-if="goals!=null">
                <div class="row justify-content-center">
                  <template v-for="(goal, index) in goals">
                    <div class="col-md-4 goal-tickets" :key="index">
                      <img :src="goal.emblem_path" class="goal-icons"  v-bind:style= "[(goals.includes(goalsCompleted[index])) ? {backgroundColor:  goal.emblem_color } : {backgroundColor: defaultColor }]" />
                      <h4>{{fueledObjects[index]}}x</h4>
                      <p>{{goal.name}}</p>
                    </div>
                  </template>
                </template>
                <template v-else>
                  <div class="col-md-4 goal-tickets">
                    <img src="/images/lamp.svg" class="goal-icons"/>
                    <h4>0x</h4>
                    <p>Object 1</p>
                  </div>
                  <div class="col-md-4 goal-tickets">
                    <img src="/images/boiled_egg.svg" class="goal-icons"/>
                    <h4>0x</h4>
                    <p>Object 2</p>
                  </div>
                  <div class="col-md-3 goal-tickets">
                      <img src="/images/coffee_pot.svg" class="goal-icons"/>
                      <h4>0x</h4>
                      <p>Object 3</p>
                  </div> -->

                  <goalTicketEndScreen :totalEnergy="totalEnergy"></goalTicketEndScreen>
                </div>
                <finishSidebar :energy="totalEnergy"></finishSidebar>
            </div>
        </div>

</template>

<script>
import {router} from '../app.js'

    export default {
        name: 'SessionEndScreen',
        props: ['goals', 'goalsCompleted', 'totalEnergy'],
        data: function() {
          return {
            timeLeftBeforeInitialScreen: 10,
            defaultColor: '#E0E0E0',
            fueledObjects: []
          }
        },
        mounted() {
          if (this.goals != null) {
            console.log(this.goals);
            this.calculateFueledObjects();
          }
        },
        methods: {
            timer: function(){
                let sec = this.timeLeftBeforeInitialScreen
                let timer = setInterval(function(){
                    sec--;
                    if (sec <= 0) {
                        sec = 60;
                        clearInterval(timer);
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
h1 {
  color: white;
  margin-bottom: 0;
}
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
