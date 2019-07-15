<template>
    <div class="container">
        <div class="row justify-content-center" style="border:solid 1px black;">
            <div class="col-md-8">
                <img src="https://assets.design.digital.engie.com/brand/logo-engie-blue.svg" class="nj-navbar__logo" alt="ENGIE">
                <div class="d-flex justify-content-center">
                    <div class="col-md-5" align="right"><b>What's generating now</b></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-1 justify-content-center live">live</div>
                </div>
                <div class="d-flex justify-content-center energy">
                    <img class="spark" src="../../img/energy.svg"/>
                    <h1>{{energy}} joules</h1>
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
              energy: 250
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

    };
</script>
<style>
.nj-navbar__logo {
  margin-top: 3%;
  margin-bottom: 30%;
}
.energy {
  margin-top: 3%;
}
.live {
  border-style: solid;
  border-color: gray;
  background-color: gray;
  color: white;
}
.spark {
  height: 100px;
  width: 15%;
}
</style>
