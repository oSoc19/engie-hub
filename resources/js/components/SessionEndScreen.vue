<template>
        <div class="row justify-content-center container-flex" style="border:solid 1px black;">
            <div class="col-md-9">
                  <div class="watts-container" align="center">
                    <!-- <div id='topbar'>
                        <img src="https://assets.design.digital.engie.com/brand/logo-engie-white.svg" class="nj-navbar__logo" alt="ENGIE">
                    </div> -->
                    <h4>You have generated</h4>
                    <h2><img class="spark" src="../../img/icons/white-energy.svg"/> {{totalEnergy}} watts</h2>
                    <h4>which equals</h4>
                  </div>
                  <div class="p-2 goals">
                    <div class="row justify-content-center">
                        <GoalTicket :acquiredAmount="calculateGoalsCollected()"></GoalTicket>

                        <!-- <div class="col-md-3 goal-tickets">
                            <img src="../../img/icons/noun_Game_1967460.svg" class="goal-icons"/>
                            <h4>{{this.totalEnergy}}x</h4>
                            <p>Object</p>
                        </div>
                        <div class="col-md-3 goal-tickets">
                            <img src="../../img/icons/noun_Microwave_1967465.svg" class="goal-icons"/>
                            <h4>{{}}x</h4>
                            <p>Object</p>
                        </div>
                        <div class="col-md-3 goal-tickets">
                            <img src="../../img/icons/noun_pizza slice_1204552.svg" class="goal-icons"/>
                            <h4>{{}}x</h4>
                            <p>Object</p>
                        </div> -->
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-3 goal-tickets">
                            <img src="../../img/icons/noun_Game_1967460.svg" class="goal-icons"/>
                            <h4>{{}}x</h4>
                            <p>Object</p>
                        </div>
                        <div class="col-md-3 goal-tickets">
                            <img src="../../img/icons/noun_Microwave_1967465.svg" class="goal-icons"/>
                            <h4>{{}}x</h4>
                            <p>Object</p>
                        </div>
                        <div class="col-md-3 goal-tickets">
                            <img src="../../img/icons/noun_pizza slice_1204552.svg" class="goal-icons"/>
                            <h4>{{}}x</h4>
                            <p>Object</p>
                        </div>
                    </div>
                  </div>
        </div>
        <FinishSidebar></FinishSidebar>
    </div>
</template>

<script>
import {router} from '../app.js'

    export default {
        name: 'SessionEndScreen',
        props: ['energy'],
        data: function() {
          return {
            timeLeftBeforeInitialScreen: 10,
            totalEnergy: 540,
            goals: [],
            goalsCompleted: []
          }
        },

        created() {
          this.timer();
          // console.log(router.params.energy + "params");
          console.log(this.energy + "geweun energy");
          console.log(energy.html());
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

            calculateGoalsCollected: function() {
                // this.goals.foreach(this.goalsCompleted[goal.id - 1] = floor((this.totalEnergy / goal.threshold)));
                this.goals.forEach(goal => {
                    let acquiredAmount = Math.floor(totalEnergy/goal.threshold);
                    return 
                });
            }
        }
    };
</script>

<style>
body {
    background-color: #F5F5F5;
}

#topbar {
  /* margin-bottom: 5%; */
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
    padding-top: 3rem;
    padding-bottom: 2rem;
}

.container-flex > div{
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding-left: 0;
    padding-right: 0;
}


</style>
