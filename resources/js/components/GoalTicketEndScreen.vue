<template>
    <div class="row justify-content-center goal-ticket-container">
        <div v-for="goal in goals" class="goal-end-tickets" v-bind:id="goal.id">
            <!-- <img :src="goal.emblem_path" class="goal-icons" v-bind:style="{ backgroundColor: goal.emblem_color}"/> -->
            <img :src="goal.emblem_path" class="goal-icons"  v-bind:style= "[acquiredGoalsAmount(goal.threshold) > 0 ? {backgroundColor: goal.emblem_color } : {backgroundColor: '#E0E0E0' }]" />
            <h3>{{acquiredGoalsAmount(goal.threshold)}} x</h3>
            <p>{{goal.name}}</p>
        </div>
    </div>

      </template>
    <!-- <div v-else>
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
</template> -->

<script>
export default {
    name: 'GoalTicketEndScreen',
    props: ['totalEnergy'],
    data() {
        return {
            amountEnergy: 300,
            goals: []
        }
    },
    created() {
        this.getGoals();
    },

    methods: {
        getGoals: function(){
            axios.get('/api/goals')
            .then(response => {
                this.goals = response.data.data;
                console.log(response.data.data);
            })
        },

        acquiredGoalsAmount: function(threshold) {
            return (Math.floor(this.totalEnergy/threshold));
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
    text-align: center;
}


.goal-ticket-container {
    flex-wrap: wrap;

}

</style>
