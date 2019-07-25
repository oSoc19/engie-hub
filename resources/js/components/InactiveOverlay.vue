<template>
        <div id="popup1" class="overlay row">
	            <div class="popup row align-items-center justify-content-center ">
                    <h1 id="step-on">Step back on &</h1>
                        <div class="lottie-box">
                            <lottie :options="defaultOptions" id="inactive"/>
                        </div>
	            </div>
        </div>
</template>
<script>
import Lottie from 'vue-lottie';
import animationData from '../lottie/data.json';


export default {
    name: 'InactiveOverlay',
    components: {
        Lottie
    },
    data: function() {
        return {
        activeIndex: 0,
        defaultOptions: { animationData: animationData, loop: true},
        }
    }

  }
</script>
<style>

#step-on {
    margin-bottom: 0;
    color: #212121;
    font-size: 5rem;
}

#inactive {
    width: 0%;
    height: 0%;
}

.transparant-overlay {
    background-color: rgba(0,0,0,0.4);
    z-index: 20;

}

.lottie-box {
    width: 77%;
}

.inactive-lottie {
    margin-top: 17rem;
    width: 50%;
}


.popup {
  margin: auto;
  padding: 20px;
  /* background: #EE7; */
  background: rgba(0, 0, 0, 0.7);
  border-radius: 5px;
  width: 54%;
  position: relative;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.7);
}



</style>
