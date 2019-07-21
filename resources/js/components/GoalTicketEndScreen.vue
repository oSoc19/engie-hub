<template>
    <div class="row justify-content-center">
        <div v-for="goal in goals" class="col-md-2 goal-tickets" v-bind:id="goal.id">
            <!-- <img :src="goal.emblem_path" class="goal-icons" v-bind:style="{ backgroundColor: goal.emblem_color}"/> -->
            <img :src="goal.emblem_path" class="goal-icons"  v-bind:style= "[acquiredGoalsAmount(goal.threshold) > 0 ? {backgroundColor: goal.emblem_color } : {backgroundColor: '#E0E0E0' }]" />
            <h4>{{acquiredGoalsAmount(goal.threshold)}}</h4>
            <p>{{goal.name}}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: 'GoalTicket',
    props: ['totalEnergy'],
    data() {
        return {
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
            }),
        },

        acquiredGoalsAmount: function(threshold) {
            return (totalEnergy/threshold);
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

</style>
