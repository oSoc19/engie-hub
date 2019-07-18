<template>
  <div id="sidebar" class="col-md-4" align="center">
    <div class="nj-card mb-3">
      <div class="nj-card__body">
        <p>
          <div>Today this place </div>
          <div>generated</div><br>
          <h2><img src="../../img/icons/black-energy.svg" width="40" height="40"/><b>{{todayEnergy}} watts</b></h2>
          <br>
          <p id="rcorners" align="center"><img src="../../img/washing-machine.png" width="65" height="80" /></p><br>
          <div>Which can be used to</div>
          <div>power</div>
          <div> 3.6 washing machines</div>
        </p>
        <br><hr><br>
        <p class="nj-card__body yesterday">
          <br>Yesterday<br>
          <h4>
            <img src="../../img/icons/black-energy.svg" width="30" height="30"/><b>{{yesterdayEnergy}} watts</b>
          </h4>
          was generated
        </p>
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
  background-color: #E0E0E0;
}
#rcorners {
  border-radius: 100px;
  background-color: #272382;
  padding: 30px 20px;
  width: 150px;
  height: 150px;
}

</style>
