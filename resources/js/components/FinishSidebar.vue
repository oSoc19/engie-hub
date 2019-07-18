<template>
  <div id="sidebar" class="col-md-4" align="center">
    <div class="nj-card mb-3">
      <div class="nj-card__body">
        <p id="donate">
            Donate your {{this.energy}} watts of clean energy to a good cause
        </p>
        <br><hr><br>
        <div class="nj-card__body yesterday">
        <p>
            Scan to donate
        </p>
            <img src="../../img/qr-code-svgrepo-com.svg"/>
      </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        name: 'SideBar',
        data() {
            return {
                energy: 456;
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
p{
    font-family: Lato;
}

#donate {
    font-size: 54px;
    color: #707070;
}
#rcorners {
  border-radius: 100px;
  background-color: #272382;
  padding: 30px 20px;
  width: 150px;
  height: 150px;
}

</style>
