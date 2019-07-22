<template>
  <div class="d-flex flex-wrap justify-content-center">
    <div v-if="goals!=null">
      <template v-for="(goal, index) in goals">
        <div class="col-md-4 goal-tickets" :key="index">
          <img :src="goal.emblem_path" class="goal-icons"  v-bind:style= "[(goals.includes(goalsCompleted[index])) ? {backgroundColor:  goal.emblem_color } : {backgroundColor: defaultColor }]" />
          <h4>{{objects[index]}}x</h4>
          <p>{{goal.name}}</p>
        </div>
      </template>
    </div>
    <div v-else>
        <div class="d-flex justify-content-center">
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
        <div class="col-md-4 goal-tickets">
            <img src="/images/coffee_pot.svg" class="goal-icons"/>
            <h4>0x</h4>
            <p>Object 3</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: 'GoalTicket',
    props: ['goals', 'objects', 'goalsCompleted'],
    data() {
        return {
            amountEnergy: 300,
            defaultColor: '#E0E0E0'
        }
    }
}
</script>

<style>
.goal-icons {
    fill: white;
    box-shadow: 0px 0px 15px #E0E0E0;
    background-color: #E0E0E0;
}

.goal-end-tickets {
    flex: 1 0 25%;
    margin-left: 2rem;
    margin-right:2rem;
}


.goal-ticket-container {
    flex-wrap: wrap;

}

</style>
