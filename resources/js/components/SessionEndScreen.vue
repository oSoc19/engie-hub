<template>
    <div>
        <div class="row justify-content-center" style="border:solid 1px black;">
            <div class="col-md-8">
                <div class="d-flex flex-column info-generated">
                  <div class="p-2" align="center">
                    <div id='topbar'>
                        <img src="https://assets.design.digital.engie.com/brand/logo-engie-blue.svg" class="nj-navbar__logo" alt="ENGIE">
                    </div>
                    <h4>You have generated</h4>
                    <h2><img class="spark" src="../../img/icons/white-energy.svg"/> {{totalEnergy}} watts</h2>
                    <h4>which equals</h4>
                  </div>
                  <div class="p-2 goals">
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
                    </div>
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
          }
        },

        created() {
          this.timer();
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
            }
        }
    };
</script>

<style>
body {
    background-color: #F5F5F5;
}

#topbar {
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
.nj-progress__text{
  margin-left: 3%;
}
.progress-bar {
  background-color: #E62B87;
  padding-left: 0;
  padding-right: 0;
}
#progress-bar-filling {
  background-color: #272382;
  height: 100%;
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
}

</style>
