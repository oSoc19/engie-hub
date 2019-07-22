<template>
    <div class="row justify-content-center container-flex" style="border:solid 1px black;">
        <div class="col-md-9">
            <div class="watts-container" align="center">
              <div id='engie_logo'>
                  <img src="https://assets.design.digital.engie.com/brand/logo-engie-white.svg" class="nj-navbar__logo" alt="ENGIE">
              </div>
              <h3>You have generated</h3>
              <h2><img class="spark" src="/images/white_energy.svg"/> <span v-if="totalEnergy">{{totalEnergy}}</span> watts</h2>
              <h3>which equals</h3>
            </div>
            <div class="p-2 goals">
              <template v-if="goals!=null">
                <div class="row justify-content-center">
                  <template v-for="(goal, index) in goals">
                    <div class="col-md-3 goal-tickets" v-if="index < 3" :key="index">
                      <img :src="goal.emblem_path" class="goal-icons"  v-bind:style= "[(goals.includes(goalsCompleted[index])) ? {backgroundColor:  goal.emblem_color } : {backgroundColor: defaultColor }]" />
                      <h4>{{fueledObjects[index]}}x</h4>
                      <p>{{goal.name}}</p>
                    </div>
                  </template>
                </div>
                <div class="row justify-content-center">
                  <template v-for="(goal, index) in goals">
                    <div class="col-md-3 goal-tickets" v-if="index >= 3" :key="index">
                      <img :src="goal.emblem_path" class="goal-icons"  v-bind:style= "[(goals.includes(goalsCompleted[index])) ? {backgroundColor:  goal.emblem_color } : {backgroundColor: defaultColor }]" />
                      <h4>{{fueledObjects[index]}}x</h4>
                      <p>{{goal.name}}</p>
                    </div>
                  </template>
                </div>
              </template>
              <template v-else>
                <div class="row justify-content-center">
                  <div class="col-md-3 goal-tickets">
                      <img src="/images/lamp.svg" class="goal-icons"/>
                      <h4>0x</h4>
                      <p>Object 1</p>
                  </div>
                  <div class="col-md-3 goal-tickets">
                      <img src="/images/boiled_egg.svg" class="goal-icons"/>
                      <h4>0x</h4>
                      <p>Object 2</p>
                  </div>
                  <div class="col-md-3 goal-tickets">
                      <img src="/images/coffee_pot.svg" class="goal-icons"/>
                      <h4>0x</h4>
                      <p>Object 3</p>
                  </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-3 goal-tickets">
                        <img src="/images/blender.svg" class="goal-icons"/>
                        <h4>0x</h4>
                        <p>Object 4</p>
                    </div>
                    <div class="col-md-3 goal-tickets">
                        <img src="/images/game.svg" class="goal-icons"/>
                        <h4>0x</h4>
                        <p>Object 5</p>
                    </div>
                    <div class="col-md-3 goal-tickets">
                        <img src="/images/laptop.svg" class="goal-icons"/>
                        <h4>0x</h4>
                        <p>Object 6</p>
                    </div>
                </div>
              </template>
            </div>
        </div>
        <finishSidebar :energy="totalEnergy"></finishSidebar>
    </div>
</template>

<script>
    export default {
        name: 'SessionEndScreen',
        data: function() {
          return {
            timeLeftBeforeInitialScreen: 10,
            defaultColor: '#E0E0E0',
            fueledObjects: []
          }
        },
        props: ['goals', 'goalsCompleted', 'totalEnergy'],
        mounted() {
          if (this.goals != null) {
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

#engie_logo {
  margin-bottom: 5%;
}

.nj-navbar__logo {
  margin-top: 3%;
  margin-left: 3%;
  width: 11%;
}
.energy {
  margin-top: 3%;
}
.progression{
  margin-left: 5%;
}
.first-pic  {
  margin-right: -15%;
}
.live {
  border-style: solid;
  border-color: #cc0033;
  background-color: #cc0033;
  color: white;
}
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
}
.nj-progress__text{
  margin-left: 3%;
}
.round {
  -webkit-border-radius: 100px;
  -moz-border-radius: 100px;
  border-radius: 100px;
}

.info-generated {
  background-color: #00AAFF;
}

.goals {
  background-color: white;
  color: #707070;
}

.goal-icons {
    width: 29%;
}

.container-flex {
    display: flex;
    flex-direction: row;
}

.watts-container {
    background-color: #00AAFF;
    color: #FFFFFF;
}

.container-flex > div{
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding-left: 0;
    padding-right: 0;
}


</style>
