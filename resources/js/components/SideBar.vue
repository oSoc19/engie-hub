<template>
<<<<<<< HEAD
  <div id="sidebar" align="center">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="nj-card mb-3">
          <div class="nj-card__body">
            <p>
              <div>Today this place </div>
              <div>generated</div><br>
              <h2><img src="../../img/energy.svg" width="40" height="40"/><b>{{todayEnergy}}joules</b></h2>
              <br>
              <p id="rcorners" align="center"><img src="../../img/washing-machine.png" width="30" height="40" /></p><br>
              <div>Which can be used to</div>
              <div>power</div>
              <div> 3.6 washing machines</div>
            </p>
            <br><hr><br>
            <p>
              Yesterday<br>
              <h4><img src="../../img/energy.svg" width="30" height="30"/><b>{{yesterdayEnergy}}joules</b></h4><br>
              was generated
            </p>
          </div>
        </div>
=======
  <div id="sidebar" class="col-md-4" align="center">
    <div class="nj-card mb-3">
      <div class="nj-card__body">
        <p>
          <div>Today this place </div>
          <div>generated</div><br>
          <h2><img src="../../img/energy.svg" width="40" height="40"/><b>{{todayEnergy}} joules</b></h2>
          <br>
          <p id="rcorners" align="center"><img src="../../img/washing-machine.png" width="30" height="40" /></p><br>
          <div>Which can be used to</div>
          <div>power</div>
          <div> 3.6 washing machines</div>
        </p>
        <br><hr><br>
        <p>
          Yesterday<br>
          <h4><img src="../../img/energy.svg" width="30" height="30"/><b>{{yesterdayEnergy}} joules</b></h4>
          was generated
        </p>
>>>>>>> backend
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        name: 'SideBar',
        data() {
            return {
              todayEnergy: "336.050",
              yesterdayEnergy: "456.232"
            }
        },
        created() {
          //this.getEnergy()
        },
        methods: {
            getEnergy(){
              //TODO api call to get information about energy generated
            }
        }
    }
</script>
<style>
.nj-card__body {
  background-color: #dddddd;
}
#rcorners {
  border-radius: 100px;
  background-color: #A0A0A0;
  padding: 20px 20px;
  width: 80px;
  height: 80px;
}
</style>
