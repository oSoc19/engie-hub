<template>
    <div>
        <div class="row justify-content-center" style="border:solid 1px black;">
            <div class="col-md-8">
              <div id='topbar'>
                  <img src="https://assets.design.digital.engie.com/brand/logo-engie-white.svg" class="nj-navbar__logo" alt="ENGIE">
              </div>
                <div class="d-flex flex-column info-generated">
                  <div class="p-2 total-generated-box" align="center">
                    <h4>You have generated</h4>
                    <h1><img class="spark" src="../../img/icons/white-energy.svg"/> {{totalEnergy}} watts</h1>
                    <h4>which equals</h4>
                  </div>
                  <div class="p-2 goals">
                    <div class="row justify-content-center">
                      <div v-for="(goal, index) in goals" :key="index" class="col-md-2 goal-tickets">
                        <img :src="goal.emblem_path" class="goal-icons"/>
                        <!--<img v-else class="goal-icons goal-icon-empty"/>-->
                        <h4>{{goalsCompleted[index]}}x</h4>
                        <p>{{goal.name}}</p>
                      </div>
                    </div>
                    <!--<div class="row justify-content-center">
                        <div class="col-md-2 goal-tickets">
                            <img src="../../img/icons/noun_Game_1967460.svg" class="goal-icons"/>
                            <h4>{{}}x</h4>
                            <p>Object</p>
                        </div>
                        <div class="col-md-2 goal-tickets">
                            <img src="../../img/icons/noun_Microwave_1967465.svg" class="goal-icons"/>
                            <h4>{{}}x</h4>
                            <p>Object</p>
                        </div>
                        <div class="col-md-2 goal-tickets">
                            <img src="../../img/icons/noun_pizza slice_1204552.svg" class="goal-icons"/>
                            <h4>{{}}x</h4>
                            <p>Object</p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-2 goal-tickets">
                            <img src="../../img/icons/noun_Game_1967460.svg" class="goal-icons"/>
                            <h4>{{}}x</h4>
                            <p>Object</p>
                        </div>
                        <div class="col-md-2 goal-tickets">
                            <img src="../../img/icons/noun_Microwave_1967465.svg" class="goal-icons"/>
                            <h4>{{}}x</h4>
                            <p>Object</p>
                        </div>
                        <div class="col-md-2 goal-tickets">
                            <img src="../../img/icons/noun_pizza slice_1204552.svg" class="goal-icons"/>
                            <h4>{{}}x</h4>
                            <p>Object</p>
                        </div>
                    </div>-->
                  </div>
                </div>
            </div>
            <sideBar></sideBar>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'SessionEndScreen',
        data: function() {
          return {
            timeLeftBeforeInitialScreen: 10,
            totalEnergy: 32,
            goals: [],
            goalsCompleted: [10, 5]
          }
        },

        created() {
          this.timer();
          this.getGoals();
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
            getGoals: function(){
                axios.get('/api/goals')
                .then(response => {
                    this.goals = response.data.data;
                    console.log(response.data.data);
                })
                .catch(e => {
                    this.errors.push(e);
                })
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
#topbar {
  margin-bottom: 0;
  padding-bottom: 3%;
  background-color: #00AAFF;
}

.nj-navbar__logo {
  margin-top: 3%;
  margin-left: 3%;
  width: 11%;
}
.live {
  border-style: solid;
  border-color: #cc0033;
  background-color: #cc0033;
  color: white;
}
img.spark {
  height: 80px;
  width: 2%
}

.info-generated {
  background-color: #00AAFF;
}

.goals {
  background-color: white;
}

.total-generated-box {
  color: white;
}

</style>
